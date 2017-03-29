
<!DOCTYPE html>

<?php
$this->load->view ( 'header' );

?>

<?php
$htmlData = '';
if (! empty ( $_POST ['content1'] )) {
	if (get_magic_quotes_gpc ()) {
		$htmlData = stripslashes ( $_POST ['content1'] );
	} else {
		$htmlData = $_POST ['content1'];
	}
}
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
					简介 <small></small>
				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i> <a href="admin.php">管理后台</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a >信息</a> <i class="ion-ios-arrow-forward"></i></li>
					<li><a >基础信息</a></li>
				</ul>


				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>关于我们</div>
								<div class="actions">
									<!--<a href="uadmin.php/baseinfo/introduce" class="btn blue"><i class="ion-ios-refresh-outline"></i> 重置</a>-->
								</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
						<form action="<?php echo base_url();?>admin.php/baseinfo/introduce_update"  name="example" method="post" id="form1"  class="form-horizontal">
							<input type="hidden" value="update" name="deal_type" />

						<div class="control-group">
							<label class="control-label">名称:</label>
							<div class="controls">
							<input type="text" name="title" value="<?php echo $baseinfo['name']?>"  class="m-wrap medium" />
							</div>
						</div>

						<div class="control-group">
						<label class="control-label">手机:</label>
							<div class="controls">
							<input type="text" name="phone" value="<?php echo $baseinfo['phone']?>"  class="m-wrap medium" />
							</div>
						</div>

						<div class="control-group">
						<label class="control-label">地址:</label>
							<div class="controls">
							<input type="text" name="address" value="<?php echo $baseinfo['address']?>"  class="m-wrap medium" />
							</div>
						</div>

						<div class="control-group">
						<label class="control-label">QQ:</label>
							<div class="controls">
							<input type="text" name="qq" value="<?php echo $baseinfo['qq']?>"  class="m-wrap medium" />
							</div>
						</div>

						<div class="control-group">
						<label class="control-label">简介:</label>
							<div class="controls">
							<input type="text" name="brief" value="<?php echo $baseinfo['brief']?>"  class="m-wrap medium" />
							</div>
						</div>


						<div class="control-group">
						<label class="control-label">学院介绍:</label>
							<div class="controls">
							<textarea name="content1"
							style="width: 700px; height: 200px; visibility: hidden;"><?php echo htmlspecialchars($htmlData); ?><?php echo $baseinfo['introduce']?></textarea>
							</div>					
						</div>						
					<div class="control-group">					
						<label class="control-label">
						<input type="submit" name="button" class="btn blue" value="更新" />
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
		<!-- END PAGE CONTAINER-->

	</div>
	<!-- END PAGE -->
	<?php
		$this->load->view ( 'footer' );
	?>

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
</body>
</html>