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
					 回复设置<small></small>
				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i><a href="uadmin">高级功能</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a >回复设置</a> </li>
				</ul>




					<?php echo $htmlData; ?>

					<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>回复设置</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form name="example" method="post" action="<?php echo base_url();?>admin.php/response/responseUpdate" name="form1" id="form1" class="form-horizontal">
			
										<div class="control-group">
											<label class="control-label">关注回复:</label>
											<div class="controls">
												<input name="subscribe" type="text" placeholder="关注回复" class="m-wrap medium" value="<?php echo $response['subscribe']?>"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">消息回复:</label>
											<div class="controls">
												<input name="textresponse" type="text" placeholder="消息回复" class="m-wrap medium" value="<?php echo $response['textresponse']?>"/>
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

