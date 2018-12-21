<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>湖南省中药材综合信息服务平台</title>
	<link href="/Public/web/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/Public/web/css/style.css" rel="stylesheet" type="text/css" />
	<script src="/Public/web/js/jquery-1.11.1.min.js"></script>
	<script src="/Public/web/js/common.js"></script>
</head>

<body>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>湖南省中药材综合信息服务平台</title>
<meta name="keywords" content="关键词" />
<meta name="description" content="描述" />
<link href="/Public/alliance/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/alliance/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/alliance/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/Public/alliance/js/global.js"></script>

</head>
<body>
	

	<div class="head">
		<div class="w1200">
			<a href="#">
				<img src="/Public/alliance/images/pic1.png" alt="" class="left" />
				<span class="right">
					<span class="title">
						湖南省中药材综合信息服务平台
					</span>
					<span class="desc">
						<img src="/Public/alliance/images/pic2.png" alt="" />
						<span class="words">
							湖南省中药材产业协会
						</span>
						<img src="/Public/alliance/images/pic3.png" alt="" />
						<span class="words">
							湖南省中药材产业技术创新战略联盟
						</span>
					</span>
				</span>
			</a>
		</div>
	</div>
	<div class="nav">
		<div class="w1200">
			<ul>
				<li>
					<a href="#" >
						首页
					</a>
				</li>
				<li>
					<a href="#">
						新闻中心
					</a>
				</li>
				<li>
					<a href="#">
						商城交易
					</a>
				</li>
				<li>
					<a href="#">
						知识库
					</a>
				</li>
				<li>
					<a href="#">
						培训
					</a>
				</li>
				<li>
					<a href="#">
						专家库
					</a>
				</li>
				<li>
					<a href="#">
						物联网
					</a>
				</li>
<!-- 				 <?php if(is_array($topCol)): foreach($topCol as $key=>$arr): ?><li class='<?php if($arr["tpcode"] == $ptpcode): ?>current<?php endif; ?> '><a href="<?php echo ($arr["col_url"]); ?>/ptpcode/<?php echo ($arr["tpcode"]); ?>" class='<?php if($arr["tpcode"] == $ptpcode): ?>current<?php endif; ?>'><span><?php echo ($arr["name"]); ?></span></a></li><?php endforeach; endif; ?>		 -->

        <li class='<?php if($topCol[0]['tpcode'] == $ptpcode): ?>current<?php endif; ?> '>
         	<a href="/web/map/index/ptpcode/LMCY" class='<?php if($topCol[0]['tpcode'] == $ptpcode): ?>current<?php endif; ?>'>
         		<span><?php echo ($topCol[0]['name']); ?></span>
         	</a>
        </li>

        <li class='<?php if($topCol[1]['tpcode'] == $ptpcode): ?>current<?php endif; ?> '>
         	<a href="<?php echo ($topCol[1]['col_url']); ?>/ptpcode/<?php echo ($topCol[1]['tpcode']); ?>" class='<?php if($topCol[1]['tpcode'] == $ptpcode): ?>current<?php endif; ?>'>
         		<span><?php echo ($topCol[1]['name']); ?></span>
         	</a>
        </li>
			
		<li class='<?php if($topCol[2]['tpcode'] == $ptpcode): ?>current<?php endif; ?> '>
         	<a href="<?php echo ($topCol[2]['col_url']); ?>/ptpcode/<?php echo ($topCol[2]['tpcode']); ?>" class='<?php if($topCol[2]['tpcode'] == $ptpcode): ?>current<?php endif; ?>'>
         		<span><?php echo ($topCol[2]['name']); ?></span>
         	</a>
        </li>

			</ul>
		</div>
	</div>
	

</body>
</html>

<!--banner-->
<!-- <div class="columnSpace">
	<div  class="rel" <?php if($adimg["img"] != '' ): ?>style="background:url(<?php echo ($adimg["img"]); ?>) <?php else: ?>style="background:url(/Public/web/images/ppwh_banner.jpg)<?php endif; ?> center center; width:100%; height:229px; ">
		<a class="abs" style="width: 100%; height: 100%; z-index: 22;" href="<?php echo ($adimg["url"]); ?>"></a>
		<div class="w1100 rel" style="height:229px">
			<p class="abs" style="height:2px; width:100%; background:#a0232a; left:0; bottom:0"></p>
		</div>
	</div>
