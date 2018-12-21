<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>知味堂官网</title>
<link href="/Public/web/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/web/css/style.css" rel="stylesheet" type="text/css" />
<script src="/Public/web/js/jquery-1.11.1.min.js"></script>
<script src="/Public/web/js/common.js"></script>
</head>

<body>
    <!--top-->
   <div class="top-header">
   <div class="w1100 fn-clear">
   <div class="fn-left"><img src="/Public/web/images/logo.png" class="mt10"/></div>
   <div class="fn-right top-header-r">
   <dl class="fn-clear">
   <dt class="fn-left color-da mt10">
   <p><i class="phone"></i>全国服务热线：<span class="fz-16">400-8837 997</span></p>
   <p><i class="email"></i>E-mail：<span class="fz-16">zwt@hncpzw.com</span></p>
   <p></p>
   </dt>
   <dd class="fn-left ml20"><img src="/Public/web/images/top_ewm.jpg"  width="80" height="80"/></dd>
   </dl>
   </div>
   </div>
   </div>
   <!--top-->
   	 <!--导航-->
   <div class="top-menu">
   <div class="w1100">
   <ul class="fn-clear">
   <li><a href="/web/">首页</a></li>

      <?php if(is_array($topCol)): foreach($topCol as $key=>$arr): ?><li class='n<?php echo ($key); ?>  <?php if($arr["tpcode"] == $ptpcode): ?>active<?php endif; ?> '><a href="<?php echo ($arr["col_url"]); ?>/ptpcode/<?php echo ($arr["tpcode"]); ?>"  idx="<?php echo ($key); ?>"><span><?php echo ($arr["name"]); ?></span></a></li><?php endforeach; endif; ?>
   <!--<li><a href="" target="_blank">联系我们</a></li>-->
   </ul>
   </div>
   </div>
   <!--导航-->
   
   
   <!--banner-->
   <div class="columnSpace">
      <div  class="rel" <?php if($adimg["img"] != '' ): ?>style="background:url(<?php echo ($adimg["img"]); ?>) <?php else: ?>style="background:url(/Public/web/images/pro_banner.jpg)<?php endif; ?> no-repeat center center; width:100%; height:229px; ">
     <a class="abs" style="width: 100%; height: 100%; z-index: 22;" href="<?php echo ($adimg["url"]); ?>"></a>
     <div class="w1100 rel" style="height:229px">
   <p class="abs" style="height:2px; width:100%; background:#a0232a; left:0; bottom:0"></p>
   </div>
   </div>
   </div>
   <!--banner-->
   <div class="w1100">
   <div class="box_main fn-clear">
      <div class="box_main_sub fn-left">
         <dl>
            <dt><img src="<?php echo ($pcolInfo["thumb"]); ?>"></dt>
            <?php if(is_array($sunCol)): foreach($sunCol as $key=>$val): ?><dd <?php if($val["id"] == $id): ?>class="active"<?php endif; ?>  id="tags<?php echo ($key+1); ?>"   ><a href="<?php echo ($val["col_url"]); ?>/id/<?php echo ($val["id"]); ?>/ptpcode/<?php echo ($ptpcode); ?>"><span><?php echo ($val["name"]); ?></span> </a></dd><?php endforeach; endif; ?>
         </dl>
      </div>
   <div class="box_main_sub2 fn-right">
    <div class="box-cont-sub color-99">您现在的位置：<a href="/<?php echo (MODULE_NAME); ?>/" class="color-99">首页</a> > <?php echo ($pcolInfo["name"]); ?> > <span class="color-a0"><?php echo ($scolInfo["name"]); ?></span></div>
   <ul class="fn-clear neswlist-box">
      <?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/<?php echo (MODULE_NAME); ?>/about/products_detail/id/<?php echo ($id); ?>/ptpcode/<?php echo ($ptpcode); ?>/pro_id/<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>"  width="208" height="204"/><p><?php echo ($vo["names"]); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
   </ul>
      <div id="pageNav"><?php echo ($show); ?></div>
   </div>
   
   </div>
   </div>
    <!--底部-->
   <div class="footer">
   <div class="w1100 color-da">
   <dl class="fn-clear">
   <dt class="fn-left fz-20">联系我们</dt>
   <dd class="fn-left">
   <p>E-mail：zwt@hncpzw.com</p>
   <p>地址：湖南省长沙市雨花区马王堆南路259号汇达大厦1301 &nbsp;&nbsp;&nbsp;&nbsp; 电话：0731-85529623</p>
   <p>Copyright &copy; 湖南醇品滋味贸易有限公司版权所有   湘ICP备17008823号</p>
   </dd>
   </dl>
   </div>
   </div>
   <!--底部--> 

   
</body>
</html>