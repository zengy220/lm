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
    <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> 
	<a href="/Home/Erweima/code_rule" class="tip-bottom">二维码规则</a>
	<a href="" class="current">中奖设置</a>
	
  </div>
  
</div>
<div class="container-fluid"><hr>
<!-- primary -->
	<div style="border:0px ;margin:15px 0 0 0;display:block;height:30px;">
		<?php if(is_array($code_prize)): foreach($code_prize as $key=>$vo): ?><a href="<?php echo ($vo["url"]); ?>" class="btn <?php if( $vo["Prize_id"] == $Prize_type ): ?>btn-success<?php endif; ?>" style="margin:0 5px 0 0;"><?php echo ($vo["Prize_title"]); ?></a><?php endforeach; endif; ?>
		<input type="hidden" name="code_title" id="code_title" value="<?php echo ($code_title); ?>" />
		
		<a href="javascript:;" class="btn btn-success" onclick="show_code()" style="margin:0 0 0 50px;">添加奖品</a>
		<a href="javascript:;" class="btn btn-primary  btn-mini" onclick="del_prize(<?php echo ($Prize_type); ?>)" style="margin:0 10px;">删除奖品</a>
	</div>
	
	<div style="border:1px solid #cdcdcd;margin:15px 0 0 0;display:block;height:38px;">
	
		<h5 style="display:block;font-size:13px;width:70px;padding:0 0 0 10px;float:left;">奖品类别：</h5>
		<h6 style="display:block;font-size:13px;width:80px;padding:0 10px;float:left;font-weight:normal;">
		<?php if( $code_type == 1 ): ?>积分<?php elseif( $code_type == 2 ): ?>现金<?php elseif( $code_type == 3 ): ?>实物<?php endif; ?>
		</h6>
		
		<h5 style="display:block;font-size:13px;width:70px;padding:0 0 0 10px;float:left;">中奖条件：</h5>
		<h6 style="display:block;font-size:13px;width:80px;padding:0 10px;float:left;font-weight:normal;">
		<?php if( $Prize_condition == 1 ): ?>扫码即中<?php elseif( $Prize_condition == 2 ): ?>前奖未中<?php endif; ?>
		</h6>
		
		<?php if(empty($code_prize)): else: ?>
		<a href="javascript:;" class="btn btn-success" onclick="pitch_on()" style="float:right;margin:4px 4px 0 0">添加奖项</a><?php endif; ?>
	</div>
	
<div class="row-fluid">
 
  <div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
             <h5>奖项列表</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					<th style="width:80px;">奖项序号</th>
					<th><?php if( $Prize_type == 1 ): ?>分值<?php elseif( $Prize_type == 2 ): ?>金额<?php else: ?>实物<?php endif; ?></th>
					<th>中奖率</th>
					<th>操作</th>
                </tr>
              </thead>
            <tbody>

			   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["Classify_Id"]); ?></td>  
					<td><?php echo ($vo["Classify_resource"]); ?></td>
					<td><?php echo ($vo["Classify_probability"]); ?>%</td>
					<td style="text-align:center;width:280px;">
						<a href="/Home/Erweima/edit_code_prize/classifyid/<?php echo ($vo["Classify_Id"]); ?>" class="btn btn-success btn-mini" >修改</a>&nbsp;&nbsp;
						<a href="javascript:;" class="btn btn-primary btn-mini" onclick="del_code_prize(<?php echo ($vo["Classify_Id"]); ?>)" >删除</a>
					</td>
				</tr><?php endforeach; endif; ?>

			</tbody>
             
        </table>
            
          </div>
        </div>
      </div>
  
</div></div>