</div> -->
<!--banner-->
<div class="w1100">
	<div class="box_main fn-clear">
		<!-- <div class="box_main_sub fn-left">
			<dl>
				<br>
				<br>
				<?php if(is_array($sunCol)): foreach($sunCol as $key=>$val): ?><dd <?php if($val["id"] == $id): ?>class="active"<?php endif; ?>  id="tags<?php echo ($key+1); ?>"   ><a href="<?php echo ($val["col_url"]); ?>/id/<?php echo ($val["id"]); ?>/ptpcode/<?php echo ($ptpcode); ?>"><span><?php echo ($val["name"]); ?></span> </a></dd><?php endforeach; endif; ?>
			</dl>
		</div> -->
		<div class="box_main_sub2 fn-left">
			<div class="box-cont-sub color-99 fn-left">您现在的位置：<a href="/<?php echo (MODULE_NAME); ?>/" class="color-99">首页</a> > <?php echo ($pcolInfo["name"]); ?> > <span class="color-a0"><?php echo ($scolInfo["name"]); ?></span></div>
			<br>
			<div class="mid-text">
				<div class="maxbox fl bgf3f5ec insidecon">
     
  <div class="w960">
    <div class="maxbox fl martop">


    

      <div class="w960 fl platebg">


      		<div class="box_main_sub fn-left">
     <dl>
       <!-- <dt><img src="<?php echo ($pcolInfo["thumb"]); ?>"></dt> -->
       <br>
       <br>
      <dd><a href="/web/map/index/ptpcode/LMCY"><span>会员分布</span> </a></dd>
       <?php if(is_array($sunCol)): foreach($sunCol as $key=>$val): ?><dd <?php if($val["id"] == $id): ?>class="current"<?php endif; ?>  id="tags<?php echo ($key+1); ?>"   ><a href="<?php echo ($val["col_url"]); ?>/id/<?php echo ($val["id"]); ?>/ptpcode/<?php echo ($ptpcode); ?>"><span><?php echo ($val["name"]); ?></span> </a></dd><?php endforeach; endif; ?>
   </dl>
   </div>


      <!-- <div class="crumbs"><a class="home" href="">联盟首页</a><span class="songti">&gt;</span><a href="">会员分布</a></div> -->
  <div style="width:745px;float:left;min-height:500px;margin:0 auto;margin-top:10px;font-size:12px;">
  	<br>
  	<br>
  		<div style="float:left;width:85%;min-height:380px" id="dituContent"></div>
  		<div style="float:left;backgroud-color:red;width:14%;">
	  		<div style="width:100%;height:23px;font-size:13px;vertical-align:middle;text-align:center;font-weight: bold;">
				<span>企业类型说明</span>
			</div>
	  		<ul style="margin-top:0px;">
	  			<li style="padding-bottom:10px;"><img alt="" src="/Public/map/picture/pink1_1.png">种植类企业</li>
	  			<li style="padding-bottom:10px;"><img alt="" src="/Public/map/picture/pink2_1.png">加工类企业</li>
	  			<li style="padding-bottom:10px;"><img alt="" src="/Public/map/picture/pink3_1.png">营销类企业</li>
	  			<li style="padding-bottom:10px;"><img alt="" src="/Public/map/picture/pink4_1.png">高校</li>
	  		</ul>
  		</div>
  </div>
  </div>
  </div>
  </div>
  </div>
       
