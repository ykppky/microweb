<?php
/**
 * Created by PhpStorm.
 * User: YJS
 * Date: 2016/3/5
 * Time: 23:18
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="utf-8">
<base href="<?php echo base_url();?>" />
<?php
$this->load->view ( 'header' );
?>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

<?php
$this->load->view ( 'top' );
?>
<!-- BEGIN CONTAINER -->

<div class="page-container row-fluid">
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
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">广告修改 <small></small>
                    </h3>
                
                    <ul class="breadcrumb">
						<li><i class="ion-ios-home"></i> <a href="admin">后台管理</a> <i
							class="ion-ios-arrow-forward"></i></li>
						<li><a >系统设置中心</a> <i class="ion-ios-arrow-forward"></i></li>
						<li><a href="admin.php/product/add">广告修改</a></li>
					</ul>

                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>

            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->

            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet box green">                      
                        
						
						<div class="portlet-title">
							<div class="caption"><i class="ion-ios-list-outline"></i>轮播图设置</div>
							<div class="actions">
									<a href="admin.php/SystemSetting/advertadd" class="btn blue"><i class="ion-ios-plus-outline"></i> 新增</a>
									
							</div>
                            
						</div>
                     

                        <div class="portlet-body">
                            <hr class="clearfix" />

                            <!-- BEGIN GALLERY MANAGER LISTING-->

                            <div id="pic" class="row-fluid">
                                <?php
                                $count = count($list);
                                for($i=0;$i<$count;$i++)
                                { 
                                ?>
                                    <div class="span3">
                                        <div class="item">
                                            <a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="admin.php/SystemSetting/adverpicupdate/<?php echo $list[$i]['id']?>">
                                                <div class="zoom">
                                                    <img src="uadmin/user/ads/<?php echo $list[$i]['img']?>" alt="Photo" class="photo" style="width:100%;"/>
                                                    <div class="zoom-icon"></div>
                                                </div>
                                            </a>
                                            <div class="details">
                                                <a href="admin.php/SystemSetting/advertdelete/<?php echo $list[$i]['id']?>" class="icon"><i class="ion-close-round"></i></a>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><?php echo $list[$i]['title']?></label>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>



                        </div>

                    </div>

                    <!-- END GALLERY MANAGER PORTLET-->

                </div>

            </div>

            <!-- END PAGE CONTENT-->

        </div>

        <!-- END PAGE CONTAINER-->

    </div>

    <!-- END PAGE -->

</div>

<?php
$this->load->view ( 'footer' );
?>

<script type="text/javascript">
    var pheight = $(".photo").width()*400/640;
    $(".photo").height(pheight);
</script>
</body>
</html>