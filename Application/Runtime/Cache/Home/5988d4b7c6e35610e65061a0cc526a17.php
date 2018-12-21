<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>知味堂后台管理平台</title>
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
    <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="" class="current">二维码规则</a>
	
  </div>
  
</div>
<div class="container-fluid">
  
  <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">顺序导出</a></li>
              <li class=""><a data-toggle="tab" href="#tab2">重复导出</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
			
            <div id="tab1" class="tab-pane active">
			<p style="padding:0 72px;">说明：紧接最后一次记录导出新的二维码段</p>
            <form action="/Home/Erweima/code_export" method="post" class="form-horizontal">
			
            <div class="control-group">
              <label class="control-label">选择导出码类别 :</label>
              <div class="controls">
				<select style="width:195px;" id="Rule_Id" name="Rule_Id" >
					<option value="0">请选择</option>
					<?php if(is_array($select_data)): foreach($select_data as $key=>$vo): ?><option value="<?php echo ($vo["Rule_Id"]); ?>"><?php echo ($vo["Rule_Id"]); ?> / <?php echo ($vo["Type_explain"]); ?></option><?php endforeach; endif; ?>
				</select>
				
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">本次导出数量 :</label>
              <div class="controls">
				<input type="text" class="span11" value="" id="Count" name="Count" style="width:180px;" onkeyup="this.value=this.value.replace(/\D/g,'')" maxlength="6" onafterpaste="this.value=this.value.replace(/\D/g,'')" placeholder="请输入数量"> 本次导出码段 : <span id="start-code"></span>-<span id="end-code"></span>
			  
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">导出说明 :</label>
              <div class="controls">
                <input type="text" class="span11" name="Derived_explain" id="Derived_explain" maxlength="100" style="width:300px;" placeholder="请输入说明"> 
				<button type="button" class="btn btn-success" onclick="on_submit();">导出</button>
              </div>
            </div>

			</form>
			
			</div>

            <div id="tab2" class="tab-pane ">
              <form action="/Home/Erweima/code_export" method="post" class="Repeated_export">
			
            <div class="control-group">
              <label class="control-label">选择导出码类别 :</label>
              <div class="controls">
				<select style="width:195px;" id="Rule_Id2" name="Rule_Id2" >
					<option value="0">请选择</option>
					<?php if(is_array($select_data)): foreach($select_data as $key=>$vo): ?><option value="<?php echo ($vo["Rule_Id"]); ?>"><?php echo ($vo["Rule_Id"]); ?> / <?php echo ($vo["Type_explain"]); ?></option><?php endforeach; endif; ?>
				</select>
				
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">本次导出码段 :</label>
              <div class="controls">
				<input type="text" class="span11" value="" id="Start_num" name="Start_num" style="width:180px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" placeholder="请输入起始码段"> -
				<input type="text" class="span11" value="" id="End_num" name="End_num" style="width:180px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" placeholder="请输入结束码段"> 最高码段限制 : <span id="end-code2"></span>
			  
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
              
				<button type="button" class="btn btn-success" onclick="on_submit2();">重复导出</button>
              </div>
            </div>

			</form>
          </div>
  </div>
 
  <div class="row-fluid">
   
  <div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
             <h5>规则列表</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					<th style="width:30px;">序号</th>
					<th>导出时间</th>
					<th>导出码段</th>
					<th>导出数量</th>
					<th>导出说明</th>
					<th>操作</th>
                </tr>
              </thead>
            <tbody>

       <?php if(is_array($code_derived)): foreach($code_derived as $ko=>$vo): ?><tr>
          <td><?php echo ($ko+1); ?></td>  
		  <td><?php echo (date('Y-m-d H:i:s',$vo["Derived_time"])); ?></td>
		  <td><?php echo ($vo["Start_num"]); ?> - <?php echo ($vo["End_num"]); ?></td>
		  <td><?php echo ($vo["Count"]); ?></td>
		  <td style="text-align:center;width:30%;"><div ><?php echo ($vo["Derived_explain"]); ?></div></td>

		  <td style="text-align:center;">
				<a href="/Home/Erweima/repeat_export_code/Id/<?php echo ($vo["Derived_Id"]); ?>" class="btn btn-success btn-mini" >重复导出</a>&nbsp;&nbsp;

		  </td>
		  
         </tr><?php endforeach; endif; ?>

        </tbody>
             
        </table>
            
          </div>
        </div>
      </div>
  
</div></div>

	
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->


<script src="/Public/js/jquery.min.js"></script> 
<script src="/Public/js/bootstrap.min.js"></script> 
<script src="/Public/js/matrix.js"></script> 
<script src="/Public/js/base.js"></script>
<script src="/Public/js/timepicker/WdatePicker.js"></script>

<script>
$(document).ready(function(){
	$("#Rule_Id").change(function(){
		var Rule_Id = $("#Rule_Id option:selected").val();
		if(Rule_Id != ''){
			
			$.ajax({
				url:"/Home/Erweima/ajax_get_type",
				data:{Rule_Id:Rule_Id},
				success:function(e){
					count = $("#Count").val();
					sum = e*1+count*1;
					$("#start-code").empty();
					$("#start-code").html(e);
					$("#end-code").html(sum);
				}
				
			});
			
		}

	});
	
	$("#Count").blur(function(){
		var	start_code = $("#start-code").html(),
			count = $("#Count").val()-1,
			sum = start_code*1+count*1;
		$("#end-code").empty();
		$("#end-code").html(sum);
		
	});

// 重复导出部分处理
	$("#Rule_Id2").change(function(){
		var Rule_Id = $("#Rule_Id2 option:selected").val();
		if(Rule_Id != ''){
			$.ajax({
				url:"/Home/Erweima/ajax_get_type",
				data:{Rule_Id:Rule_Id},
				success:function(e){
					$("#end-code2").html(e-1);
				}
				
			});
			
		}
	});

	$('#Start_num').blur(function(){
		var start_num = parseInt($('#Start_num').val()),
			max_num = parseInt($('#end-code2').html());

		if (start_num > max_num) {
			alert('码段不能超过最高码段限制');
			$('#Start_num').val('');
		}
	});

	$('#End_num').blur(function(){
		var end_num = parseInt($('#End_num').val()),
			max_num = parseInt($('#end-code2').html()),
			start_num = parseInt($('#Start_num').val());

		if (end_num > max_num) {
			alert('码段不能超过最高码段限制');
			$('#End_num').val('');
		}

		if (end_num < start_num) {
			alert('码段不能小于起始码段');
			$('#End_num').val('');
		}
	});

});
</script>
<script>
	function on_submit(){
		var Derived_explain = $("#Derived_explain").val(),
			Rule_Id = $("#Rule_Id").val(),
			Count   = $("#Count").val();
			
		if( Rule_Id == '' || Rule_Id == 0 ){
			alert("必须选择二维码类别！");return;
		}else if( Count == '' || Rule_Id == 0){
			alert("必须填写导出数量！");return;
		}
		
		$(".form-horizontal").submit();
		
		
		
	}



</script>
<script>
	function on_submit2() {
		var Rule_Id = $('#Rule_Id2').val(),
			Start_num = $('#Start_num').val(),
			End_num = $('#End_num').val();

		if (Rule_Id == '' || Rule_Id == 0) {
			alert('必须选择二维码类别！');return;
		}else if( Count == '' || Rule_Id == 0){
			alert("必须填写导出数量！");return;
		}

		$(".Repeated_export").submit();
	}
</script>

</body>
</html>