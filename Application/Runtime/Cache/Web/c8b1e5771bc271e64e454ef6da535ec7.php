<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南省中药材综合信息服务平台</title>
<link href="/Public/web/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/web/css/style.css" rel="stylesheet" type="text/css" />
<script  type="text/JavaScript" src="/Public/web/js/jquery-1.11.1.min.js"></script>
<script  type="text/JavaScript" src="/Public/web/js/common.js"></script>
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
   <div class="banner-box rel " id="banner">
   <ul class="pics">
       <?php if(is_array($banner)): foreach($banner as $key=>$vo): ?><li style="background:url('<?php echo ($vo["imgurl"]); ?>') no-repeat center top;" ><?php if($vo["url"] != ''): ?><a href="<?php echo ($vo["url"]); ?>"></a><?php endif; ?></li><?php endforeach; endif; ?>
   <!--<li style="background: url(/Public/web/images/banner.jpg) no-repeat center center;display: block;"><a href="" target="_blank"></a></li>
   <li style="background: url(/Public/web/images/banner2.jpg) no-repeat center center;"><a href="" target="_blank"></a></li>-->
   </ul>
   <div class="g-wrap">
        <ul class="idxs">
            <?php if(is_array($banner)): foreach($banner as $key=>$vo): ?><li></li><?php endforeach; endif; ?>

        </ul>
    </div>
   </div>
   <!--banner-->
   

  

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

   <script src="/Public/web/js/index.js"></script>
   <script type="text/javascript" src="/Public/web/js/jquery.SuperSlide2.js"></script>
   <script>
   	/* 图片滚动效果 */
	$(".mr_frbox").slide({
		titCell: "",
		mainCell: ".mr_frUl ul",
		autoPage: true,
		effect: "leftLoop",
		autoPlay: true,
		vis: 3
	});
	
	//导航设置
	$(".top-menu").find("li").eq("0").addClass("active");
    $("#banner").find("li").eq(0).css("display","block");
   </script>
</body>
</html>