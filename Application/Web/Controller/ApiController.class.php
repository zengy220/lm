<?php
namespace Web\Controller;
use Think\Controller;

class ApiController extends CommonController
{

	header('Access-Control-Allow-Origin:*');//允许所有来源访问
	header('Access-Control-Allow-Method:POST,GET');//允许访问的方式

	//不带分页内容获取控制器
    public function content()
    {

        $map['col_id'] = $this->id;
        $map['status'] = 1;
        $contents = M('content_content')->order('istop desc,create_time desc,update_time desc')->where($map)->select();
        $this->assign('contents',$contents);
        $this->display($this->getTplById($this->id));
    }

	//带分页内容获取控制器
    public function page_content()
    {
    	header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
		header('Access-Control-Allow-Headers:x-requested-with');
		header('Access-Control-Max-Age:86400');  
		header('Access-Control-Allow-Origin:'.$_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials:true');
		header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers:x-requested-with,content-type');
		header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');





		$map['col_id'] = $this->id;
		$map['status'] = 1;
		$count=M("content_content")->where($map)->count();
		// $p=new \Org\Util\Page($count,10,"/page_content/id/$this->id/ptpcode/$this->ptpcode");
		// $show=$p->show();
		// $news=M("content_content")->where($map)->order('istop desc,create_time desc,update_time desc')->limit($p->limit[0],$p->limit[1])->select();
		// 默认是第一个
		$page = empty(I('page'))?1:I('page');
		$each =4;
		$news=M("content_content")->where($map)->order('istop desc,create_time desc,id desc,update_time desc')->limit($each*($page-1),$each)->select();


		// 接口
		// data
		foreach ($news as $k => $v) {

			$news_interface[$k]['title']=$news[$k]['title'];
			$news_interface[$k]['image']=$news[$k]['thumb'];
			$news_interface[$k]['id']=$news[$k]['id'];
			$news_interface[$k]['content']=$news[$k]['contents'];
			$news_interface[$k]['time']=$news[$k]['create_time'];
		}
		var_dump($news);exit;
		//page
		$page_detail['size']=$count;
		$page_detail['total']=ceil($count/$each);
		$page_detail['current']=$page;

		//json
		$json = json_encode(array(
            "resultCode"=>200,
            "message"=>"查询成功！",
            "data"=>$news_interface,
            "page"=>$page_detail
        ),JSON_UNESCAPED_UNICODE);
        
        //转换成字符串JSON
        print($json);exit;


		// var_dump($news);exit;
        $this->assign('show',$show);
		$this->assign('news',$news);
        $this->display($this->getTplById($this->id));

    }

	//带上下篇内容控制器
	public function page_detail(){
		header('Access-Control-Allow-Origin:*');//允许所有来源访问
		header('Access-Control-Allow-Method:POST,GET');//允许访问的方式
		$news_id=I("news_id");
		// $news_id_array=M("content_content")->where("col_id=$this->id")->field('title,id')->order('istop desc,create_time desc,update_time desc')->select();

		// $preInfo = array();//上一篇
		// $nextInfo = array();//下一篇
		// foreach($news_id_array as $key=>$v){
		// 	if($v['id'] == $news_id){
		// 		// echo $key;
		// 		$pk = $key-1;
		// 		$nk = $key+1;
		// 		if($pk>=0){
		// 			$preInfo['id'] = $news_id_array[$pk]['id'];
		// 			$preInfo['title'] = $news_id_array[$pk]['title'];
		// 		}
		// 		if($nk < count($news_id_array)){
		// 			$nextInfo['id'] = $news_id_array[$nk]['id'];
		// 			$nextInfo['title'] = $news_id_array[$nk]['title'];
		// 		}
		// 		break;
		// 	}
		// }
		$info = M("content_content")->where("id=$news_id")->find();
		$now_info['id']=$info['id'];
		$now_info['title']=$info['title'];
		$now_info['contents']=$info['contents'];
		$now_info['time']=$info['create_time'];

		// var_dump($info);exit;
		$json = json_encode(array(
            "resultCode"=>200,
            "message"=>"查询成功！",
            "data"=>$now_info
        ),JSON_UNESCAPED_UNICODE);
        
        //转换成字符串JSON
        // $json = json_decode($json);
        print($json);exit;


		$this->assign("now_info",$now_info);
		$this->assign("preInfo",$preInfo);
		$this->assign("nextInfo",$nextInfo);
		$this->display('page_detail');
	}

	public function ad(){
		header('Access-Control-Allow-Origin:*');//允许所有来源访问
		header('Access-Control-Allow-Method:POST,GET');//允许访问的方式

		$banner = M("ad_content as t1")->join("cs_ad_list as t2 on t1.ad_list_id=t2.id")->where("t2.simple_code='SYLB1'")->field("t1.url")->select();

		foreach($banner as &$v){
			$v['imgurl'] = $remote_server="http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']."/upfile/".$v['img'];
		}

	
		

		$json = json_encode(array(
            "resultCode"=>200,
            "message"=>"查询成功！",
            "data"=>$banner
        ),JSON_UNESCAPED_UNICODE);
        
        //转换成字符串JSON
        // $json = json_decode($json);
        print($json);exit;



		// var_dump($banner);exit;

	}


}