<?php
$this->load->view ( 'header' );
?>
<!-- BEGIN BODY -->
<?php
	$htmlData = '';
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
	}
?>
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
							使用手册
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="ion-cube"></i>
								<a href="admin">微销管理</a> 
								<i class="ion-ios-arrow-forward"></i>
							</li>
							<li>
								<a href="admin/mystatistic/getlist">我的数据</a>
								<i class="ion-ios-arrow-forward"></i>
							</li>
							<li><a href="admin/mystatistic/explain">数据小解</a></li>
						</ul>
					</div>

				</div>
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>数据更新</div>
								
							</div>					
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form action="<?php echo base_url();?>uadmin/Mystatistic/explain_update_deal" method="post" name="form1" id="form1" class="form-horizontal">
										
									   <div class="control-group">
											<label class="control-label">正文:</label>
											<div class="controls">
												<textarea name="content1" style="width:700px;height:200px;visibility:hidden;">			
												<?php echo $content; ?>
												</textarea>
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
		<!-- END PAGE CONTAINER-->

	</div>
	<!-- END PAGE -->
	<?php
	$this->load->view ( 'footer' );
	?>	
	
<script src="media/js/form-samples.js"></script>
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
	var uploadbutton = K.uploadbutton({
	button : K('#uploadButton')[0],
	fieldName : 'imgFile',
	url : 'kindeditor/php/upload_json_rar.php?dir=article&fold_name=',
	afterUpload : function(data) {
		if (data.error === 0) {
			var url = K.formatUrl(data.url, 'absolute');
			K('#url').val(url);
			$('#pic').attr('src',url);
			var index = url.lastIndexOf('/');			
			$('#picname').val(url.substr(index+1));
			$('.ke-button-common').val("修改图片");
		} else {
			alert(data.message);
		}
	},
	afterError : function(str) {
		alert('自定义错误信息: ' + str);
	}
});
uploadbutton.fileBox.change(function(e) {
	uploadbutton.submit();
	});
});
</script>
	
</body>



<!-- END BODY -->
</html>