<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<title>用户登录</title>
</head>

<body class="login-layout Reg_log_style">
<div class="logintop">    
    <span>欢迎后台管理界面平台</span>    
    <ul>
    <li><a href="#">返回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    <div class="loginbody">
     <form action="<?= Url::to(['index/login_do']);?>" method="post">
<div class="login-container">
	<div class="center"> <img src="images/logo.png" /></div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box widget-box no-border visible">				
                                  <div class="login-main">
                                  <div class="clearfix">
                                  <div class="login_icon"><img src="images/login_img.png" /></div>
									<form class="" style=" width:300px; float:right; margin-right:50px;">
                                    <h4 class="title_name"><img src="images/login_title.png" /></h4>
										<fieldset>
                   
										<ul>
   <li class="frame_style form_error"><label class="user_icon"></label><input name="username" type="text" data-name="用户名" id="username" /></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="password" type="password"   data-name="密码" id="userpwd"/></li>
    
  </ul>
    <div class="space"></div>
                              <div class="clearfix">
                                  <label class="inline">
                                      <input type="checkbox" class="ace">
                                      <span class="lbl">保存密码</span>
                                  </label>

                                  <button type="submit" > 登&nbsp;陆 </button>
                              </div>
</form>
                              <div class="space-4"></div>
                          </fieldset>
                      </form>
</div>
                      <div class="social-or-login center">
                          <span class="bigger-110">通知</span>
                      </div>

                      <div class="social-login ">
                      为了更好的体验性，本网站系统不再对IE8（含IE8）以下浏览器支持，请见谅。
                      </div>
                  </div><!-- /login-main -->

          
          <!-- /widget-body -->
          </div><!-- /login-box -->
      </div><!-- /position-relative -->
  </div>
 </div>
                        <div class="loginbm">版权所有  2016  <a href=""></a> </div><strong></strong>
</body>
</html>
<script src="js/jquery.js" type="text/javascript" ></script>
<script>
$("#username").blur(function(){
  var username = $("#username").val();
  var reg = /^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/;
  if (!reg.test(username)) {
    alert("请输入正确的用户名");
  }
});

</script>
