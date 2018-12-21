<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>知味堂后台管理</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="/Public/font-awesome1/css/font-awesome.css"  />
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
  <div id="breadcrumb"> <a href="/Home/user" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a><a class="current" href="javascript:;">批量更改业务员</a></div>
</div>
<div class="container-fluid">
  <hr>
  <form method="post" action="/Home/Business/change_saleman">
	  <div class="form-group">
	      
		<span>业务员工号:</span>
		<input type="text" name="number"  value="<?php echo ($param["number"]); ?>" size="24" style="width:120px;" class="form-control"/>
		&nbsp;&nbsp;&nbsp;
		
		<span>商家号:</span>
		<input type="text" name="business_id"  value="<?php echo ($param["business_id"]); ?>" size="24" style="width:120px;" class="form-control"/>
		&nbsp;&nbsp;&nbsp;
		
		<!-- <span>分配状态:</span>
		<select style="width:150px;"  class="form-control" name="status">
			<option value="-1" <?php if($status == -1): ?>selected='selected'"<?php endif; ?>>请选择</option>
	        <option value="0" <?php if($status == 0): ?>selected='selected'"<?php endif; ?>>未分配</option>
	   	  	<option value="1" <?php if($status == 1): ?>selected='selected'"<?php endif; ?>>已分配</option>
	     </select>&nbsp;&nbsp;&nbsp;
	     
	    <span>坐席:</span>
		<select style="width:150px;"  class="form-control" name="user_Id">
			<option value="0">请选择</option>
				<?php if(is_array($user_info)): foreach($user_info as $key=>$vo): ?><option value="<?php echo ($vo["user_Id"]); ?>" <?php if($vo["user_Id"] == $user_Id): ?>selected='selected'"<?php endif; ?>><?php echo ($vo["username"]); ?>|<?php echo ($vo["real_name"]); ?></option><?php endforeach; endif; ?>
	     </select>&nbsp;&nbsp;&nbsp; -->
				
		<button type="submit" class="btn btn-success" style="width:80px;">查询</button>
	  </div>
  </form>
  
  <div class="row-fluid">
	<div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>商家列表</h5>
            </div>
          <div class="widget-content ">
         
            <table class="table table-bordered table-striped with-check">
          
              <thead>
                <tr>
                  <th style="width:50px;"><input type="checkbox" id="all"/>全选</th>
                  <th>商家号</th>
                  <th>合同编号</th>
				  <th>店名</th>
				  <th>联系人</th>
                  <th>电话</th>
                  <th>地址</th>
                  <th>类型</th>
                  <th>等级</th>
				  <th>业务员工号/姓名</th>
				  <th>是否绑定</th>

				  <th>状态</th>
                </tr>
              </thead>
             <form action="/Home/Business/saleman_change" method="post" id="form-i">
              <tbody>
			  <?php if(is_array($business)): $i = 0; $__LIST__ = $business;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td><input type="checkbox" name="busi_id[]" value="<?php echo ($vo["busi_id"]); ?>" /><?php echo ($i); ?></td>
				  <td><?php echo ($vo["business_id"]); ?></td>
				  <td><?php echo ($vo["coop_id"]); ?></td>
				  <td><?php echo ($vo["name"]); ?></td>
				  <td><?php echo ($vo["businame"]); ?></td>
				  <td><?php echo ($vo["phone"]); ?></td>
				  <td ><div style="width:350px;word-wrap:break-word;display:block;"><?php echo ($vo["address"]); ?></div></td>
				  <td><?php echo ($vo["busi_type"]); ?></td>
				  <td><?php echo ($vo["busi_level"]); ?></td>
				  <td><?php echo ($vo["username"]); ?>/<?php echo ($vo["real_name"]); ?></td>
				  <td><?php if($vo["is_bind"] == 1): ?><a href="javascript:;" style="color:#00f;">已绑定</a><?php else: ?>未绑定<?php endif; ?></td>
				  <td><?php if($vo["status"] == 1): ?><a href="javascript:void(0)" style="color:#00f;">正常</a>&nbsp;
				      <?php else: ?>
						<a href="javascript:void(0)">已禁用</a>&nbsp;<?php endif; ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<!-- <td colspan="13"><a href="javascript:$('#form1').submit();"><span class="btn btn-success btn" style="float:left;">批量指派</span></a></td> -->
					
					<td colspan="13"><a href="javascript:onclick=pitch_on();"><span class="btn btn-success btn" style="float:left;">批量指派</span></a></td>
					
				</tr>
              </tbody>
              
            </table>
           
           
            <div class="Pagination"><?php echo ($show); ?></div>
          </div>
        </div>
		  </div>
  
</div></div>


<div class="shade shade-f" style="display:none;" onclick="hid();"></div>
<div class="popup popup-s" style="display:none;">
	<div class="popup-1"><span class="row-height"><strong>输入业务员工号</strong></span></div>
	<div class="popup-2">
		<span><strong>业务员工号:</strong></span>
		<select style="width:180px;"  class="saleman" name="saleman">
			<option value>请选择</option>
			<?php if(is_array($saleman)): $i = 0; $__LIST__ = $saleman;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["user_Id"]); ?>/<?php echo ($vo["company_id"]); ?>"><?php echo ($vo["username"]); ?>/<?php echo ($vo["real_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	     </select>&nbsp;&nbsp;&nbsp;
		 
		 <button type="button" class="btn btn-success" id="submit_success" style="width:80px;">提交</button>
		 </form> 
	</div>

	<div class="mer-error"><span>*请选择要分配的业务员</span></div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->

<script src="/Public/js/excanvas.min.js"></script> 
<script src="/Public/js/jquery.min.js"></script> 
<script type="text/javascript">
	$(function(){
		if($("#all").attr("checked")){
			$("input[type='checkbox']").attr("checked","true"); 
		}else{
			$("input[type='checkbox']").removeAttr("checked"); 
		}

		$("#all").click(function(){
			if($("#all").attr("checked")){
				$("input[type='checkbox']").attr("checked","true"); 
			}else{
				$("input[type='checkbox']").removeAttr("checked"); 
			}
		});
		
		$("#submit_success").click(function(){
			var s = $(".saleman").val();
			if(s == ''){
				$(".mer-error").css("display","block");
				return false;
			}else{
				$(".mer-error").css("display","none");
				$("#form-i").submit();	
			}
			
		});

		
		
	});
</script>
<script>
	function pitch_on(){
		var len = $("input[name='busi_id[]']:checked").length;
		if(len == 0){
			alert("请先选择商家");
			return false;
		}else{
			$(".shade").show();
			$(".popup").show(200);
		}
	}
	
	function hid(){
		$(".shade").hide();
		$(".popup").hide(200);
	}
	


	<!-- function designate(e){ -->
		<!-- var tel = $("input[name='tel']").val(); -->
		<!-- var status = $("select[name='status']").val(); -->
		<!-- var user_Id = $("select[name='user_Id']").val(); -->
		<!-- var client_name = $("input[name='client_name']").val(); -->
		<!-- $.ajax({ -->
			<!-- url: "/Client/ajax_designate", -->
			<!-- data: {tel:tel, status:status, user_Id:user_Id, client_name:client_name}, -->
			<!-- context: document.body, -->
			<!-- async:true, -->
			<!-- success: function(e){ -->
				<!-- alert(e); -->
			<!-- } -->
		<!-- }); -->
	<!-- } -->

</script>


<script src="/Public/js/matrix.js"></script> 
</script>
</body>
</html>