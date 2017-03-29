<!-- BEGIN HEADER -->
  <div class="header navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="header-inner">
    <div class="container-fluid">
     <!-- BEGIN LOGO -->
     <a class="brand" href="admin"> <img src="media/image/logo.png" alt="logo" width="120px;"/> </a>     
     <!-- END LOGO -->
     <!-- BEGIN RESPONSIVE MENU TOGGLER -->
     <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"> <img src="media/image/menu-toggler.png" alt="" /> </a>
     <!-- END RESPONSIVE MENU TOGGLER -->
     <!-- BEGIN TOP NAVIGATION MENU -->
     
      <!-- <ul class="nav pull-right">
      	<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1529524109&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1529524109:51" alt="点击这里给我发消息" title="点击这里给我发消息" /></a></li>
      </ul>-->
    
     <ul class="nav pull-right">
      <!-- BEGIN USER LOGIN DROPDOWN -->

      <li class="dropdown user">
      <a href="<?php echo base_url() ?>admin" class="dropdown-toggle" data-toggle="dropdown">
      	<img alt="" src="media/image/avatar1_small.jpg" />
      		<span class="username">
          <?php
          echo $_SESSION['user'];
          ?>
			    </span>
         	<i class="ion-ios-arrow-down"></i>         	
     </a>

         	   <ul class="dropdown-menu">
		        <li><a href="admin.php/logout" ><i class="ion-ios-undo"></i>退出</a></li>
		       </ul>
        
     
       <!-- 
       <ul class="dropdown-menu">
        <li><a href="admin.php/logout"><i class="icon-lock"></i>退出</a></li>
       </ul>
       -->
      </li>
      <!-- END USER LOGIN DROPDOWN -->
     </ul>
     <!-- END TOP NAVIGATION MENU -->
    </div>
   </div>
   <!-- END TOP NAVIGATION BAR -->
  </div>
  <!-- END HEADER -->