<script type="text/javascript">
	//var host = 'localhost:31680';
	var host = 'www.hnzyclm.com';
	//var url = '<?php echo U("map/shuju");?>';
	var sitetype = 'all';
	   /** 
		* 描述：js实现的map方法 
		* @returns {Map} 
		*/ 
	function Map() {
		var struct = function(key, value) {
			this.key = key;
			this.value = value;
		};
		// 添加map键值对 
		var put = function(key, value) {
			for ( var i = 0; i < this.arr.length; i++) {
				if (this.arr[i].key === key) {
					this.arr[i].value = value;
					return;
				}
			}
			;
			this.arr[this.arr.length] = new struct(key, value);
		};
		// 根据key获取value 
		var get = function(key) {
			for ( var i = 0; i < this.arr.length; i++) {
				if (this.arr[i].key === key) {
					return this.arr[i].value;
				}
			}
			return null;
		};
		// 根据key删除 
		var remove = function(key) {
			var v;
			for ( var i = 0; i < this.arr.length; i++) {
				v = this.arr.pop();
				if (v.key === key) {
					continue;
				}
				this.arr.unshift(v);
			}
		};
		// 获取map键值对个数 
		var size = function() {
			return this.arr.length;
		};
		// 判断map是否为空 
		var isEmpty = function() {
			return this.arr.length <= 0;
		};
		this.arr = new Array();
		this.get = get;
		this.put = put;
		this.remove = remove;
		this.size = size;
		this.isEmpty = isEmpty;
	}

