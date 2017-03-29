<!DOCTYPE html>
<base href="<?php echo base_url();?>" />
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit">
	<title>我的后台</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="media/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<link href="media/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="media/css/style.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="media/css/login-soft.css" rel="stylesheet" type="text/css">
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="media/image/favicon.ico" />
	<style type="text/css">
		.login .content .input-icon .m-wrap{height:34px;line-height: 34px;padding-top: 0px !important;padding-bottom: 0px !important;}
	</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<img src="media/image/favicon.ico" alt="" style="width:80px;height:auto;"/>
	</div>
	<!-- END LOGO -->

	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="form-vertical login-form" action="<?php echo base_url();?>admin.php/login/check" method="post">
			<h3 class="form-title">我的后台</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span>请输入您的用户名和密码！</span>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">用户名</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="ion-ios-person"></i>
						<input class="m-wrap placeholder-no-fix" type="text" name="username" id="textfield" placeholder="用户名"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="ion-ios-locked"></i>
						<input class="m-wrap placeholder-no-fix" type="password" name="password" id="textfield2" placeholder="密码"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" id="submit_btn" class="btn green pull-right">
				登录<i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
		</form>
		<!-- END LOGIN FORM -->
	</div>
	<!-- END LOGIN -->

	<!-- BEGIN COPYRIGHT -->
	<!-- END COPYRIGHT -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="media/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="media/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="media/js/jquery.backstretch.min.js" type="text/javascript"></script>

	<script src="media/js/app.js" type="text/javascript"></script>
	<script src="media/js/login-soft.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {
		  App.init();
		  Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
