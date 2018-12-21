<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="/Public/font-awesome1/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/Public/css/jquery.gritter.css" />
<style>
	ul,li{list-style:none;}
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
  <div id="breadcrumb"> <a href="/staff" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">会员列表</a></div>
  <!-- <h1>会员</h1> -->
</div>
<div class="container-fluid">
  <hr>
  <form method="post" action="" name="submitForm" id="submitForm">
	  <div class="form-group">
		会员ID: 
			<input type="text" name="user_id" style="width:120px;" value="<?php echo ($param["user_id"]); ?>" placeholder="会员ID"/>&nbsp;&nbsp;&nbsp;
		微信昵称:
			<input type="text" name="nickname" style="width:120px;" value="<?php echo ($param["nickname"]); ?>" placeholder="微信昵称"/>&nbsp;&nbsp;&nbsp;
		渠道来源:
			<select name="regcome" class="regcome" style="width:150px;">
				<option value="">--请选择--</option>
				<option value="1" <?php if($param["regcome"] == 1): ?>selected<?php endif; ?> >二维码扫描</option>
				<option value="2" <?php if($param["regcome"] == 2): ?>selected<?php endif; ?> >关注公众号</option>
			</select>&nbsp;&nbsp;&nbsp;
		状态:
			<select name="status" class="status" style="width:150px;">
				<option value="">--请选择--</option>
				<option value="1" <?php if($param["status"] == 1): ?>selected<?php endif; ?> >正常</option>
				<option value="0" <?php if($param["status"] == 0 and $param["status"] != null): ?>selected<?php endif; ?> >禁用</option>
			</select>&nbsp;&nbsp;&nbsp;
		注册时间:
			<input type="text" style="width:120px;" name="addtime" value="<?php echo ($addtime); ?>" onclick="change_picktime()" placeholder="注册时间"/> &nbsp;&nbsp;&nbsp;
		
		<button type="button" class="btn btn-success search" id="" style="width:100px;">查询</button>&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-success export" style="width:100px;">导出</button>
		</div>
    </form>
  
  
  <div class="row-fluid">
   
	<div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>会员列表</h5>
          </div>
		  
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                	
                 <!-- <th style="width:50px;line-height:center;"><input type="checkbox" id="all"/>全选</th> -->
                  <th style="width:60px;">序号</th>
                  <th style="width:60px;">会员ID</th>
				  <th>微信昵称</th>
                  <th>注册时间</th>
                  <th>渠道来源</th>
                  <th>状态</th>
                
                </tr>
              </thead>
              <tbody>

			 <?php if(is_array($customInfo)): foreach($customInfo as $ko=>$vo): ?><tr>
				
              <!--    <td style="text-align:center;"><input type="checkbox" name="cs_id[]" value="<?php echo ($vo["user_id"]); ?>"/></td> -->
				  <td style="text-align:center;"><?php echo ($ko+1); ?></td>	
				  <td style="text-align:center;"><?php echo ($vo["user_id"]); ?></td>
				  <td style="text-align:center;"><?php echo ($vo["nickname"]); ?></td>
				  <td style="text-align:center;"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
				  
                  <td style="text-align:center;">
				  <?php if($vo["regcome"] == 1): ?>扫描商品
				  <?php elseif($vo["regcome"] == 2): ?>
						关注公众号
				  <?php else: ?>
						-<?php endif; ?>
				  </td>
				
				  <td style="text-align:center;">
				  
					<?php if($vo["status"] == 1): ?><a href="javascript:void(0)"  class="btn btn-primary btn-mini">正常</a>&nbsp;
						<a href="javascript:;" onclick="freeze_client(<?php echo ($vo["user_id"]); ?>)" class="btn btn-danger btn-mini">点击禁用 </a>
					<?php else: ?>
						<a class="btn btn-primary btn-mini" href="javascript:void(0)" style="background:#333;">冻结</a>&nbsp;
						<a href="javascript:;"  onclick="unfreeze_client(<?php echo ($vo["user_id"]); ?>)" class="btn btn-danger btn-mini">恢复正常</a><?php endif; ?>
						
				  </td>
				    
                </tr><?php endforeach; endif; ?>
				<tr>
				<td colspan="6" align="center" style="text-align:center;">
					<?php echo $customPage;?>
				</td>
				
				<!--	<td colspan="10"><a href="javascript:"><span class="btn btn-success btn">批量匹配</span></a></td> -->
				</tr>
              </tbody>
              
            </table>
           
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
<script type="text/javascript">

	function freeze_client(user_id){
		if(confirm('确定要冻结该用户?')){
			window.location.href = "/Home/Client/freeze_client/user_id/"+ user_id;
		}
	}
	
	function unfreeze_client(user_id){
		if(confirm('是否解禁该用户?')){
			window.location.href = "/Home/Client/unfreeze_client/user_id/"+ user_id;
		}
	}

</script>
<script>

$(function(){

	$(".search").bind("click",function(){
		var url = "/Home/client/client_list";  
		//更改form的action  
		$("#submitForm").attr("action", url);  
		//触发submit事件，提交表单   
		$("#submitForm").submit();  
	});
	
	$(".export").bind("click",function(){
		var url = "/Home/client/client_list_export";  
		//更改form的action  
		$("#submitForm").attr("action", url);
		//触发submit事件，提交表单   
		$("#submitForm").submit();  
	});
	
});

</script>
<script src="/Public/js/matrix.js"></script> 
<script src="/Public/js/base.js"></script>
<script src="/Public/js/timepicker/WdatePicker.js"></script>
</body>
</html>