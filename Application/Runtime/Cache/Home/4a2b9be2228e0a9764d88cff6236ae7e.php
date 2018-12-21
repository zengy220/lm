<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>商家审核</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="/Public/font-awesome1/css/font-awesome.css" />
<link rel="stylesheet" href="/Public/css/jquery.gritter.css" />
<style type="text/css">
.widget-content th ,.widget-content td{
text-align:left;
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
		<div id="breadcrumb"> 
			<a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="" class="current">商家审核</a>
		</div>
	</div>
<div class="container-fluid">
  <hr>
	<form method="post" action="/Home/Business/check_business">
	  <div class="form-group">

		商家店名:
			<input type="text" name="name" style="width:120px;" value="<?php echo ($param["name"]); ?>"/>
			&nbsp;&nbsp;&nbsp;
			
		联系人: 
			<input type="text" name="businame" style="width:120px;" value="<?php echo ($param["businame"]); ?>"/>&nbsp;&nbsp;&nbsp;
			
		业务员工号:
			<input type="text" name="number" style="width:120px;" value="<?php echo ($param["number"]); ?>"/>&nbsp;&nbsp;&nbsp;
		
		<!-- 审核状态:
			<select name="audit_status" style="width:134px;">
				<option value="0">全部</option>
				<option value="1" <?php if($param["audit_status"] == 1): ?>selected="selected"<?php endif; ?> >已审核</option>
				<option value="2" <?php if($param["audit_status"] == 2): ?>selected="selected"<?php endif; ?> >未审核</option>
				<option value="3" <?php if($param["audit_status"] == 3): ?>selected="selected"<?php endif; ?> >已拒绝</option>
			</select>&nbsp;&nbsp;&nbsp;&nbsp; -->
		加盟时间:
			<input type="text" style="width:100px;" name="startTime" value="<?php echo ($param["startTime"]); ?>" onclick="change_picktime()" placeholder="起始时间"/> --
			<input type="text" style="width:100px;" name="endTime" value="<?php echo ($param["endTime"]); ?>" onclick="change_picktime()" placeholder="结束时间"/>
			&nbsp;&nbsp;&nbsp;
		<button type="submit" class="btn btn-success" style="width:100px;">查询</button>
		</div>
    </form>
  <div class="row-fluid">
   
  <div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
             <h5>商家审核</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					<th style="width:30px;">序号</th>
					<th>店名</th>
					<th>联系人/电话/地址</th>
					<th>类型/等级</th>
					<th>加盟时间</th>
					<th>业务员工号/姓名</th>
					<th>备注</th>
					<th>经理审核理由</th>
					<th>客服审核理由</th>
					<th>审核状态</th>
                </tr>
              </thead>
              <tbody>

			  <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($i); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["businame"]); ?> / <?php echo ($vo["phone"]); ?> / <?php echo ($vo["address"]); ?></td>
					<td><?php echo ($vo["busi_type"]); ?> / <?php echo ($vo["busi_level"]); ?></td>
					<td><?php echo (date('Y-m-d',$vo["addtime"])); ?></td>
					<td><?php echo ($vo["username"]); ?> / <?php echo ($vo["real_name"]); ?></td>
					<td><?php echo ($vo["reason"]); ?></td>
					
					<td style="width:100px;"> 
						<?php if($vo["manager_status"] == 0): ?>审核中...
						<?php elseif($vo["manager_status"] == 1): ?>
							<font color="red"><?php echo ($vo["audit_content_2"]); ?></font>
						<?php else: ?> 
							<font color="#51A351"><?php echo ($vo["audit_content_2"]); ?></font><?php endif; ?> 
					</td>
					
					<td style="width:100px;">
						<?php if($vo["service_status"] == 0 and $vo["manager_status"] == 0): ?>审核中...
						<?php elseif($vo["service_status"] == 0 and $vo["manager_status"] == 2): ?>
							审核中...
						<?php elseif($vo["service_status"] == 1): ?>
							<font color="red"><?php echo ($vo["audit_content_1"]); ?></font><?php endif; ?> 
					</td>
					
					<td><?php echo ($vo["button"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<td colspan="10" align="center" style="text-align:center;"><?php echo ($page); ?></td>
				</tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
  
</div></div>
<!-- 点击弹框 -->
<div class="shade shade-f" style="display:none;" onclick="hid();"></div>
<div class="popup popup-s" style="display:none;">
	
	<div class="popup-1">
	<span class="row-height"><strong>商家审核</strong></span>
	</div>
	<div class="popup-2" style="margin:10px 15px 5px 15px">
		<input type="hidden" value="" id="user_id" name="user_id" />
		<textarea style="width:460px;height:150px;" placeholder="请输入审核内容!" autofocus maxlength="300" name="message" id="message"></textarea>
		
		<button type="button" class="btn btn-success" id="submit_success" onclick="audit_submit(1);" style="width:80px; margin:15px 85px;">通过</button>
		
		<button type="button" class="btn btn-warning" id="submit_disagree" onclick="audit_submit(2);" style="width:80px; margin:0px 50px;">拒绝</button>

		
	</div>
	
</div>
<!--end-main-container-part -->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->

<script src="/Public/js/jquery.min.js"></script> 
<script>
	function pitch_on(i){
		var i = i;
		$("#user_id").val(i);
		$(".shade").show();
		$(".popup").show(200);
	}
	
	function hid(){
		$(".shade").hide();
		$(".popup").hide(200);
	}
	
	function audit_submit(i){
		var i = i;
		var m = $("#message").val(),k = $("#user_id").val();
		if(m == ''){
			alert("请输入审核内容！");
			return false;
		}else{
		
			$.ajax({
				url:"/Home/Business/check_business_action",
				data:{ data:i, k:k , area:m },
				success:function(e){
					if(e == 101){
						alert("已审核通过！");
						window.location.reload();
					}else if(e == 102){
						alert("已审核拒绝！");
						window.location.reload();
					}else{
						alert(e);
					}
				}
				
			});
		}
	
	}
	
</script>
<script src="/Public/js/matrix.js"></script> 
<script src="/Public/js/base.js"></script>
<script src="/Public/js/timepicker/WdatePicker.js"></script>
</body>
</html>