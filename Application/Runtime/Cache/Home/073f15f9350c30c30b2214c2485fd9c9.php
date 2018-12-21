<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>商家列表</title>
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
    
    <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="" class="current">商家列表</a>
  </div>
  
</div>
<div class="container-fluid">
  <hr>
  <form method="post" action="" name="submitForm" id="submitForm">
	  <div class="form-group">
		商家号: 
			<input type="text" name="business_id" style="width:120px;" value="<?php echo ($param["business_id"]); ?>"/>&nbsp;&nbsp;&nbsp;
		商家店名:&nbsp;&nbsp;&nbsp;
			<input type="text" name="name" style="width:120px;" value="<?php echo ($param["name"]); ?>"/>&nbsp;&nbsp;&nbsp;
		联系人:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="businame" style="width:120px;" value="<?php echo ($param["businame"]); ?>" />&nbsp;&nbsp;&nbsp;
		电话:
			<input type="text" name="phone" style="width:120px;" value="<?php echo ($param["phone"]); ?>" />&nbsp;&nbsp;&nbsp;<br><br>
		微信号:
			<input type="text" name="nikename" style="width:120px;" value="<?php echo ($param["nikename"]); ?>" />&nbsp;&nbsp;&nbsp;
		业务员名字:
			<input type="text" name="real_name" style="width:120px;" value="<?php echo ($param["real_name"]); ?>" />&nbsp;&nbsp;&nbsp;
		业务员工号:
			<input type="text" name="username" style="width:120px;" value="<?php echo ($param["username"]); ?>" />&nbsp;&nbsp;&nbsp;
		跟进情况:
			<select name="genjin" class="genjin" style="width:150px;">
				<option value="">--请选择--</option>
				<option value="0" <?php if( $param["genjin"] == 0 and $param["genjin"] != null ): ?>selected<?php endif; ?> >未回访</option>
				<option value="1" <?php if( $param["genjin"] == 1 ): ?>selected<?php endif; ?> >跟进中</option>
				<option value="2" <?php if( $param["genjin"] == 2 ): ?>selected<?php endif; ?> >已回访</option>
			</select>&nbsp;&nbsp;&nbsp;

			<!-- <input type="text" style="width:100px;" name="startTime" value="<?php echo ($param["startTime"]); ?>" onclick="change_picktime()" placeholder="起始时间"/> --
			<input type="text" style="width:100px;" name="endTime" value="<?php echo ($param["endTime"]); ?>" onclick="change_picktime()" placeholder="结束时间"/>
			&nbsp;&nbsp;&nbsp; -->
		
		<!-- <button type="button" class="btn btn-success" style="width:100px;">查询</button> -->
		
		
		<button type="button" class="btn btn-success search" id="" style="width:100px;">查询</button>&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-success export" style="width:100px;">导出</button>
		
		
		<a href="/Home/Business/add_business" class="btn btn-success btn" style="float:right;">新增商家</a>
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
					  <th style="width:30px;">序号</th>
					  <th>商家号</th>
					  <th>合同编号</th>
					  <th>店名</th>
					  <th>联系人</th>
					  <th>电话</th>
					  <th>地址</th>
					  <th>类型</th>
					  <th>等级</th>
					  <th>业务员</th>
					  <th>是否绑定</th>
					  <th>状态</th>
					  <th>备注</th>
					  <th>跟进情况</th>
					  <th>操作</th>
                </tr>
              </thead>
            <tbody>

       <?php if(is_array($businessInfo)): foreach($businessInfo as $ko=>$vo): ?><tr>
          <td style="text-align:center;"><?php echo ($ko+1); ?></td>  
		  <td style="text-align:center;"><?php echo ($vo["business_id"]); ?></td>
          <td style="text-align:center;"><?php if($vo["coop_id"] != null): echo ($vo["coop_id"]); else: ?> -<?php endif; ?></td>	
          <td style="text-align:center;"><?php echo ($vo["name"]); ?></td> 
		  <td style="text-align:center;"><?php echo ($vo["businame"]); ?></td>
		  <td style="text-align:center;"><?php echo ($vo["phone"]); ?></td>
		  <td style="text-align:center;"><?php echo ($vo["address"]); ?></td>
		  <td style="text-align:center;">
			  <?php if($vo["busi_type"] == 1): ?>门店加盟商
			  <?php elseif($vo["busi_type"] == 2): ?>
				 经销商
			  <?php elseif($vo["busi_type"] == 3): ?>	
				 代理商
			  <?php else: ?>	
				 商超连锁<?php endif; ?>	
		  </td>
		  <td style="text-align:center;"><?php echo ($vo["busi_level"]); ?></td>
          <td style="text-align:center;"><?php echo ($vo["username"]); ?>/<?php echo ($vo["real_name"]); ?></td>
		  <td style="text-align:center;"><?php if($vo["is_bind"] == 1): ?>已绑定<?php else: ?>未绑定<?php endif; ?></td>
		  <td style="text-align:center;">
			  <?php if($vo["status"] == 1): ?><a href="javascript:void(0)" >正常</a>&nbsp;
			  <?php else: ?>
				 <a href="javascript:void(0)" style="color:#00f;">禁用</a>&nbsp;<?php endif; ?>
		  </td>
		  <td><?php echo ($vo["remarks"]); ?></td>
		  <td><?php echo ($vo["visit_status"]); ?></td>
		  <td style="text-align:center;">
				<a href="javascript:;" onclick="" class="btn btn-danger btn-mini" style="background:#00f;">备注编辑</a>
				<a href="javascript:;" onclick="update_business(<?php echo ($vo["busi_id"]); ?>)" class="btn btn-danger btn-mini" style="background:#00f;">修改</a>
				<a href="javascript:;" onclick="del_business(<?php echo ($vo["busi_id"]); ?>)" class="btn btn-danger btn-mini" style="background:#c00;">删除</a>
		  </td>
          </tr><?php endforeach; endif; ?>
			 <tr>
				<td colspan="15" align="center" style="text-align:center;">
					<?php echo $businessPage?> 
				</td>
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
	//删除商家
	function del_business(busi_id){
		if(confirm('确认删除该商家？删除后不可恢复！')){
			window.location.href = "/Home/Business/del_business/busi_id/"+ busi_id;
		}	
	}
	//修改商家
	function update_business(busi_id){
		window.location.href = "/Home/Business/update_business/busi_id/"+ busi_id;
	}
</script>
<script>

$(function(){

	$(".search").bind("click",function(){
		var url = "/Home/Business/business_list";  
		//更改form的action  
		$("#submitForm").attr("action", url);  
		//触发submit事件，提交表单   
		$("#submitForm").submit();  
	});
	
	$(".export").bind("click",function(){
		var url = "/Home/Business/business_list_export";  
		//更改form的action  
		$("#submitForm").attr("action", url);
		//触发submit事件，提交表单   
		$("#submitForm").submit();  
	});
	
});

</script>
<script src="/Public/js/matrix.js"></script> 
</body>
</html>