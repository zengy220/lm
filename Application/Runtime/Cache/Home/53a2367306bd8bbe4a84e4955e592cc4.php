<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>知味堂后台管理系统</title>
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
        .table th,.table td {text-align:left}
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
        <div id="breadcrumb"> <a href="javascript:;" class="tip-bottom">栏目设置</a> <a href="#" class="current"><?php echo ($col_title); ?></a> </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5><?php echo ($col_title); ?></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?php echo ($col_from_url); ?>" method="post" class="form-horizontal" onsubmit="return check();"  enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">栏目名称 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="不超过10个字" name="name" id="name" value="<?php echo ($col_data["name"]); ?>" style="width:220px;"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">栏目排序 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="序号越小越靠前" name="sort" id="sort" value="<?php echo ($col_data["sort"]); ?>" style="width:220px; "  onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">父栏目 :</label>
                                <div class="controls">
                                    <select name="pid" id="pid">
                                        <option value="0"></option>
                                        <?php if(is_array($columnlist)): foreach($columnlist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if( $vo["id"] == $col_data["pid"] ): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>(为空是一级目录)
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">栏目简码 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="如：蓝杉新闻，简码为”LSXW“" name="tpcode" id="tpcode" value="<?php echo ($col_data["tpcode"]); ?>" style="width:220px;"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">栏目标题缩略图 :</label>
                                <div class="controls">
                                    <!--<?php if( $col_data["thumb"] != '' ): ?><img src="<?php echo ($col_data["thumb"]); ?>"><?php endif; ?>-->
                                    <input type="file" class="span11"  name="thumb" id="thumb" onchange="checkfile(1,'thumb')"  style="width:220px;"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">栏目URL :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="" name="col_url"  id="col_url"  value="<?php echo ($col_data["col_url"]); ?>" style="width:220px;"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">套用模版 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="" name="tpl"  id="tpl" value="<?php echo ($col_data["tpl"]); ?>" style="width:220px;"/>
                                </div>
                            </div>


                    <div class="control-group">
                        <label class="control-label">状态 :</label>
                        <div class="controls">
                            <label>
                                <input type="radio" name="status" value='0' <?php if( $col_data["status"] == 0 || $col_data["status"] == '' ): ?>checked<?php endif; ?>/>
                                禁用</label>
                            <label>
                                <input type="radio" name="status" value='1' <?php if( $col_data["status"] == 1 ): ?>checked<?php endif; ?>/>
                                使用</label>

                        </div>
                    </div>
                    <!--<div class="control-group">
                        <label class="control-label" name="manu_or">验证码:</label>
                        <div class="controls" style="cursor:pointer;">
                            <input type="text" class="span2" name="verify"/><span><img src='/User/verify/' onclick="this.src='/User/verify/'+Math.random()" /></span>
                        </div>
                    </div>-->
                    <input type="hidden" name="u" value="<?php echo ($u); ?>" />
                    <input type="hidden" name="o" value="<?php echo ($col); ?>" />

                    <div class="form-actions" style="margin:0 180px;">
                        <button type="submit" class="btn btn-success">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success" onclick="history.back();">返回</button>
                    </div>
                    </form>
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
    <script src="/Public/js/client.js"></script>
    <script src="/Public/js/matrix.js"></script>
    <script src="/Public/js/timepicker/WdatePicker.js"></script>
    <script src="/Public/js/base.js"></script>

        <script type='text/javascript'>

            function check(){
                if(!checkfile(1,'thumb')){
                    return false;
                }
                var title=$("#name").val();
                if(title==''){
                    alert("请填写栏目名称");
                    return false;
                }

                if(title.length>10){
                    alert("标题不能多于10个字");
                    return false;
                }

                var sort=$("#sort").val();
                if(sort==''){
                    alert("请填写栏目排序");
                    return false;
                }

                var ad_list_id=$("#tpcode").val();
                if(ad_list_id==''){
                    alert("请填写栏目简码");
                    return false;
                }

                var col_url=$("#col_url").val();
                if(col_url==''){
                    alert("请填写栏目URL");
                    return false;
                }
                var tpl=$("#tpl").val();
                if(tpl==''){
                    alert("请填写套用模版");
                    return false;
                }
                return true;
            }


        </script>

        <script src="/Public/js/uploadimg.js"></script>

</body>
</html>