var companyMap = new Map();
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        //获取数据
		getcompanyFromServer();
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }
    
    //创建地图函数：
    function createMap(){
		var map = new BMap.Map("dituContent",{minZoom:1,maxZoom:19});  
        var point = new BMap.Point(113.063766,28.232698);//定义一个中心点坐标
        map.centerAndZoom(point,13);//设定地图的中心点和坐标并将地图显示在地图容器中 		
		window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
    //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
 	map.addControl(ctrl_nav); 
	//map.addControl(new BMap.NavigationControl({type: BMAP_NAVIGATION_CONTROL_SMALL}));		
        
	//向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
       
	//向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT}); 
	map.addControl(ctrl_sca);


    }
    
	//获取指定地点的行政区划轮廓线
	function getBoundary(areaName){       
		var bdary = new BMap.Boundary(); 
		bdary.get(areaName, function(rs){       //获取行政区域
		   // map.clearOverlays();        //清除地图覆盖物       
			var count = rs.boundaries.length; //行政区域的点有多少个
			for(var i = 0; i < count; i++){
				var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 2, strokeColor: "#ff0000"}); //建立多边形覆盖物
				map.addOverlay(ply);  //添加覆盖物
				map.setViewport(ply.getPath());    //调整视野         
			}                
		});   
	}

	//获取标记点
	function getcompanyFromServer(){
		$.post('http://' + host + '/mapInfor.shtml?method=list&jsoncallback=?', function(data) {
	                 jsonResponseSite(data);
	             },"json");
	}
	
	
	  //   标注点数组
   // var markerArr = [{title:"文渊馆",content:"<a href='http://baidu.com'>湖南农大文渊馆204</a>",point:"113.091076,28.183643",isOpen:1,tel:"123456",address:"湖南省"}
		 // ,{title:"燕京啤酒",content:"燕京啤酒湖南分公司1",point:"112.540047,27.721762",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
		 // ];
	
	var markerArr = null;
	var markerStr = '';
	function jsonResponseSite(data) { 
		//urls 为企业的门户访问地址
		var sites = data.site;
		var markerArr1 = '[';
		for(var j=0;j<sites.length;j++){
			var item = sites[j];
			companyMap.remove(item.id);
			companyMap.put(item.id,item);
			var enterprise = item.enterprisesDetail;
			if(enterprise!=null){    //企业属性    type1为种植  type2为加工 type3为营销
				if(enterprise.urls != "http://"){
					if(sitetype=='all'){
						markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + enterprise.urls + '\' target=\'_blank\'>' + item.name 
									+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
									+ '",address:"' + item.detailAddress 
									+ '",type:"' + item.type + '"},'
					}else if(sitetype=='zhongzhi'){
						if(item.type =='1'){
							markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + enterprise.urls + '\' target=\'_blank\'>' + item.name 
							+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
							+ '",address:"' + item.detailAddress 
							+ '",type:"' + item.type + '"},'
						}
					}else if(sitetype=='jiagong'){
						if(item.type =='2'){
							markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + enterprise.urls + '\' target=\'_blank\'>' + item.name 
							+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
							+ '",address:"' + item.detailAddress 
							+ '",type:"' + item.type + '"},'
						}
					}else if(sitetype=='yingxiao'){
						if(item.type =='3'){
							markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + enterprise.urls + '\' target=\'_blank\'>' + item.name 
							+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
							+ '",address:"' + item.detailAddress 
							+ '",type:"' + item.type + '"},'
						}
					}
				}else{
					var siteUrl = 'http://' + host + '/post.jhtml?method=viewSite&siteId='+item.id;
					if(sitetype=='all'){
						markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + siteUrl + '\' target=\'_blank\'>' + item.name 
									+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
									+ '",address:"' + item.detailAddress 
									+ '",type:"' + item.type + '"},'
					}else if(sitetype=='zhongzhi'){
						if(item.type =='1'){
							markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + siteUrl + '\' target=\'_blank\'>' + item.name 
							+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
							+ '",address:"' + item.detailAddress 
							+ '",type:"' + item.type + '"},'
						}
					}else if(sitetype=='jiagong'){
						if(item.type =='2'){
							markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + siteUrl + '\' target=\'_blank\'>' + item.name 
							+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
							+ '",address:"' + item.detailAddress 
							+ '",type:"' + item.type + '"},'
						}
					}else if(sitetype=='yingxiao'){
						if(item.type =='3'){
							markerArr1 += '{title:"' + item.name + '",content:"<a href=\'' + siteUrl + '\' target=\'_blank\'>' + item.name 
							+ '</a>",point:"' + enterprise.baiduLatitudes + '",isOpen:1,tel:"' + enterprise.linkTel  
							+ '",address:"' + item.detailAddress 
							+ '",type:"' + item.type + '"},'
						}
					}					
				}
			}
		}
			
		markerStr = markerArr1.substring(0,markerArr1.length-1);
		markerStr += ']';
		markerArr = eval('(' + markerStr + ')'); //JSON.parse(markerStr); 
		addMarker();
}

    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){ 
            var json = markerArr[i];
            var p0 = json.point.split(",")[0];
            var p1 = json.point.split(",")[1];
            var point = new BMap.Point(p0,p1);
            var type = json.type;
            var path = "/Public/map/";
            var markPath = path + "image/markers.png";
            if(type=='1'){
            	markPath = path + "picture/pink1.png";
            }else if(type=='2'){
            	markPath = path + "picture/pink2.png";
            }else if(type=='3'){
            	markPath = path + "picture/pink3.png";
            }else if(type=='4'){
            	markPath = path + "picture/pink4.png";
            }
            var myIcon = new BMap.Icon(markPath, new BMap.Size(30, 30), {    
            	   offset: new BMap.Size(10, 25),    
            	 });      			
            var marker = new BMap.Marker(point, {icon: myIcon});  
		    marker.enableDragging(); //marker可拖拽
			var label = new window.BMap.Label(json.title, { offset: new window.BMap.Size(20, -10) });  
			marker.setLabel(label);
			(function(){
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click", function(e){
					_iw.open(_marker);
				})
			})()
			
			 map.addOverlay(marker);
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
		var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                    '<br/>站点：'+json.content + '<br/>电话：'+json.tel + '<br/>地址：'+json.address +'</div>';
				   
		//创建检索信息窗口对象
		var searchInfoWindow = null;
		searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
				title  : json.title,      //标题
				width  : 290,             //宽度
				height : 105,              //高度
				panel  : "panel",         //检索结果面板
				enableAutoPan : true,     //自动平移
				searchTypes   :[
					BMAPLIB_TAB_SEARCH,   //周边检索
					BMAPLIB_TAB_TO_HERE,  //到这里去
					BMAPLIB_TAB_FROM_HERE //从这里出发
				]
			});
	   return searchInfoWindow;
    }

    initMap();//创建和初始化地图
</script>
			</div>
		</div>

	</div>
</div>
		<div class="footer">
		<div class="w1200">
			<p>
				通信管理局备案号： 湘ICP备17005989号-2
			</p>
			<p>
				主办单位名称：湖南湘九味中药材开发有限公司
			</p>
		</div>
	</div>

</body>
</html>