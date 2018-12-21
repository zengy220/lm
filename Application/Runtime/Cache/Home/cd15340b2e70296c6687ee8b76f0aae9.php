<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>知味堂后台管理平台</title>
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
  <div id="breadcrumb"> 
	<a href="/Home/User" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>首页</a> 
	<a href="<?php echo ($param["before_url"]); ?>" class="tip-bottom"><?php echo ($param["before_menu"]); ?></a> 
	<a href="javascript:;" class="current"><?php echo ($param["current_menu"]); ?></a> 
  </div>
</div>
<div class="container-fluid">
  <hr>
  
  <div class="row-fluid">
  <?php if($param["menu"] == 'menu_list' ): ?><div class="span11"><a href="/Home/User/menu_capacity_edit/u/<?php echo ($param["u"]); ?>" class="btn btn-success btn">新增功能</a>
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>数据</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th style="width:30px;">序号</th>
                  <th>功能标题</th>
                  <th>功能URL</th>
                  <th>状态</th>
				  <th>展示</th>
				  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			   <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($i); ?></td>
				  <td><?php echo ($vs["menu_name"]); ?></td>
                  <td><?php echo ($vs["menu_url"]); ?></td>
				  <td><?php if($vs["menu_status"] == 1 ): ?><font color="#51A351">使用</font><?php else: ?><font color="#F83D35">禁用</font><?php endif; ?></td>
				  <td><?php if($vs["menu_show"] == 1 ): ?><font color="#51A351">展示</font><?php else: ?><font color="#F83D35">隐藏</font><?php endif; ?></td>
				  <td>
					<a href="/Home/User/menu_capacity_redact/u/<?php echo ($vs["menu_Id"]); ?>" class="btn btn-primary btn-mini">编辑</a> | 
					<a href="/Home/User/menu_capacity_del/u/<?php echo ($vs["menu_Id"]); ?>" class="btn btn-danger btn-mini" onclick= "if(confirm('是否确定删除!')==false)return  false; ">删除</a>
				  </td>	  
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
          </div>
        </div>
		<?php else: ?>
		<div class="span6">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
			  <h5><?php echo ($param["title"]); ?></h5>
			</div>
			<div class="widget-content nopadding">
			  <form action="<?php echo ($param["menu_from_url"]); ?>" method="post" class="form-horizontal">
				<div class="control-group">
				  <label class="control-label">功能名 :</label>
				  <div class="controls">
					<input type="text" class="span11" placeholder="功能名" name="menu_name" value="<?php echo ($menu_data["menu_name"]); ?>" style="width:220px;"/>
				  </div>
				</div>

				<div class="control-group control-single">
				  <label class="control-label" name="manu_url">功能URL:</label>
				  <div class="controls" >
					<input type="text"  class="span11" placeholder="功能URL" name="menu_url" id="menu_url" value="<?php echo ($menu_data["menu_url"]); ?>" style="width:220px;"/>
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">状态 :</label>
				  <div class="controls">
					<label>
						<input type="radio" name="menu_status" value='0' <?php if( $menu_data["menu_status"] == 0 ): ?>checked<?php endif; ?>/> 禁用
					</label>
					<label>
					  <input type="radio" name="menu_status" value='1' <?php if( $menu_data["menu_status"] == 1 ): ?>checked<?php endif; ?>/> 使用
					</label>
	   
				  </div>
				</div>
				
				<div class="control-group">
					<label class="control-label">展示 :</label>
					<div class="controls">
						<label><input type="radio" name="menu_show" value="0" <?php if( $menu_data["menu_show"] == 0 ): ?>checked<?php endif; ?>>隐藏</label>
						<label><input type="radio" name="menu_show" value="1" <?php if( $menu_data["menu_show"] == 1 ): ?>checked<?php endif; ?>>显示</label>
					</div>
				</div>
				
				<input type="hidden" name="o" value="<?php echo ($param["o"]); ?>" />
				<input type="hidden" name="u" value="<?php echo ($param["u"]); ?>" />
				
				<div class="form-actions" style="margin:0 180px;">
				  <button type="submit" class="btn btn-success">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.back();">返回</button>
				</div>
			  </form>
			</div>
		</div>
		</div><?php endif; ?>
		
		
	</div>
  </div>

</div>
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