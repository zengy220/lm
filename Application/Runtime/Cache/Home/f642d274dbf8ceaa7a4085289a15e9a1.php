<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>积分列表</title>
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
    <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">积分列表</a>
  </div>
  <!-- <h1>会员积分明细</h1> -->
</div>
<div class="container-fluid">
  <hr>
  <form method="post" action=""  name="submitForm" id="submitForm">
	  <div class="form-group">
		收支类型:
			<select name="type" class="type" style="width:150px;">
				<option value="">--请选择--</option>
				<option value="1" <?php if($param["type"] == 1): ?>selected<?php endif; ?> >增加</option>
				<option value="2" <?php if($param["type"] == 2): ?>selected<?php endif; ?> >扣减</option>
			</select>&nbsp;&nbsp;&nbsp;
		变更方式:
			<select name="change_type" class="change_type" style="width:150px;">
				<option value="">--请选择--</option>
				<option value="1" <?php if($param["change_type"] == 1): ?>selected<?php endif; ?> >他人转赠</option>
				<option value="2" <?php if($param["change_type"] == 2): ?>selected<?php endif; ?> >兑换商品</option>
				<option value="3" <?php if($param["change_type"] == 3): ?>selected<?php endif; ?> >赠送他人</option>
				<option value="4" <?php if($param["change_type"] == 4): ?>selected<?php endif; ?> >扫码获取</option>
				<option value="5" <?php if($param["change_type"] == 5): ?>selected<?php endif; ?> >活动获取</option>
			</select>&nbsp;&nbsp;&nbsp;
			
		会员ID: 
			<input type="text" name="user_id" style="width:120px;" value="<?php echo ($param["user_id"]); ?>" placeholder="会员ID"/>&nbsp;&nbsp;&nbsp;
		商家号:
			<input type="text" name="business_id" style="width:120px;" value="<?php echo ($param["business_id"]); ?>" placeholder="商家号"/>&nbsp;&nbsp;&nbsp;
		店名:
			<input type="text" name="name" style="width:120px;" value="<?php echo ($param["name"]); ?>" placeholder="店名"/>&nbsp;&nbsp;&nbsp;
			<br><br>
		变更时间:
			<input type="text" style="width:120px;" name="starttime" value="<?php echo ($starttime); ?>" onclick="change_picktime()" placeholder="开始时间"/> - 
			<input type="text" style="width:120px;" name="endtime" value="<?php echo ($endtime); ?>" onclick="change_picktime()" placeholder="结束时间"/>
			&nbsp;&nbsp;&nbsp;
		
		
		
		
		<button type="button" class="btn btn-success search" id="" style="width:100px;">查询</button>&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-success export" style="width:100px;">导出</button>

		</div>
    </form>  
	<hr>
  
  <div class="row-fluid">
   
  <div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
             <h5>积分列表</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					  
					  <th style="width:30px;">序号</th>
					  <th>会员ID</th>
					  <th>可用积分</th>
					  <th>变更方式</th>
					  <th>收支类型</th>
					  <th>积分量</th>
					  <th>商家号</th>
					  <th>商家名</th>
					  <th>变更时间</th>
					  
                </tr>
              </thead>
            <tbody>

       <?php if(is_array($integInfo)): foreach($integInfo as $k=>$v): ?><tr>
				  <td style="text-align:center;"><?php echo ($k+1); ?></td>   
				  <td style="text-align:center;"><?php echo ($v["user_id"]); ?></td> 
				  <td style="text-align:center;"><?php echo ($v["change_point"]); ?></td> 
				  <td style="text-align:center;">
					<?php if($v["change_type"] == 1): ?>他人转增	 
					<?php elseif($v["change_type"] == 2): ?>兑换商品
					<?php elseif($v["change_type"] == 3): ?>赠送他人
					<?php elseif($v["change_type"] == 4): ?>扫码获取
					<?php else: ?>活动获取<?php endif; ?>
				  </td>
				  <td style="text-align:center;"> <?php if($v["type"] == 1): ?>增加<?php else: ?>扣减<?php endif; ?></td>	
				  <td style="text-align:center;"><?php echo ($v["point"]); ?></td> 
				  <td style="text-align:center;"><?php echo ($v["business_id"]); ?></td>
				  <td style="text-align:center;"><?php echo ($v["name"]); ?></td>
				  <td style="text-align:center;"><?php echo (date("Y-m-d H:i:s",$v["time"])); ?></td>
            </tr><?php endforeach; endif; ?>
			 <tr>
				<td colspan="13" align="center" style="text-align:center;">
					<?php echo $integPage?> 
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
<script>

$(function(){

	$(".search").bind("click",function(){
		var url = "/Home/Integ/integ_list";  
		//更改form的action  
		$("#submitForm").attr("action", url);  
		//触发submit事件，提交表单   
		$("#submitForm").submit();  
	});
	
	$(".export").bind("click",function(){
		var url = "/Home/Integ/integ_list_export";  
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