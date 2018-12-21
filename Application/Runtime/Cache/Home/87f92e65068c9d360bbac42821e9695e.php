<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>修改商家</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="/Public/css/jquery.gritter.css" />
<style type="text/css">
.span11{
	width:420px !important;
}
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
  <div id="breadcrumb"> <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="/Home/Business/business_list" class="tip-bottom">用户列表</a> <a href="" class="current">修改商家</a> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    
     <div class="span6">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
       <!--   <h5>修改商家</h5>  -->
        </div>
        <div class="widget-content nopadding">

          <form action="/Home/Business/update_busi" method="post" class="form-horizontal" onsubmit="return check()">
            <div class="control-group">
              <label class="control-label">合同编号：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请输入合同编号" maxlength="32" name="coop_id" value="<?php echo ($businessInfo["coop_id"]); ?>" id="coop_id"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">商家店名：</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="请输入商家店名" maxlength="20" value="<?php echo ($businessInfo["name"]); ?> "name="name" id="name"/>
				&nbsp;&nbsp;<span style="color:red;">*</span>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">联系人：</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="请填写联系人姓名" maxlength="32" value="<?php echo ($businessInfo["businame"]); ?>" name="businame" id="businame"/>
				&nbsp;&nbsp;<span style="color:red;">*</span>
              </div>
            </div>
            
		    <div class="control-group">
              <label class="control-label">电话：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请输入电话" maxlength="20" name="phone" value="<?php echo ($businessInfo["phone"]); ?>" id="phone"/>
				&nbsp;&nbsp;<span style="color:red;">*</span>
              </div>
            </div>
      
			<div class="control-group">
              <label class="control-label">商家地址：</label>
              <div class="controls">
                <input type="text" class="span11"  value="<?php echo ($businessInfo["address"]); ?>" maxlength="50" name="address" value="" id="address"/>
				&nbsp;&nbsp;<span style="color:red;">*</span>
              </div>
            </div>
      
			<div class="control-group">
              <label class="control-label">商家类型:</label>
              <div class="controls">
				  <select name="busi_type">
				  <option value="1" <?php if($businessInfo["busi_type"] == 1): ?>selected<?php endif; ?>>门店加盟商</option>
				  <option value="2" <?php if($businessInfo["busi_type"] == 2): ?>selected<?php endif; ?>>经销商</option>
				  <option value="3" <?php if($businessInfo["busi_type"] == 3): ?>selected<?php endif; ?>>代理商</option>
				  <option value="4" <?php if($businessInfo["busi_type"] == 4): ?>selected<?php endif; ?>>商超连锁</option>
			  </select>
              </div>
            </div>
      
			<div class="control-group">
              <label class="control-label">等级 :</label>
              <div class="controls">
				<select name="busi_level">
				  <option value="A" <?php if($businessInfo["busi_level"] == 'A'): ?>selected<?php endif; ?>>A</option>
				  <option value="B" <?php if($businessInfo["busi_level"] == 'B'): ?>selected<?php endif; ?>>B</option>
				  <option value="C" <?php if($businessInfo["busi_level"] == 'C'): ?>selected<?php endif; ?>>C</option>
				</select>
              </div>
            </div>
			<input type="hidden" name="business_id" value="<?php echo ($businessInfo["business_id"]); ?>"/>
			<input type="hidden" name="busi_id" value="<?php echo ($businessInfo["busi_id"]); ?>"/>

      <!-- zy业务员工号 -->
			<div class="control-group">
              <label class="control-label">业务员工号：</label>
              <div class="controls">
               <select name="username"  class="username">
                  <option value="0">请选择</option>
					<?php if(is_array($username)): $i = 0; $__LIST__ = $username;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option name="username" class="username" value="<?php echo ($vo["user_Id"]); ?>" <?php if( $businessInfo["saleman_id"] == $vo["user_Id"] ): ?>selected<?php endif; ?> ><?php echo ($vo["username"]); ?>/<?php echo ($vo["real_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
              </div>
            </div>
      <!-- zy业务员工号end -->
      
			<div class="control-group">
              <label class="control-label">状态 :</label>
              <div class="controls" style="line-heght:center;">
				<input type="radio" name="status" value='1' <?php if($businessInfo["status"] == 1 ): ?>checked<?php endif; ?>/>正常&nbsp;
                <input type="radio" name="status" value='0' <?php if($businessInfo["status"] == 0 and $businessInfo["status"] != null): ?>checked<?php endif; ?>/>禁用  
              </div>
            </div>
            
            <div class="form-actions" style="margin:0 180px;">
				<button type="submit" class="btn btn-success">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="button" class="btn btn-success" onclick="history.back();">返回</button>
            </div>
            
          </form>
        </div>
      </div>
</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->

<script src="/Public/js/excanvas.min.js"></script> 
<script src="/Public/js/jquery.min.js"></script> 

<script type='text/javascript'>
//产生随机数 
function GetRandomNum(Min,Max)
{   
  var Range = Max - Min;   
  var Rand = Math.random();   
  return(Min + Math.round(Rand * Range));   
}   

//随机业务号的生成
function generate_number(){
  
  var str='cp';
  var random_number=GetRandomNum(100000,999999);
  str+=random_number;
  $("#number").val(str);
}

$(function(){
  
  generate_number();
  
});
  
    
function check(){
  var name=$("#name").val();
  if(name==''){
    alert("商家号不能为空");
    $('#name').focus();
    return false;
  }
  
  /*var password=$("#password").val();
  if(password.length<6){
    alert("密码长度至少为6位");
    return false;
    
  }
  var real_name=$("#real_name").val();
  if(real_name==""){
    alert("请输入真实姓名");
    return false;
  }
  
  
  var tel=$("#tel").val();
  if(tel==""){
    alert("请输入手机号码");
    return false;
  }*/
  
  return true;
} 

</script>  
<script src="/Public/js/matrix.js"></script> 
</body>
</html>