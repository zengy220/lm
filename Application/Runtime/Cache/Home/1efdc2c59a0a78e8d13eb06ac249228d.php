<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>湖南省中药材综合信息服务平台后台管理系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/Public/css/jquery.gritter.css" />

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1>湖南省中药材综合信息服务平台后台管理系统</h1>
</div>
<link rel="stylesheet" href="/Public/css/page.css" />
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#"  class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎 <?php echo $_SESSION['realName'];?></span></a>
      <ul class="dropdown-menu">
	  <!--
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
		-->
        
      </ul>
	  <li><a href="/Home/index/changepwd"><i class="icon-key"></i> 修改密码</a></li>
	  <li><a href="/Home/index/logout"><i class="icon-forward"></i> 退出</a></li>
    </li>
<!--
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> 消息</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
-->
  </ul>
</div>


<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <!--<input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
  -->
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i>系统</a>
  <ul>
	<li><a href="/Home/User"><i class="icon icon-home"></i> <span>首页中心</span></a> </li>
	<?php if(is_array($meuns_list)): $i = 0; $__LIST__ = $meuns_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="submenu"> <a href="javascript:;"><i class="icon icon-list"></i> <span><?php echo ($vo["menu_name"]); ?></span></a>
	    <ul <?php if($vo["key"] != null ): ?>style="display: block;"<?php endif; ?>>
		<?php if(is_array($vo['son'])): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if( strtolower($v['menu_url'])==$now_url ){ ?> class="active" <?php } ?>><a href="<?php echo ($v["menu_url"]); ?>" <?php if( strtolower($v['menu_url'])==$now_url ){ ?> style="color: rgb(255, 255, 255);" <?php } ?> ><?php echo ($v["menu_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	<li class="content"> <span>内存使用</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: <?php echo ($memory["c"]); ?>;" class="bar"></div>
      </div>
      <span class="percent"><?php echo ($memory["c"]); ?></span>
	  <div class="stat"><?php echo ($memory["a"]); ?>MB / 4000MB</div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<div id="content-header">
  <div id="breadcrumb"><a href="javascript:;" class="tip-bottom">广告位设置</a><a href="/<?php echo (MODULE_NAME); ?>/Advertise/ad_list" class="current">广告位列表</a></div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
   
	<div class="span11"><a href="/<?php echo (MODULE_NAME); ?>/Advertise/ad_list_add" class="btn btn-success btn " style="float: right">新增广告位</a>
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>数据</h5>
            </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th style="width:30px;">序号</th>
                  <th>名称</th>
                  <th>简码</th>
				  <th>广告数量</th>
				  <th>说明</th>
				  <th>操作</th>
                </tr>
              </thead>
              <tbody>

			 <?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><tr>
                  <td style="text-align:center;"><?php echo ($i); ?></td>
				  <td style="text-align:center;"><?php echo ($vs["name"]); ?></td>
				  <td style="text-align:center;"><?php echo ($vs["simple_code"]); ?></td>
				    <td style="text-align:center;"><?php if($vs["sum_1"] == ''): ?>0<?php else: echo ($vs["sum_1"]); endif; ?></td>
                  <td style="text-align:center;"><?php echo ($vs["illustration"]); ?></td>
				  <td style="text-align:center;">
					<a href="/<?php echo (MODULE_NAME); ?>/Advertise/ad_list_edit/ad_list_id/<?php echo ($vs["id"]); ?>" class="btn btn-primary btn-mini">修改</a> |
					 <a href="/<?php echo (MODULE_NAME); ?>/Advertise/ad_list_del/ad_list_id/<?php echo ($vs["id"]); ?>" class="btn btn-danger btn-mini" onclick= "if(confirm('是否确定删除 <?php echo ($vs["name"]); ?>!')==false)return  false; ">删除</a>
				  	</if>
				  </td>	  
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
          </div>
        </div>
		  </div>
  </div>
</div></div>
<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 湖南省中药材综合信息服务平台后台管理系统 </div>
</div>



<!--end-Footer-part-->
</script>
    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/matrix.js"></script>
</body>
</html>