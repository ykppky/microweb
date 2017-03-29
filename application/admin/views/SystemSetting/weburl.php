<?php
$this->load->view ( 'header' );
?>
<style type="text/css">
	/* 复制提示 */
	.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -20px -80px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:6px;}
	.copy-tips-wrap{padding:10px 20px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;}
</style>

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
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">						
						<h3 class="page-title">
							微网站信息
						</h3>
						<ul class="breadcrumb">
							<li><i class="ion-ios-home"></i><a href="admin">后台管理</a> <i
								class="ion-ios-arrow-forward"></i></li>
							<li><a>系统设置中心</a> <i class="ion-ios-arrow-forward"></i>
							</li>
							<li><a>项目详情</a></li>
						</ul>						
						
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>项目详情</div>
								<div class="actions">
									
								</div>
							</div>					
							<div class="portlet-body">
								<div class="tab-content">
									<!-- BEGIN FORM-->
									<form action=""  name="form1" id="form1" class="form-horizontal">									
										<div class="control-group">
											<label class="control-label">网站地址:</label>
											<div class="controls">
												<input type="text" name="wechat" value="<?php echo $enter_url?>"  class="m-wrap large" disabled="disabled"/>
												<span id="help-inline" class="help-inline" >复制地址</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">二维码:</label>
											<div class="controls qr-code-login">
			                                    <a  class="qrcode" url="<?php echo $short_url?>"></a>
			                                  
			                                </div>
										</div>
										
										<div class="control-group">
											
											<div class="controls">
												<a target="_blank" href="<?php echo $enter_url?>">在线体验</a>												
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
		<!-- END PAGE CONTAINER-->

	</div>
	<!-- END PAGE -->
	<?php
		$this->load->view ( 'footer' );
	?>	

	<script src="media/js/jquery.qrcode.min.js" type="text/javascript" ></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			  var url = $(".qrcode").attr("url");
			  $('.qrcode').qrcode({
					text	:  url,
					width   :  70,
					height  :  70
				});
		});
	</script>
	<script src="media/js/jquery.zclip.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#help-inline").zclip({
				path: "media/js/ZeroClipboard.swf",
				copy: function(){
					return $(this).parent().find("input").val();
				},
				afterCopy:function(){/* 复制成功后的操作 */
					var $copysuc = $("<div class='copy-tips'><div class='copy-tips-wrap'>复制成功</div></div>");
					$("body").find(".copy-tips").remove().end().append($copysuc);
					$(".copy-tips").fadeOut(3000);
				}
			});
		});
	</script>
</body>
<!-- END BODY -->
</html>