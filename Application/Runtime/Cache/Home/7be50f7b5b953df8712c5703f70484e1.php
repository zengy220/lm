<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>营销系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link rel="stylesheet" href="/Public/css/select2.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/base.css" />
<link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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

<div id="content">
    <div id="content-header">
  <div id="breadcrumb"> <a class="tip-bottom" href="/staff/index.html" data-original-title="Go to Home"><i class="icon-home"></i> 首页</a> <a class="current" href="#">修改密码</a>
  </div>
	        <div class="widget-content nopadding">
          <form action="/Home/index/changepwd" method="post" class="form-horizontal"  enctype="multipart/form-data">
			<div class="control-group">
              <label class="control-label">原密码:</label>
              <div class="controls">
                <input type="password" class="span11" style="width:20%" placeholder="请输入原密码"  name="old" id="old"/>
              </div>
            </div>
			<div class="control-group">
              <label class="control-label">新密码 :</label>
              <div class="controls">
                <input type="password" class="span11" style="width:20%" placeholder="请输入新密码" name="new1" id="new1"/>
              </div>
            </div>
			<div class="control-group">
              <label class="control-label">确认新密码 :</label>
              <div class="controls">
                <input type="password" class="span11" style="width:20%" placeholder="请再一次输入新密码" name="new2" id="new2"/>
              </div>
            </div>
			<input type="hidden" value="<?php echo $_SESSION['staff_user'];?>"  name="staff_user" />
			<input type="hidden" value="<?php echo $_SESSION['staff_id'];?>"  name="staff_id" />
					 <div class="controls">
					<input type="button"  class="btn btn-success" value=" 提 交 " onclick="check()"  name="submit_ok" />&nbsp;&nbsp;
		<input type="button"  class="btn btn-success" onclick="window.history.back()"  value=" 返回 " />
		</div>
		          </form>
</div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<script src="/Public/js/jquery.min.js"></script> 
<script type="text/javascript">
function check(){

	 var old =$("#old").val();
	if(old == ''){
		alert("原密码必须填写！");
		return false;
	} 
	
	var new1=$("#new1").val();
	if(new1.match('^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,20}$') != new1){
		alert("新必须是8到20位的数字和字母");
		return false;
	} else if(new2==""){
		alert("请输入新密码!");
		return false;
	}
	var new2=$("#new2").val();
	if(new1!=new2){
		alert("两次输入的密码不一致");
		return false;
	}
	
	$(".form-horizontal").submit();
	
	
}	


</script>

</body>
</html>