<base href="<?php echo base_url();?>" />
<!-- BEGIN SIDEBAR -->

<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul class="page-sidebar-menu">
		<li style="margin-bottom:20px;">
		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		<div class="sidebar-toggler hidden-phone">
		</div>
		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start">
		<a href="admin.php">
		<i class="ion-home"></i>
		<span class="title">首页</span>
		</a>
		</li>
		<li id="menu1" class="<?php echo  $menu == 1?"active open":"" ?>">
		<a class="active" href="javascript:;">
		<i class="ion-cube"></i><span class="title">学院信息</span>
		<span class="arrow ion-ios-arrow-left"></span>
		</a>
		<ul class="sub-menu" style="display: <?php echo  $menu == 1?"block":"none" ?>;">
			<li id="sub_menu11"><a href="admin.php/baseinfo/introduce">学院简介</a></li>
			<li id="sub_menu14"><a href="admin.php/moralEducation/getlist">德育天地</a></li>
			<li id="sub_menu15"><a href="admin.php/specialties/getlist">专业信息</a></li>
			<li id="sub_menu18"><a href="admin.php/album/getlist">学院风光</a></li>
		</ul>
		</li>
		<li id="menu2" class="<?php echo  $menu == 2?"active open":"" ?>">
		<a class="active" href="javascript:;">
		<i class="ion-briefcase"></i><span class="title">学院动态</span>
		<span class="arrow ion-ios-arrow-left"></span>
		</a>
		<ul class="sub-menu" style="display: <?php echo  $menu == 2?"block":"none" ?>;">
			<li id="sub_menu13"><a href="admin.php/news/getlist">新闻动态</a></li>
			<li id="sub_menu23"><a href="admin.php/Activity/getlist">活动专区</a></li>
			<li id="sub_menu17"><a href="admin.php/openNews/getlist">通知公告</a></li>
			<li id="sub_menu17"><a href="admin.php/users/getlist">交友专区</a></li>
		</ul>
		</li>
		<li id="menu3" class="<?php echo  $menu == 3?"active open":"" ?>">
		<a class="active" href="javascript:;">
		<i class="ion-stats-bars"></i><span class="title">高级功能</span>
		<span class="arrow ion-ios-arrow-left"></span>
		</a>
		<ul class="sub-menu" style="display: <?php echo  $menu == 3?"block":"none" ?>;">
			<li id="sub_menu31"><a href="admin.php/response/response">回复设置</a></li>
			<li id="sub_menu33"><a href="admin.php/msg/getlist">留言列表</a></li>
		</ul>
		</li>
		<li id="menu5" class="<?php echo  $menu == 4?"active open":"" ?>">
		<a class="active" href="javascript:;">
		<i class="ion-android-drafts"></i><span class="title">系统中心</span>
		<span class="arrow ion-ios-arrow-left"></span>
		</a>
		<ul class="sub-menu" style="display: <?php echo  $menu == 4?"block":"none" ?>;">
			<li id="sub_menu51"><a href="admin.php/SystemSetting/advertupdate">轮播图设置</a></li>
		</ul>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>


<!-- END SIDEBAR -->
