<?php
$this->load->view ( 'header' );
?>
<!-- BEGIN BODY -->

<body class="page-header-fixed">
	<?php
	$this->load->view ( 'top' );
	?>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php
		$this->load->view ( 'menu' );
		?>
		<!-- BEGIN PAGE -->
		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<div class="row-fluid">

					<div class="span12">
						<h3 class="page-title">
							数据小解
						</h3>
						<ul class="breadcrumb">
							<li><i class="ion-ios-home"></i><a href="uadmin">后台管理</a> <i
								class="ion-ios-arrow-forward"></i></li>
							<li><a>系统中心</a> <i class="ion-ios-arrow-forward"></i>
							</li>
							<li><a>数据小解</a></li>
						</ul>
						
					</div>

				</div>
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<!--<div class="caption"><i class="ion-ios-list-outline"></i></div>-->
								<div class="caption"><i class="ion-ios-list-outline"></i>数据小解</div>
								<div class="actions">
									
								</div>
								
							</div>					
							<div class="portlet-body">
								<div class="tab-content">
									<?php 
									echo $content; 
									?>
								</div>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTAINER-->

	</div>
	<!-- END PAGE -->
	<?php
	$this->load->view ( 'footer' );
	?>	
</body>
<!-- END BODY -->
</html>