<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<base href="<?php echo base_url();?>" />

<?php
$this->load->view ( 'header' );
?>

<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="admin/js/jquery.js"></script>

<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {

				//uploadJson : 'kindeditor/php/upload_json.php',
				uploadJson : 'kindeditor/php/upload_json.php?dir1=<?php echo $folder?>',
				fileManagerJson : 'kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>


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
					<?php echo $title?><small></small>
				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i><a href="admin.php">后台管理</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a ><?php echo $tab1name?></a> <i class="ion-ios-arrow-forward"></i></li>
					<li><a ><?php echo $tab2name?></a></li>
				</ul>




					<?php echo $htmlData; ?>

					<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-cogs"></i></div>
								<div class="actions">
									<a href="admin.php/<?php echo $url['add']?>" class="btn blue"><i class="ion-ios-refresh-outline"></i> 重置</a>
									<a href="admin.php/<?php echo $url['list']?>" class="btn blue"><i class="ion-arrow-return-left"></i> 返回</a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form name="example" method="post" action="<?php echo base_url();?>admin.php/<?php echo $url['deal']?>" name="form1" id="form1" class="form-horizontal">
										<input name="deal_type" type="hidden" value="addspecialties">
										<div class="control-group">
											<label class="control-label">专业名称:</label>
											<div class="controls">
												<input name="title" type="text" class="m-wrap medium" />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">日期:</label>
											<div class="controls">
												<input type="text" name="date" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="m-wrap medium" />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">顺序:</label>
											<div class="controls">
												<input type="text" name="order" placeholder="越大越靠前" class="m-wrap medium"  value="">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">专业简介:</label>
											<div class="controls">

												<textarea id="ms" name="content1" style="width: 700px; height: 200px; visibility: hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label">

												<input type="submit" name="button" value="添加" class="btn blue"/>
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




<!-- END PAGE CONTAINER-->


<!-- END PAGE -->
	<?php
	$this->load->view ( 'footer' );
	?>
		<!-- END CONTAINER -->

<!-- BEGIN PAGE LEVEL PLUGINS -->


<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="media/js/form-samples.js"></script>

<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>

