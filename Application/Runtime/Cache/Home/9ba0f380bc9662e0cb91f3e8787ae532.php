<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>二维码类别</title>
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
    
    <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="" class="current">二维码类别</a>
  </div>
  
</div>
<div class="container-fluid">
  <hr>
  <a href="javascript:;" class="btn btn-success btn" onclick="pitch_on()">新增类别</a>
  <div class="row-fluid">
   
  <div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
             <h5>类别列表</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					  <th style="width:30px;">序号</th>
					  <th>类别编号</th>
					  <th>类别说明</th>
					  <th>扫码限制</th>
					  <th>操作</th>
                </tr>
              </thead>
            <tbody>

       <?php if(is_array($data)): foreach($data as $ko=>$vo): ?><tr>
          <td><?php echo ($ko+1); ?></td>  
		  <td><?php echo ($vo["Type_num"]); ?></td>
		  <td><?php echo ($vo["Type_explain"]); ?></td>
		  <td style="text-align:center;"><?php if($vo["Type_astrict"] == 1): ?>同一用户限扫一次<?php else: ?>同一码号限扫一次<?php endif; ?></td>

		  <td style="text-align:center;">
				<a href="/Home/Erweima/edit_code_type/Id/<?php echo ($vo["Id"]); ?>" class="btn btn-danger btn-mini" style="background:#00f;">修改</a>

		  </td>
          </tr><?php endforeach; endif; ?>

        </tbody>
             
        </table>
            
          </div>
        </div>
      </div>
  
</div></div>

<div class="shade shade-f" style="display:none;" onclick="hid();"></div>
<div class="popup popup-s" style="display:none;">
	
<form action="/Home/Keep/quit_goods" method="post">
	<div class="popup-1">
		<span class="row-height"><strong>添加二维码类别</strong></span>
	</div>
	<div class="popup-2" style="margin:10px 15px 5px 25px">
	
		<div class="control-group">
			<span><strong>类别说明:</strong></span>&nbsp;&nbsp;&nbsp;
			<input type="text" value="" id="Type_explain" name="Type_explain" style="width:250px;" />
		</div>
		
		<div class="control-group">
			<span><strong>扫码限制:</strong></span>&nbsp;&nbsp;&nbsp;
			<select style="width:180px;" id="Type_astrict" name="Type_astrict">
				<option value="0">请选择</option>
				<option value="1">同一用户限扫一次</option>
				<option value="2">同一码号限扫一次</option>
			</select>
		</div>

		<button type="button" class="btn btn-success" id="submit_success" onclick="audit_submit();" style="width:80px; margin:55px 88px;">提交</button>
			
		<button type="button" class="btn btn-warning" id="submit_disagree" onclick="hid();" style="width:80px; margin:0px 10px;">取消</button>
		
	</div>
</form>
	
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->


<script src="/Public/js/jquery.min.js"></script> 
<script src="/Public/js/matrix.js"></script> 
<script type="text/javascript">
	function pitch_on(){
		$(".shade").show();
		$(".popup").show(200);
	}
	
	function hid(){
		$(".shade").hide();
		$(".popup").hide(200);
	}
	
	function audit_submit(){
		var m = $("#Type_explain").val(),
			k = $("#Type_astrict").val();
			
		if(m == ''){
			alert("请输入类别说明！");
			return false;
		}else if( k == 0 ) {
			alert("请选择扫码限制！");
			return false;
			
		}else{
		
			$.ajax({
				url:"/Home/Erweima/add_code_type",
				data:{ Type_explain:m, Type_astrict:k },
				success:function(e){

					if(e == 901){
						alert("请输入类别说明！");
						return;
					}else if(e == 902){
						alert("请选择扫码限制！");
						return;
					}else if(e == 999){
						alert("添加失败！");
						return;
					}else{
						alert('添加成功！');
						window.location.reload();
					}
					
				}
				
			});
			
		}
	
	
	}
</script>
</body>
</html>