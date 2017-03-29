
<base href="<?php echo base_url();?>" />
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

<?php
$this->load->view ( 'header' );
?>
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
<script type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

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


<script src="js/formValidator-4.0.1.js" type="text/javascript"
	charset="UTF-8"></script>
<script src="js/formValidatorRegex.js" type="text/javascript"
	charset="UTF-8"></script>
<link type="text/css" rel="stylesheet" href="css/validator.css"></link>


<script type="text/javascript"> var jq190=jQuery.noConflict(true); </script>
<script type="text/javascript">
jq190(document).ready(function(){
	jq190.formValidator.initConfig({formID:"form1",debug:false,submitOnce:true,
		onError:function(msg,obj,errorlist){
			jq190("#errorlist").empty();
			jq190.map(errorlist,function(msg){
				jq190("#errorlist").append("<li>" + msg + "</li>")
			});
			alert(msg);
		},
		submitAfterAjaxPrompt : '有数据正在异步验证，请稍等...'
	});
	jq190("#ms").formValidator({onShow:"请输入你的内容",onFocus:"内容至少要输入10个汉字或20个字符",onCorrect:"恭喜你,你输对了"}).inputValidator({min:20,onError:"你输入的内容长度不正确,请确认"});
	jq190("#fk").formValidator({onShow:"请输入非空字符",onCorrect:"谢谢你的合作，你的非空字符正确"}).regexValidator({regExp:"notempty",dataType:"enum",onError:"非空字符格式不正确"});
	jq190("#fk1").formValidator({onShow:"请输入非空字符",onCorrect:"谢谢你的合作，你的非空字符正确"}).regexValidator({regExp:"notempty",dataType:"enum",onError:"非空字符格式不正确"});
	jq190("#fk2").formValidator({onShow:"请输入非空字符",onCorrect:"谢谢你的合作，你的非空字符正确"}).regexValidator({regExp:"notempty",dataType:"enum",onError:"非空字符格式不正确"});
});

</script>

</head>

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

					公告添加 <small></small>

				</h3>

				<ul class="breadcrumb">
					<li><i class="ion-ios-home"></i> <a >信息管理</a> <i
						class="ion-ios-arrow-forward"></i></li>
					<li><a >公司新闻</a> <i class="ion-ios-arrow-forward"></i></li>
					<li><a >新闻添加</a></li>
				</ul>




					<?php echo $htmlData; ?>

					<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-cogs"></i></div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form name="example" method="post" action="<?php echo base_url();?>admin.php/msg/deal" name="form1" id="form1" class="form-horizontal">


										<div class="control-group">
											<label class="control-label">是否允许留言:</label>
											<div class="controls">
												<label class="checkbox">
													<input name="isallow" type="checkbox" value="yes" <?php echo $checked?> />
												</label>
											</div>
										</div>



										<div class="control-group">
											<label class="control-label">

												<input name="submit" type="submit" value="提交" class="btn blue" />
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
<script language="JavaScript" type="text/javascript"
	src="scripts/buyorder.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="js/select2.min.js"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="js/form-samples.js"></script>

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