<div class="shade shade-f" style="display:none;" onclick="hid();"></div>
<div class="popup popup-s" style="display:none; ">
	
	<div class="popup-1">
		<span class="row-height"><strong>添加奖项</strong></span>
	</div>
	<div class="popup-2" style="margin:10px 15px 5px 25px" style="width:100%;">
		
		<div class="control-group" style="height:15px;">
			<div style="float:left;width:80px;text-align: right;padding:0 15px;"><strong><?php if( $code_type == 1 ): ?>积分<?php elseif( $code_type == 2 ): ?>现金金额<?php else: ?>奖品名称<?php endif; ?>:</strong></div>
			<div style="float:left;"><input type="text" value="" id="communal" name="communal" maxlength="10" style="width:150px;"/></div>
			
		</div><br>
		
		<div class="control-group">
			<div style="float:left;width:80px;text-align: right;padding:0 15px;"><strong>中奖率:</strong></div>
			<div style="float:left;"><input type="text" value="" id="Classify_probability" name="Classify_probability" style="width:150px;" onkeyup="this.value=this.value.replace(/\D/g,'')" maxlength="3" onafterpaste="this.value=this.value.replace(/\D/g,'')" placeholder="例:100" /> %</div>

		</div>

		<div style="width:100%;margin:20% 0;">
			<div style="width:49.8%;float:left;text-align:center;"><button type="button" class="btn btn-success" id="submit_success" onclick="audit_submit();" style="width:40%;">提交</button></div>
			
			<div style="width:49%;float:left;text-align:center;"><button type="button" class="btn btn-warning" id="submit_disagree" onclick="hid();" style="width:40%;">取消</button></div>
		</div>
		
	</div>
	
</div>

<input name="Prize_type" id="Prize_type" type="hidden" value="<?php echo ($Prize_type); ?>" />
<input name="Rule_Id" id="Rule_Id" type="hidden" value="<?php echo ($Rule_Id); ?>" />

<div class="popup-code popup-s" style="display:none; ">
	
	<div class="popup-1">
		<span class="row-height"><strong>添加奖品</strong></span>
	</div>
	<div class="popup-2" style="margin:0px;padding:10px;width:100%; height:250px;">
		
		<div class="control-group" style="height:40px;">
			<div style="float:left;width:80px;text-align: right;padding:0 15px;"><strong>奖品名称：</strong></div>
			<div style="float:left;"><input type="text" value="" id="Prize_title" maxlength="10" name="Prize_title" style="width:200px;"/></div>
			
		</div>
		
		<div class="control-group" style="height:40px;">
			<div style="float:left;width:80px;text-align: right;padding:0 15px;"><strong>奖品类别：</strong></div>
			<div style="float:left;">
				<label style="display:inline;"><input name="PrizeType" id="PrizeType" type="radio" value="1">积分</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<label style="display:inline;"><input name="PrizeType" id="PrizeType" type="radio" value="2">现金</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<label style="display:inline;"><input name="PrizeType" id="PrizeType" type="radio" value="3">实物</label>
			</div>

		</div>
		
		<div class="control-group" style="height:50px;">
			<div style="float:left;width:80px;text-align: right;padding:0 15px;"><strong>中奖条件：</strong></div>
			<div style="float:left;">
				<label style="display:inline;"><input name="Prize_condition" id="Prize_condition" type="radio" value="1">扫码即中</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<label style="display:inline;"><input name="Prize_condition" id="Prize_condition" type="radio" value="2">前奖未中</label>

			</div>

		</div>
		
		<div style="width:100%;">
			<div style="width:49.8%;float:left;text-align:center;"><button type="button" class="btn btn-success" id="submit_success" onclick="code_submit();" style="width:40%;">提交</button></div>
			
			<div style="width:49%;float:left;text-align:center;"><button type="button" class="btn btn-warning" id="submit_disagree" onclick="hid();" style="width:40%;">取消</button></div>
		</div>
		
		
	</div>

	
</div>


<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>


<!--end-Footer-part-->

<script src="/Public/js/jquery.min.js"></script> 
<script src="/Public/js/matrix.js"></script> 
<script src="/Public/js/base.js"></script>
<script src="/Public/js/timepicker/WdatePicker.js"></script>

