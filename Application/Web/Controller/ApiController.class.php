<?php
namespace Web\Controller;
use Think\Controller;

class ApiController extends CommonController
{



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
    	//允许跨域请求
    	$this->attend();
		$map['col_id'] = $this->id;
		$map['status'] = 1;
		$count=M("content_content")->where($map)->count();
		// 默认是第一个
		$page = empty(I('page'))?1:I('page');
		$each =4;
		$news=M("content_content")->where($map)->order('istop desc,create_time desc,id desc,update_time desc')->limit($each*($page-1),$each)->select();


		// 接口
		foreach ($news as $k => $v) {
			$news_interface[$k]['title']=$news[$k]['title'];
			$news_interface[$k]['image']=$news[$k]['thumb'];
			$news_interface[$k]['id']=$news[$k]['id'];
			$news_interface[$k]['content']=$news[$k]['contents'];
			$news_interface[$k]['time']=$news[$k]['create_time'];
		}
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

    }

	//带上下篇内容控制器
	public function page_detail(){
		//允许跨域请求
    	$this->attend();

		$news_id=I("news_id");
		$info = M("content_content")->where("id=$news_id")->find();
		$now_info['id']=$info['id'];
		$now_info['title']=$info['title'];
		$now_info['contents']=$info['contents'];
		$now_info['time']=$info['create_time'];
		$json = json_encode(array(
            "resultCode"=>200,
            "message"=>"查询成功！",
            "data"=>$now_info
        ),JSON_UNESCAPED_UNICODE);
        
        //转换成字符串JSON
        print($json);exit;
	}

	public function ad(){
		//允许跨域请求
		$this->attend();

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
        print($json);exit;
	}

	function attend(){
		header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
		header('Access-Control-Allow-Headers:x-requested-with');
		header('Access-Control-Max-Age:86400');  
		header('Access-Control-Allow-Origin:'.$_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials:true');
		header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers:x-requested-with,content-type');
		header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');

		header('Access-Control-Allow-Origin:*');//允许所有来源访问
		header('Access-Control-Allow-Method:POST,GET');//允许访问的方式
	}


}