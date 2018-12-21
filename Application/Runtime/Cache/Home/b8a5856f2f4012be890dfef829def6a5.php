<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>湖南省中药材综合信息服务平台后台管理系统</title>
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
    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        UE.getEditor('col_content',{    //content为要编辑的textarea的id
            initialFrameWidth: 800,   //初始化宽度
            initialFrameHeight: 500,   //初始化高度
        });
    </script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1>湖南省中药材综合信息服务平台后台管理系统</h1>
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
            <div class="span16">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5><?php echo ($col_title); ?></h5>
                    </div>
                    <div class="widget-content nopadding">

                        <form action="<?php echo ($col_from_url); ?>" method="post" onsubmit="return checkfile(1,'thumb');" class="form-horizontal"  enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">归属栏目 :</label>
                                <div class="controls">
                                    <select name="col_id" id="col_id">
                                        <option value="0"></option>
                                        <?php if(is_array($columnlist)): foreach($columnlist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if( $vo["id"] == $content_data["col_id"] ): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>(为空是一级目录)
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">标题 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="不超过20个字" maxlength="20" name="title" value="<?php echo ($content_data["title"]); ?>" style="width:220px;"/>
                                   </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">副标题 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="不超过32个字" maxlength="32" name="subtitle" value="<?php echo ($content_data["subtitle"]); ?>" style="width:220px;"/>
                                 </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">发布时间 :</label>
                                <div class="controls">
                                    <input type="text" class="span2" id="create_time" name="create_time" value="<?php echo ($time); echo ($content_data["create_time"]); ?>" onclick="change_picktime()" placeholder="" />

                                </div>
                            </div>
                            <div class="control-group">
                            <div class="control-group">
                                <label class="control-label">上传封面图片 :</label>
                                <div class="controls">
                                    <!--<?php if( $content_data["thumb"] != '' ): ?><img src="<?php echo ($content_data["thumb"]); ?>"><?php endif; ?>-->
                                    <input type="file" class="span11"  name="thumb" id="thumb"    onchange="checkfile(1,'thumb')"  style="width:220px;"/>（选填，建议尺寸：350*200px，jpg格式）
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">简述 :</label>
                                <div class="controls">
                                   <textarea name="description"><?php echo ($content_data["description"]); ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">内容 :</label>
                                <div class="controls">
                                   <textarea name="contents" id="col_content"><?php echo ($content_data["contents"]); ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">操作 :</label>
                                <div class="controls">
                                    <input name="istop" type="checkbox" value="1"  <?php if( $content_data["istop"] == 1 ): ?>checked<?php endif; ?> />置顶
                                    <input name="status" type="checkbox" value="0"   <?php if( $content_data["status"] == 0 ): ?>checked<?php endif; ?>  />隐藏
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
  <div id="footer" class="span12"> 湖南省中药材综合信息服务平台后台管理系统 </div>
</div>


    <!--end-Footer-part-->
        <script type="text/javascript">
            var maxsize = 1*1024*1024;//1M
            var errMsg = "上传的附件文件不能超过1M！！！";
            var tipMsg = "您的浏览器暂不支持计算上传文件的大小，确保上传文件不要超过2M，建议使用IE、FireFox、Chrome浏览器。";
            var  browserCfg = {};
            var ua = window.navigator.userAgent;
            if (ua.indexOf("MSIE")>=1){
                browserCfg.ie = true;
            }else if(ua.indexOf("Firefox")>=1){
                browserCfg.firefox = true;
            }else if(ua.indexOf("Chrome")>=1){
                browserCfg.chrome = true;
            }
            function checkfile(){
                try{
                    var obj_file = document.getElementById("thumb");
                    var fileTArr= document.getElementById("thumb").value.toLowerCase().split(".");
                    var filetype=fileTArr[fileTArr.length-1];

                    if(obj_file.value==""){
                        //alert("请先选择上传文件");
                        return true;
                    }
                    if(!/(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(filetype))
                    {
                        alert("文件类型必须是.gif,jpeg,jpg,png中的一种");
                        return false;
                    }
                    var filesize = 0;
                    if(browserCfg.firefox || browserCfg.chrome ){
                        filesize = obj_file.files[0].size;  //如果用jquery是obj_file[0]
                    }else if(browserCfg.ie){
                        var obj_img = document.getElementById('thumb');
                        obj_img.dynsrc=obj_file.value;
                        filesize = obj_img.fileSize;
                    }else{
                        alert(tipMsg);
                        return false;
                    }
                    if(filesize==-1){
                        alert(tipMsg);
                        return false;
                    }else if(filesize>maxsize){
                        alert(errMsg);
                        return false;
                    }else{
                        //alert("文件大小符合要求");
                        return true;
                    }
                }catch(e){
                    alert(e);
                }
            }
        </script>

    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/client.js"></script>
    <script src="/Public/js/matrix.js"></script>
    <script src="/Public/js/timepicker/WdatePicker.js"></script>
    <script src="/Public/js/base.js"></script>


</body>
</html>