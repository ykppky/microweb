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
					一键拨号<small></small>
				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i><a href="admin.php">高级功能</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a >一键拨号</a> </li>
				</ul>




					<?php echo $htmlData; ?>

					<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>一键拨号</div>
								<div class="actions">

								</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form name="example" method="post" action="<?php echo base_url();?>uadmin/baseinfo/one_key_update" name="form1" id="form1" class="form-horizontal">
			
										<div class="control-group">
											<label class="control-label">热线号码:</label>
											<div class="controls">
												<input name="tel" type="text" placeholder="热线号码" class="m-wrap medium" value="<?php echo $tel?>"/>
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
</body>
<?php
$this->load->view ( 'header' );
?>

<!-- BEGIN BODY -->

<!-- END PAGE CONTAINER-->

<!-- END PAGE -->
	<?php
	$this->load->view ( 'footer' );
	?>
		<!-- END CONTAINER -->

<!-- BEGIN PAGE LEVEL PLUGINS -->



<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->


<!-- END PAGE LEVEL SCRIPTS -->

<script>
		  function setDealType()
		  {
			   jQuery("#deal_type").val("add");
			   jQuery("#form1").submit();

		  }
	</script>

<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>