<script type="text/javascript">
	function pitch_on(){
		$(".shade").show();
		$(".popup").show(200);
	}
	
	function show_code(){
		$(".shade").show();
		$(".popup-code").show(200);
	}
	
	function hid(){
		$(".shade").hide();
		$(".popup").hide(200);
		$(".popup-code").hide(200);
	}
	
	function audit_submit(){
		var Classify_probability = $("#Classify_probability").val(),
			communal  = $("#communal").val(),
			Prize_type= $("#Prize_type").val(),
			Rule_Id	  = $("#Rule_Id").val();

			
			if(Prize_type==1){
				if(communal == ''){
					alert("积分数值必须填写！");
					return;
				}
				
			}else if(Prize_type==2){
				if(communal == ''){
					alert("金额数值必须填写！");
					return;
				}
				
			}else if(Prize_type==3){
				
				if(communal == ''){
					alert("奖品名称必须填写！");
					return;
				}
				
			}
			
			if(Classify_probability == ''){
				alert("中奖率必须填写！");
				return;
			}
			
			$.ajax({
				url:"/Home/Erweima/add_code_prize",
				type:"POST",
				data:{ 
					Classify_probability:Classify_probability, 
					communal:communal,
					Prize_type:Prize_type,
					Rule_Id:Rule_Id,
					},
				success:function(e){
					if(e == 901){
						alert("参数缺失！");
						return;
					}else if(e == 902){
						alert("添加失败！");
						return;
					}else if(e == 903){
						alert("中奖总概率不能超过100%！");
						return;
					}else if(e == '000'){
						alert("添加成功！");
						window.location.reload();
					}else{
						alert('您没有权限！');
						return;
					}
					
				}
				
			});
	}
	
//删除奖项
	function del_code_prize(e){
		if(confirm('是否确定删除!')==false){
			return  false;
		}
		if(e != ''){
			$.ajax({
				url:"/Home/Erweima/del_code_prize",
				data:{ id:e},
				type:"POST",
				success:function(e){
					if(e == 901){
						alert("删除失败！");
						return;
						
					}else if( e == '000' ){
						alert("删除成功！");
						window.location.reload();
						
					}else{
						alert('您没有权限！');
						return;
					}
				}
			});
		}else{
			alert("缺少必要参数！");
		}
		
	}
	
//删除奖品
	function del_prize(e){
		var t= $("#code_title").val(),
		text = "删除【"+t+"】会连同奖项一起删除！ \n \n确定删除【"+ t +"】？";
	
		if(confirm(text)==false){
			return  false;
		}
		
		if(e != ''){
			$.ajax({
				url  : "/Home/Erweima/del_prize",
				data : { id:e },
				type : "POST",
				success:function(e){
					if(e == 901){
						alert("删除失败！");
						return;
						
					}else if(e == 902){
						alert("参数异常！");
						return;
						
					}else if(e == '000'){
						alert("删除成功！");
						window.location.reload();
						
					}else{
						alert('您没有权限！');
						return;
						
					}
					
				}
				
			});
			
		}else{
			alert("缺少必要参数！");
		}
		
	}
	
//添加奖品
	function code_submit(){
	
		var Prize_condition= $("#Prize_condition:checked").val(),
			PrizeType   = $("#PrizeType:checked").val(),
			Prize_title = $("#Prize_title").val(),
			Rule_Id	    = $("#Rule_Id").val();
			if(Rule_Id != ''){
			
				if(Prize_title == ''){
					alert("必须填写奖品名称！");
					return;
					
				}else if(PrizeType == '' || PrizeType == undefined){
					alert("必须选择奖品类别！");
					return;
					
				}else if(Prize_condition == '' || Prize_condition == undefined){
					alert("必须选择中奖条件！");
					return;
					
				}
				
				$.ajax({
					url:"/Home/Erweima/add_prize",
					type:"POST",
					data:{ 
						Prize_condition:Prize_condition, 
						PrizeType:PrizeType,
						Prize_title:Prize_title,
						Rule_Id:Rule_Id,
						},
					success:function(e){

						if(e == 901){
							alert("参数缺失！");
							return;
						}else if(e == 902){
							alert("添加失败！");
							return;
						}else if(e == '000'){
							alert("添加成功！");
							window.location.reload();
						}else{
							alert('您没有权限！');
							return;
							
						}
						
						
					}
				
				});
			
				
			}else{
				alert('参数错误！');
				return;
			}

			
	}
	
</script>
</body>
</html>