<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<!-- 二维码兑换单列表 -->
<title>订单列表</title>
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
    
    <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">兑换单列表</a>
  </div>
  <!-- <h1>订单</h1> -->
</div>
<div class="container-fluid">
  
  <div class="row-fluid">
   
  <div class="span11">
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
             <h5>兑换单列表</h5>
          </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
					  
					  <th style="width:30px;">序号</th>
					  <th>兑换单号</th>
					  <th>兑换时间</th>
					  <th>会员ID</th>
					  <th>商品名称</th>
					  
					  <th>商品数量</th>
					  <th>使用积分</th>
					  <th>商家号</th>
					 
                </tr>
              </thead>
            <tbody>

       <?php if(is_array($erOrderInfo)): $i = 0; $__LIST__ = $erOrderInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
         
          <td style="text-align:center;"><?php echo ($vo["id"]); ?></td>   
		  <td style="text-align:center;"><?php echo ($vo["orderno"]); ?></td>
          <td style="text-align:center;"><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>	
          <td style="text-align:center;"><?php echo ($vo["user_id"]); ?></td> 
		  <td style="text-align:center;"><?php echo ($vo["name"]); ?></td>
		  
		  <td style="text-align:center;">1</td>
		  <td style="text-align:center;"><?php echo ($vo["points"]); ?></td>
		  <td style="text-align:center;"><?php echo ($vo["business_id"]); ?></td>

          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			 <tr>
				<td colspan="13" align="center" style="text-align:center;">
					<?php echo $erOrderPage?> 
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

<script src="/Public/js/excanvas.min.js"></script> 
<script src="/Public/js/jquery.min.js"></script> 
<script src="/Public/js/jquery.ui.custom.js"></script> 
<script src="/Public/js/bootstrap.min.js"></script> 
<script src="/Public/js/jquery.flot.min.js"></script> 
<script src="/Public/js/jquery.flot.resize.min.js"></script> 
<script src="/Public/js/jquery.peity.min.js"></script> 
<script src="/Public/js/fullcalendar.min.js"></script> 
<script src="/Public/js/matrix.js"></script> 
<script src="/Public/js/matrix.dashboard.js"></script> 
<script src="/Public/js/jquery.gritter.min.js"></script> 
<script src="/Public/js/matrix.interface.js"></script> 
<script src="/Public/js/matrix.chat.js"></script> 
<script src="/Public/js/jquery.validate.js"></script> 
<script src="/Public/js/matrix.form_validation.js"></script> 
<script src="/Public/js/jquery.wizard.js"></script> 
<script src="/Public/js/jquery.uniform.js"></script> 
<script src="/Public/js/select2.min.js"></script> 
<script src="/Public/js/matrix.popover.js"></script> 
<script src="/Public/js/jquery.dataTables.min.js"></script> 
<script src="/Public/js/matrix.tables.js"></script>

<script type="text/javascript">
	//禁用商家
	function freezeBusiness(busi_id){
		//alert(busi_id);exit;
		if(confirm('确认要冻结该商家？')){
			window.location.href = "/Home/Business/freezeBusiness/busi_id/"+ busi_id;
		}	
	}

	//解禁商家
	function unfreezeBusiness(busi_id){
		if(confirm('确认要解禁该商家？')){
			window.location.href = "/Home/Business/unfreezeBusiness/busi_id/"+ busi_id;
		}	
	}
	
	//删除商家
	function delBusiness(busi_id){
		if(confirm('确认删除该商家？删除后不可恢复！')){
			window.location.href = "/Home/Business/delBusiness/busi_id/"+ busi_id;
		}	
	}
	
	//修改商家
	function updateBusiness(busi_id){
		if(confirm('确认修改该商家信息？')){
			window.location.href = "/Home/Business/updateBusiness/busi_id/"+ busi_id;
		}
	}
	
  function goPage (newURL) {
      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>