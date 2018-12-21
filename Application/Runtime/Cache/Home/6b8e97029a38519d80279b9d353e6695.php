<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>知味堂后台管理系统</title>
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
    <style type="text/css">
        .table th,.table td {text-align:left}
    </style>

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1>知味堂后台管理系统</h1>
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
        <div id="breadcrumb"> <a href="javascript:;" class="tip-bottom">商品管理</a> <a href="/<?php echo (MODULE_NAME); ?>/Pro/content_list" class="current">商品列表</a> </div>
    </div>
    <div class="container-fluid">



        <div class="row-fluid">
            <div class="span11">
                <hr>

                <!-- <form method="post" action="/<?php echo (MODULE_NAME); ?>/Column/content_list"> -->
                <form method="post" action="/<?php echo (MODULE_NAME); ?>/Pro/content_list">
                    <div class="form-group">
                       <!--  <select style="width:150px;"  class="form-control" name="col_id">
                            栏目筛选<option value="">请选择</option>
                            <?php if(is_array($col_menu)): foreach($col_menu as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo["id"] == $col_id): ?>selected='selected'"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>&nbsp;&nbsp;&nbsp;
                        <input name="c_status" type="checkbox" value="1"  <?php if($c_status == 1): ?>checked<?php endif; ?> />隐藏禁用栏目

                        <input name="status" type="checkbox" value="1"   <?php if( $status == 1 ): ?>checked<?php endif; ?>  />显示隐藏内容


                        &nbsp;&nbsp;&nbsp; -->
                        <!-- <button type="submit" class="btn btn-success">查询</button> -->

                    <a href="/<?php echo (MODULE_NAME); ?>/Pro/add_content/" class="btn btn-success btn" style="float: right">添加商品</a>
                    </div>
                </form>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>商品列表</h5>
                    </div>
                    <div class="widget-content ">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                            <tr>
                          <!--       <th style="width:40%;">标题</th>
                                <th>发布日期</th>
                                <th>操作</th> -->
                                <th style="width:40%;">商品编号</th>
                                <th>商品名称</th>
                                <th>发布渠道</th>
                                <th>排序</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($content_list)): $i = 0; $__LIST__ = $content_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><tr>
                                   <!--  <td><?php echo ($vs["title"]); if($vs["status"] == 0): ?>&nbsp;<img src="/Public/img/unshow.png"><?php endif; if($vs["istop"] == 1): ?>&nbsp;<img src="/Public/img/top.png"><?php endif; ?></td>
                                    <td><?php echo ($vs["create_time"]); ?></td>
                                    <td>
                                        <a href="/<?php echo (MODULE_NAME); ?>/Column/content_edit_index/u/<?php echo ($vs["id"]); ?>/o/edit/" class="btn btn-primary btn-mini">修改</a> |
                                        <a href="/<?php echo (MODULE_NAME); ?>/Column/content_del/u/<?php echo ($vs["id"]); ?>" class="btn btn-danger btn-mini" onclick= "if(confirm('是否确定删除 <?php echo ($vs["title"]); ?>!')==false)return  false; ">删除</a>

                                    </td> -->
                                     <tr>
                                    <td><?php echo ($pro["title"]); ?></td>
                                    <td><?php echo ($pro["names"]); ?></td>
                                    <td><?php if($pro["sort2"] == 0 and $pro["sort2"] != null): ?>官网<?php elseif($pro["sort2"] == 1): ?>积分商城<?php elseif($pro["sort2"] == 2): ?>官网/积分商城<?php elseif($pro["sort2"] == null): ?> /<?php endif; ?></td>

                                    <td><?php echo ($pro["sort"]); ?></td>
                                    <td>
                                        <a href="/<?php echo (MODULE_NAME); ?>/Pro/content_edit_index/u/<?php echo ($pro["id"]); ?>/o/edit/" class="btn btn-primary btn-mini">修改</a> |
                                        <a href="/<?php echo (MODULE_NAME); ?>/Pro/content_del/u/<?php echo ($pro["id"]); ?>" class="btn btn-danger btn-mini" onclick= "if(confirm('是否确定删除 <?php echo ($vu["title"]); ?>!')==false)return  false; ">删除</a>

                                    </td>

                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!-- <tr>
                               <td colspan="13" align="center" style="text-align:center;">
                               <?php echo $Propage?> 
                               </td>
                            </tr> -->
                            
                            </tbody>

                        </table>
                        <div class="Pagination">
                                <?php echo $Propage?> 
                            </div>
                    </div>
                </div>
            </div>



        </div></div>
    <!--end-main-container-part-->

    <!--Footer-part-->
    <div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


    <!--end-Footer-part-->


    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/client.js"></script>
    <script src="/Public/js/matrix.js"></script>
    <script src="/Public/js/timepicker/WdatePicker.js"></script>
    <script src="/Public/js/base.js"></script>


</body>
</html>