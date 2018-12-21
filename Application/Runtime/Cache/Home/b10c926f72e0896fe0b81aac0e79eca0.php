<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>新增商家</title>
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
  <div id="breadcrumb"> <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="/Home/Business/business_list" class="tip-bottom">商家列表</a> <a href="" class="current">新增商家</a> </div>
  
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    
     <div class="span6">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>增加商家</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/Home/Business/add_Busi" method="post" class="form-horizontal" onsubmit="return check()">
            <div class="control-group">
              <label class="control-label">合同编号：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请输入合同编号" maxlength="20" name="coop_id" value="" id="coop_id"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">商家店名：</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="请输入商家店名" maxlength="32" name="name" id="name"/>&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;">*</span>
              </div>
            </div>
           
           <div class="control-group">
              <label class="control-label">联系人：</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="请填写联系人姓名" maxlength="20" name="businame" id="businame" />&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;">*</span>
              </div>
            </div>
            
			<div class="control-group">
              <label class="control-label">电话：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请输入电话" name="phone" value="" maxlength="20" id="phone" onkeyup="this.value=this.value.replace(/\D/g,'')"/>&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;">*</span>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">商家地址：</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="请输入商家地址" name="address" maxlength="50" value="" id="address"/>
				&nbsp;&nbsp;<span style="color:red;font-weight:bold;">*</span>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">商家类型：</label>
              <div class="controls">
				 <select name="busi_type" id="busi_type">
					<option value="" selected="selected">请选择商家类型</option>
				  	<option value="1">门店加盟商</option>
					<option value="2">经销商</option>
					<option value="3">代理商</option>
					<option value="4">商超连锁</option>
				</select>
				&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;">*</span>
              </div>
            </div>
			
			<div class="control-group">
              <label class="control-label">商家等级：</label>
              <div class="controls">
				 <select name="busi_level">
				  	<option value="A">A</option>
					<option value="B">B</option>
					<option value="C" selected="selected">C</option>
				</select>
              </div>
            </div>
      <!-- zy业务员工号 -->
      <div class="control-group">
              <label class="control-label">业务员：</label>
              <div class="controls">
               <select name="username"  class="username">
                  <option value="0">请选择</option>
				  <?php if(is_array($username)): $i = 0; $__LIST__ = $username;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option name="username" value="<?php echo ($vo["user_Id"]); ?>" ><?php echo ($vo["username"]); ?>/<?php echo ($vo["real_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			   </select>
              </div>
            </div>
      <!-- zy业务员工号end -->

			<div class="control-group">
              <label class="control-label">状态：</label>
              <div class="controls" style="line-heght:center;">
				<input type="radio" name="status" value='1' checked/>正常&nbsp;
                <input type="radio" name="status" value='0' />禁用	
              </div>
            </div>
            
            <div class="form-actions" style="margin:0 180px;">
              <button type="submit" class="btn btn-success">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <button type="button" class="btn btn-success" onclick="history.back();">返回</button>
            </div>
            
          </form>
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
		alert("请填写商家店铺名称！");
		$('#name').focus();
		return false;
	}
	
	var businame = $('#businame').val();
	if(businame ==''){
		alert("请填写联系人名称！");
		$('#businame').focus();
		return false;
	}
	
	var busi_type = $('#busi_type').val();
	if(busi_type ==''){
		alert("请选择商家类型！");
		$('#busi_type').focus();
		return false;
	}
	
	var username = $('.username').val();
	if( username =='' || username == 0 ){
		alert("请选择业务员！");
		return false;
	}
	
	var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
    var isMob=/^((\+?86)|(\(\+86\)))?(1[0-9]{10})$/;
	var tel=$("#phone").val();
	
	if( !isPhone.test(tel) && !isMob.test(tel) ){
		alert("请输入正确的电话号码!");
		$('#phone').focus();
		return false;
	}
	
	return true;
}	

</script>  
<script src="/Public/js/matrix.js"></script> 
</body>
</html>