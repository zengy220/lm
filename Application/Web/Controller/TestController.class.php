<?php
namespace Web\Controller;
use Think\Controller;

class TestController extends CommonController
{
    // var_dump(112);exit;
    //构造方法
    static $qrcode_url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?";
    static $token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&";
    static $qrcode_get_url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?";

    //生成二维码
    public function index($fqid=1121,$type = 1){
        $appid = 'wxf5c587b2a0318235';
        $secret = '71d9fe4c3242f9f09b5d760466b01b31';
        $ACCESS_TOKEN = $this->getToken($appid,$secret);
        $url = $this->getQrcodeurl($ACCESS_TOKEN,$fqid,$type);
        $this->save_log('测试保存的路径'.$url.'fid'.$fqid);
        return $this->DownLoadQr($url,time());
    }

    protected function getQrcodeurl($ACCESS_TOKEN,$fqid,$type = 1){
        $url = self::$qrcode_url.'access_token='.$ACCESS_TOKEN;
        if($type == 1){
            //生成永久二维码
            $qrcode= '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_str": '.$fqid.'}}}';
        }else{
            //生成临时二维码
            $qrcode = '{"expire_seconds": 604800, "action_name": "QR_STR_SCENE", "action_info": {"scene": {"scene_str": '.$fqid.'}}}';
        }
        $result = $this->http_post_data($url,$qrcode);
        $oo = json_decode($result[1]);
        if (empty($oo->ticket)){
            return false;
        }
        if(!$oo->ticket){
            $this->ErrorLogger('getQrcodeurl falied. Error Info: getQrcodeurl get failed');
            exit();
        }
        $url = self::$qrcode_get_url.'ticket='.$oo->ticket.'';
        return $url;
    }

    protected function getToken($appid,$secret){
        $ACCESS_TOKEN = file_get_contents(self::$token_url."appid=$appid&secret=$secret");
        $ACCESS_TOKEN = json_decode($ACCESS_TOKEN);
        $ACCESS_TOKEN = $ACCESS_TOKEN->access_token;
        return $ACCESS_TOKEN;
    }

    protected function http_post_data($url, $data_string) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data_string))
        );
        ob_start();
        curl_exec($ch);
        if (curl_errno($ch)) {
            $this->ErrorLogger('curl falied. Error Info: '.curl_error($ch));
        }
        $return_content = ob_get_contents();
        ob_end_clean();
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return array($return_code, $return_content);
    }

    //下载二维码到服务器
    protected function DownLoadQr($url,$filestring){
        if($url == ""){
            return false;
        }
        $filename = $filestring.rand(0,99999999999).'.jpg';
        ob_start();
        readfile($url);
        $img=ob_get_contents();
        ob_end_clean();
        $size=strlen($img);
        $fp2=fopen('static/qrcode/'.$filename,"a");
        if(fwrite($fp2,$img) === false){
            $this->ErrorLogger('dolwload image falied. Error Info: 无法写入图片');
            exit();
        }
        fclose($fp2);
        return 'static/qrcode/'.$filename;
    }

    //错误日志
    private function ErrorLogger($errMsg){
        $logger = fopen('log.txt', 'a+');
        fwrite($logger, date('Y-m-d H:i:s')." Error Info : ".$errMsg."\r\n");
        fclose($logger);
    }

    function save_log($res) {
    $err_date = date("Ym", time());
    //$address = '/var/log/error';
    $address = './error';
    if (!is_dir($address)) {
        mkdir($address, 0700, true);
    }
    $address = $address.'/'.$err_date . '_error.log';
    $error_date = date("Y-m-d H:i:s", time());
    if(!empty($_SERVER['HTTP_REFERER'])) {
        $file = $_SERVER['HTTP_REFERER'];
    } else {
        $file = $_SERVER['REQUEST_URI'];
    }
    if(is_array($res)) {
        $res_real = "$error_date\t$file\n";
        error_log($res_real, 3, $address);
        $res = var_export($res,true);
        $res = $res."\n";
        error_log($res, 3, $address);
    } else {
        $res_real = "$error_date\t$file\t$res\n";
        error_log($res_real, 3, $address);
    }
}


}
