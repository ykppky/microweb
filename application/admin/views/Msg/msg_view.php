<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<base href="<?php echo base_url();?>" />


<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>

<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
<script type="text/javascript" src="common/admin/js/jquery.js"></script>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {

				uploadJson : 'kindeditor/php/upload_json.php',
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
					留言列表 <small></small>
				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i><a href="admin.php">客户帮助</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a >帮助反馈</a> <i class="ion-ios-arrow-forward"></i></li>
					<li><a >留言列表</a></li>
				</ul>

					<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-cogs"></i></div>
								<div class="actions">

									<a href="admin.php/msg/getlist" class="btn blue"><i class="ion-arrow-return-left"></i> 返回</a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form name="example" method="post" action="<?php echo base_url();?>admin.php/msg/deal" name="form1" id="form1" class="form-horizontal">
										<input name="deal_type" type="hidden" value="add">
										<div class="control-group">
											<label class="control-label">用户姓名:</label>
											<div class="controls">
												<input name="title" type="text" placeholder="标题" class="m-wrap medium" value="<?php echo $msg['name']?>" disabled/>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">所在专业:</label>
											<div class="controls">
												<input type="text" name="date" onClick="WdatePicker()" placeholder="所在专业" class="m-wrap medium" value="<?php echo $msg['specialty']?>" disabled/>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">联系号码:</label>
											<div class="controls">
												<input type="text" name="date" onClick="WdatePicker()" placeholder="联系号码" class="m-wrap medium" value="<?php echo $msg['phone']?>" disabled/>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">邮箱:</label>
											<div class="controls">
												<input type="text" name="date" onClick="WdatePicker()" placeholder="邮箱" class="m-wrap medium" value="<?php echo $msg['email']?>" disabled/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">日期:</label>
											<div class="controls">
												<input type="text" name="date" onClick="WdatePicker()" placeholder="日期" class="m-wrap medium" value="<?php echo $msg['sendtime']?>" disabled/>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">留言:</label>
											<div class="controls">							
											<textarea style="width: 400px;height: 200px" disabled placeholder="请输入留言" ><?php echo $msg['content']?></textarea>
											</div>

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

