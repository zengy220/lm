<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>客服系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/css/matrix-media.css" />
<link rel="stylesheet" href="/Public/css/uniform.css" />
<link href="/Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/Public/css/jquery.gritter.css" />
<style type="text/css">
.user_identity option,.user_company option{
    text-align: center;
}
.user_identity,.user_company {
    width: 250px;
    padding: 0 2%;
    margin: 0;
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
  <div id="breadcrumb"> <a href="javascript:;" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="/Home/User/user_list" class="tip-bottom">员工列表</a> <a href="" class="current">增加员工</a> </div>
  <!-- <h1>用户</h1> -->
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    
     <div class="span6">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>增加员工</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/Home/User/user_add" method="post" class="form-horizontal" onsubmit="return check();">          
      <div class="control-group">
              <label class="control-label">姓名：</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="请填写真实姓名" name="real_name" id="real_name" style="width:250px;"/>
              </div>
            </div>
      
      <div class="control-group">
              <label class="control-label">手机：</label>
              <div class="controls">
              <input type="text" class="span2" style="width:250px;"  placeholder="请填写手机号码"  name="tel" id="tel"/>
        </div>
            </div>
      
            <div class="control-group">
              <label class="control-label">密码：</label>
              <div class="controls">
                <input type="password"  class="span11"  placeholder="密码必须是8到20位的数字和字母" name="password" id="password" style="width:250px;"/>
              </div>
            </div>
                    
      <div class="control-group">
              <label class="control-label">所属组织：</label>
              <div class="controls">
               <select name="user_company"    onchange="kefu(this);kefu2(this)"  class="user_company">
                  <option value="0">请选择</option>
          <?php if(is_array($company)): $i = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option name="user_company" class="zz" data-zz="<?php echo ($vo["company_id"]); ?>"  value="<?php echo ($vo["company_id"]); ?>" ><?php echo ($vo["company_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
         </select>
              </div>
            </div>

         <div class="control-group control-single">
              <label class="control-label">所属角色：</label>
              <div class="controls">
        <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><label>
                  <input type="radio" class="role" data-kf="<?php echo ($v["role_position"]); ?>" onclick=""  name="role_id" value='<?php echo ($v["role_Id"]); ?>' />
                  <?php echo ($v["role_name"]); ?>  
                </label><?php endforeach; endif; else: echo "" ;endif; ?>    
              </div>
            </div>


      <div class="control-group control-role" style="display:none;" id= 'test'>     
              <label class="control-label">所属客服：</label>
                <div class="controls"> 
                   <select name="real_name_to" class="user_company" id='scdslect'>
                     <option value="0">请选择</option>
                      
                   </select>
                </div>
            </div>

        <div class="control-group control-role" style="display:none;" id= 'test2'>     
              <label class="control-label">所属区域经理：</label>
                <div class="controls"> 
                   <select name="real_name_to2" class="user_company" id='scdslect2'>
                     <option value="0">请选择</option>
                      
                   </select>
                </div>
            </div>
  
            <div class="control-group">
              <label class="control-label">账号状态：</label>
              <div class="controls">
           <label>
          <input type="radio" name="is_use" value='1' checked /> 使用 
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="is_use" value='0' /> 禁用 
                 </label>                   
              </div>
            </div>
          
            
            <div class="form-actions" style="margin:0 180px;">
              <button type="submit" class="btn btn-success">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-success" onclick="history.back();">返回</button>
            </div>
            
          </form>
        </div>
      </div>
    
  
</div></div>
<div class="row-fluid">
  <div id="footer" class="span12"> 知味堂后台管理系统 </div>
</div>




<script src="/Public/js/jquery.min.js"></script> 
<script type='text/javascript'>
//产生随机数 
function GetRandomNum(Min,Max)
{   
  var Range = Max - Min;   
  var Rand = Math.random();   
  return(Min + Math.round(Rand * Range));   
}   

//随机业务号的生成
function generate_number(){
  
  var str='cs';
  var random_number=GetRandomNum(100000,999999);
  str+=random_number;
  $("#number").val(str);
  
}


$(function(){
  generate_number();
});
  
    

</script>
<script>

function check(){
  var username=$("#username").val();
  if(username==''){
    alert("用户名不能为空");
    return false;
  }
  
  var password=$("#password").val();
  if(password.match('^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,20}$') != password){
    alert("密码必须是8到20位的数字和字母");
    return false;
  } 

  var real_name=$("#real_name").val();
  if(real_name==""){
    alert("请输入真实姓名");
    return false;
  }

  
  var tel=$("#tel").val();
  if(tel.match('^1[0-9]{10}$') != tel){
    alert("请输入正确的手机号码");
    return false;
  }
  
  var user_company=$(".user_company").val();
  if(user_company == 0 || user_company == null){
  
    alert("请选择所属组织！");
    return false;
  }


  return true;
} 


</script>
<script>
$(document).ready(function(){

        $(".role").click(function(){ 
            //|获取当前对象的 data id 属性值  
            var a = $(this).attr("data-kf");  
            if( a ==3 ){
              $(".control-role").show();

            }else{
              $(".control-role").hide();
            }
        });  


    

});
</script>
<script>
function kefu(t){
  // alert(t.value);
           $("#scdslect").empty();
            $.ajax({        
                type: "POST",
                url: "/Home/User/ajax_kefu",
                data: {"name":t.value},
                dataType: "json",
                success: function (data) {
                    console.info(data);
                    selecthtml = '';
                    for (var i = 0; i < data.length; i++) {
                    
                        selecthtml  += "<option value='"+data[i].user_Id + "'>" +  data[i].real_name +"</option>";
                    }
                $("#scdslect").append(selecthtml);
                }
            });                      
};
//zy业务员绑定客服经理
function kefu2(t){
           $("#scdslect2").empty();
            $.ajax({        
                type: "POST",
                url: "/Home/User/ajax_kefu2",
                data: {"name":t.value},
                dataType: "json",
                success: function (data) {
                    console.info(data);
                    selecthtml = '';
                    for (var i = 0; i < data.length; i++) {
                    
                        selecthtml  += "<option value='"+data[i].user_Id + "'>" +  data[i].real_name +"</option>";
                    }
                $("#scdslect2").append(selecthtml);
                }
            });                      
};
//zy业务员绑定客服经理end
</script>
<script src="/Public/js/matrix.js"></script> 
</body>
</html>