<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<base href="<?php echo base_url();?>" />

<script type="text/javascript" src="common/admin/js/jquery.js"></script>

</head>

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
				<h3 class="page-title">
					 导航设置<small></small>
				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i><a href="uadmin">高级功能</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a >导航设置</a> </li>
				</ul>




					<?php echo $htmlData; ?>

					<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>百度地图</div>
								<div class="actions">
									<a href="uadmin/baseinfo/baidumap" class="btn blue"><i class="ion-ios-refresh-outline"></i> 重置</a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form name="example" method="post" action="<?php echo base_url();?>uadmin/baseinfo/baidumap_update" name="form1" id="form1" class="form-horizontal">
			
										<div class="control-group">
											<label class="control-label">百度地图:</label>
											<div class="controls">
												<input name="baidumap" type="text" placeholder="百度地图" class="m-wrap medium" value="<?php echo $baseinfo['baidumap']?>"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">百度地图:</label>
											<div class="controls">
												<iframe border=0 frameborder=0 width=500 height=500 marginheight=0 marginwidth=0 scrolling=no src="<?php echo $baseinfo['baidumap']?>">
												</iframe>
											</div>
										</div>

										

										<div class="control-group">
											<label class="control-label">
												<input type="submit" value="修改" name="button" class="btn blue"  />
											</label>
										</div>

										
									</form>
									<!-- END FORM-->
								</div>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
				</div>

				</div>
				</div>
</div>
	<?php
	$this->load->view ( 'footer' );
	?>
</body>



</html>

