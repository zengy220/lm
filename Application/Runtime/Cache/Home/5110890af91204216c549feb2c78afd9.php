<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>提货列表</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="/Public/js/jquery.min.js"></script>
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="/Public/css/jquery.gritter.css" />
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
    
    <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="#" class="tip-bottom">提货列表</a>
  </div>
  
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <form action="" method="post" name="submitForm" id="submitForm">
	  <div class="form-group">
		业务员工号:
			<input type="text" name="saleman_id" value="<?php echo ($param["saleman_id"]); ?>" style="width:120px;">&nbsp;&nbsp;&nbsp;
		<!-- 商品名称: 
			<input type="text" name="business_id" style="width:120px;">&nbsp;&nbsp;&nbsp; -->
		提货时间:
			<input type="text" style="width:100px;" name="startTime" value="<?php echo ($param["startTime"]); ?>" onclick="change_picktime()" placeholder="起始时间"> --
			<input type="text" style="width:100px;" name="endTime" value="<?php echo ($param["endTime"]); ?>" onclick="change_picktime()" placeholder="结束时间">
			&nbsp;&nbsp;&nbsp;

		<button type="button" class="btn btn-success search" id="" style="width:100px;">查询</button>&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-success export" style="width:100px;">导出</button>
		</div>
	  </form>
	  
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i> </span>
             <h5>提货列表</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					<th style="width:30px;">序号</th>
					<th>业务员工号</th>
					<th>姓名</th>
					<th>提货商品</th>
					<th>备注</th>
					<th>提货时间</th>
                </tr>
              </thead>
			  <tbody>

			<?php if(is_array($temp)): foreach($temp as $k=>$v): ?><tr>
				  <td style="text-align:center;"><?php echo ($k+1); ?></td>  
				  <td style="text-align:center;"><?php echo ($v["username"]); ?></td>
				  <td style="text-align:center;"><?php echo ($v["real_name"]); ?></td>
				  <td style="text-align:center;"><span value="" onclick="pitch_on1( <?php echo ($v["id"]); ?> )" class="btn btn-success btn-mini" style="width:50px;">查看商品</span></td>
				  <td style="text-align:center;"><?php if($v["reason"] != null): echo ($v["reason"]); else: ?> -<?php endif; ?></td>
				  <td style="text-align:center;"><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>
			  </tr><?php endforeach; endif; ?>
			 <tr>
				<td colspan="13" align="center" style="text-align:center;"><?php echo $page ?></td>
			 </tr>
              </tbody>
            </table>
          </div>
     </div>
	</div>
</div>

<!--end-main-container-part-->
<!-- 查看商品 曾洋2017年6月7日09:22:37 -->
<div class="shade1 shade-f" style="display:none;" onclick="hid1();">
</div>
<div class="popup1 popup-s" style="display:none;">
	<div class="popup1-1">
	<span class="row-height"><strong>查看商品</strong></span>
	</div>
	<div class="popup1-2" id="popup1-2" style="margin:10px 15px 5px 15px">
	</div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->

<script src="/Public/js/jquery.min.js"></script>
<script>
//点击审核 弹框
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
//点击查看商品 弹框 曾洋2017年6月7日09:22:15
	function pitch_on1(i){
		var id = i;
		$("#popup1-2").empty();
		$(".shade1").show();
		$(".popup1").show(200);
		
		$.ajax({
			type: "POST",
			url: "/Home/Pickgood/ajax_pitch_on1",
			data: {"name":id},
			dataType:"json",
			success: function(data){
				if( data != null ){
					$.each(data.ext, function(i, item) { 
						$("#popup1-2").append( 
							"<div>" + "商品名称：   "+item.names + "</div>" + "<div>" + "商品数量：   "+ item.num + "</div><hr/>" 
						); 
					}); 
				}else{
					$("#popup1-2").append( 
						"<div>" + "暂无数据" + "</div>" 
					);
				}
				
			}			
		});	
	}

	function hid1(){
		$(".shade1").hide();
		$(".popup1").hide(200);
	}
	
// 点击查看商品end

	
	function audit_submit(i){
		var i = i;
		var m = $("#message").val(),k = $("#user_id").val();

		if(m == ''){
			alert("请输入审核内容！");
			return false;
		}else{
		
			$.ajax({
				url:"/Home/Keep/quit_goods",
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
<script>

$(function(){

	$(".search").bind("click",function(){
		var url = "/Home/Pickgood/pick_list";  
		//更改form的action  
		$("#submitForm").attr("action", url);  
		//触发submit事件，提交表单   
		$("#submitForm").submit();  
	});
	
	$(".export").bind("click",function(){
		var url = "/Home/Pickgood/pick_list_export";  
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