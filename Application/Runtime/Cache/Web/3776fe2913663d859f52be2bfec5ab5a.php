<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>湖南省中药材综合信息服务平台</title>
<style type="text/css">
  .content ul li img:hover{
            transform: scale(1.2);/*当鼠标移动到图片上时实现放大功能*/
        }
        .content ul li{
            height: 100px;
            overflow: hidden;
            border-bottom: 1px solid lavender;
            background: white;
            list-style-type: none;
            transition-duration: 0.5s;
            margin: 10px 10px 5px 0;
 
        }
        .content ul li:hover{
            background-color: lavender;
            transition-duration: 0.5s;
        }
        .content .left{
            overflow: hidden;/*隐藏溢出图片内容*/
            transition-duration: 0.5s;
            width: 140px;
            height:80px;
            /*background: green;*/
            float: left;
            margin-right:20px;
        }
        .content .right{
            width:80% ;
            float: left;
            /*background: pink;*/
        }
        .right_top{
            height:60px;
        }
        .right_bottom{
            margin_top:50px;
        }
        .right_bottom_left span{
            color: darkgray;
            font-size: 12px;
        }

</style>
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
   <div class="columnSpace">
    <!--    <div class="rel" <?php if($adimg["img"] != '' ): ?>style="background:url(<?php echo ($adimg["img"]); ?>) <?php else: ?>style="background:url(/Public/web/images/pro_banner.jpg)<?php endif; ?> center center; width:100%; height:229px; "> -->
    <!--    <div class="rel" <?php if($adimg["img"] != '' ): ?>style="background:url(<?php echo ($adimg["img"]); ?>) <?php else: ?>style="background:url(/Public/web/images/pro_banner.jpg)<?php endif; ?> center center; width:100%; height:229px; "> -->
       <!-- <a class="abs" style="width: 100%; height: 100%; z-index: 22;" href="<?php echo ($adimg["url"]); ?>"></a> -->
       <!-- <div class="w1100 rel" style="height:229px"> -->
   <!-- <p class="abs" style="height:2px; width:100%; background:#a0232a; left:0; bottom:0"></p> -->
   </div>
   </div>
   </div>
   <!--banner-->
   <div class="w1100">
   <div class="box_main fn-clear">
   <div class="box_main_sub fn-left">
   <dl>
       <!-- <dt><img src="<?php echo ($pcolInfo["thumb"]); ?>"></dt> -->
       <br>
       <br>
      <dd >
        <a href="/web/map/index/ptpcode/LMCY"><span>会员分布</span></a>
      </dd>
       <?php if(is_array($sunCol)): foreach($sunCol as $key=>$val): ?><dd <?php if($val["id"] == $id): ?>class="active"<?php endif; ?>  id="tags<?php echo ($key+1); ?>"   ><a href="<?php echo ($val["col_url"]); ?>/id/<?php echo ($val["id"]); ?>/ptpcode/<?php echo ($ptpcode); ?>"><span><?php echo ($val["name"]); ?></span> </a></dd><?php endforeach; endif; ?>
   </dl>
   </div>
   <!-- <div class="box_main_sub2 fn-right nesw-list"> -->
   <div class="content">
   <div class="box-cont-sub color-99">您现在的位置：<a href="/<?php echo (MODULE_NAME); ?>/" class="color-99">首页</a> > <?php echo ($colInfo["name"]); ?> > <span class="color-a0"><?php echo ($bread_list["name"]); ?></span></div>
   <ul class="fn-clear  mt20 nynews-list">
       <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <div class="left">
                <?php if($vo["thumb"] == null): ?><img src="/Public/images/new.jpg" alt=""><?php else: ?><img src="<?php echo ($vo["thumb"]); ?>" alt=""><?php endif; ?>

              </div>
              <div class="right">
                <a class=" fn-clear" href="/<?php echo (MODULE_NAME); ?>/about/page_detail/news_id/<?php echo ($vo["id"]); ?>/id/<?php echo ($id); ?>/ptpcode/<?php echo ($ptpcode); ?>" >
                   <i class="bradiusy"></i><h3><span class="fn-left ellipsis"><?php echo ($vo["title"]); ?></span></h3>
                   <em class="fn-right color-99"><?php echo ($vo["create_time"]); ?></em>
                   <!-- <em class="fn-right color-99"><?php echo ($vo["create_time"]); ?></em> -->
                   <br>
                   <div class="right_top">
                     <span><?php echo ($vo["description"]); ?></span>
                   </div>
                </a>
              </div>
         </li><?php endforeach; endif; else: echo "" ;endif; ?>
   </ul>
       <div id="pageNav"><?php echo ($show); ?></div>
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