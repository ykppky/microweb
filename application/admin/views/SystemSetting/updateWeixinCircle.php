<?php
/**
 * Created by PhpStorm.
 * User: YJS
 * Date: 2016/3/13
 * Time: 22:11
 */
?>
<!DOCTYPE html>
<base href="<?php echo base_url();?>" />
<html lang="en">

<?php
$this->load->view ( 'header' );
?>
<script type="text/javascript">
    var imgform=true;
    function imgLoadError(){
        imgform=false;
    }
    function checkform(){
        if(imgform==false){
            alert("请上传图片！"); 
        }
        return imgform;
    } 
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
            <!-- 待完善修改的界面 -->
            <div class="row-fluid">

                <div class="span12">
                    <h3 class="page-title"> 微信朋友圈转发设置 <small></small></h3>
              
                    <ul class="breadcrumb">
						<li><i class="ion-ios-home"></i> <a href="uadmin">后台管理</a> <i
							class="ion-ios-arrow-forward"></i></li>
						<li><a >系统中心</a> <i class="ion-ios-arrow-forward"></i></li>
						<li><a >微信朋友圈转发设置</a></li>
					</ul>
                    
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="ion-ios-list-outline"></i>微信朋友圈转发设置</div>
                            <div class="actions">
                                <a href="admin.php/SystemSetting/updateWeixinCircle" class="btn blue"><i class="ion-arrow-return-left"></i> 重置</a>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- BEGIN FORM-->
                                <form action="<?php echo base_url();?>admin.php/SystemSetting/dealWeixin" method="post" name="form1" id="form1" class="form-horizontal" onSubmit="return checkform();">
                                    <input name="deal_type" type="hidden" value="circle">
                                    <div class="control-group">
                                        <label class="control-label">转发短语:</label>
                                        <div class="controls">
                                            <input type="text"   name="circle"  value="<?php echo $value['forward_circle']?>"  class="m-wrap medium"/>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="control-group">
                                        <label class="control-label">转发图标:</label>
                                        <div class="controls"  style=" margin-top: -14px;">
                                            <p><div class="alert" style="display:inline-block;*display:inline;*zoom:1;margin-bottom: 0px; "><strong>提示!</strong> 请上传200px * 200px尺寸的图片.</div></p>
                                            <img src="uadmin/user/<?php echo $folder?>/ads/<?php echo $value['circle_icon']?>" id="pic" onerror="imgLoadError(this);">
                                            <p></p>
                                            <input name="picname" type="hidden" id="picname" value="<?php echo $value['circle_icon']?>">
                                            <input type="button" id="uploadButton" value="上传图片"/>
                                        </div>
                                    </div>

                                    

                                    <div class="control-group">
                                        <label class="control-label">
                                            <input type="submit" value="更新" name="button" class="btn blue"  />
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
	<script src="uadmin/js/zyFile.js"></script>
	<script src="uadmin/js/zyUpload.js"></script>
	<script type="text/javascript">
		var fileDir = '<?php echo $folder;?>';
	</script>
	<script src="uadmin/js/script.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {

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
			var uploadbutton = K.uploadbutton({
				button : K('#uploadButton')[0],
				fieldName : 'imgFile',
				url : 'kindeditor/php/upload_json_rar.php?dir1=<?php echo $folder?>&dir=ads&fold_name=',
				afterUpload : function(data) {
					if (data.error === 0) {
						var url = K.formatUrl(data.url, 'absolute');
						K('#url').val(url);
						$('#pic').attr('src',url);
						imgform=true;
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
</html>
