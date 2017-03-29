<?php
$this->load->view ( 'header' );
?>
<base href="<?php echo base_url();?>" />
<link href="media/css/pricing-tables.css" rel="stylesheet" type="text/css" />
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
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							首页
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="ion-ios-home"></i>
								<a href="admin.php">管理后台</a>
								<i class="ion-ios-arrow-forward"></i>
							</li>
							<li><span>首页</span></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
				<div class="row-fluid">
					<div class="span3">
						<div class="dashboard-stat blue">
							<!-- <div class="visual">
								<i class="fa fa-comments"></i>
							</div> -->
							<div class="details">
								<div class="number">
									 <?php echo $projecttotal ?>个
								</div>
								<div class="desc">
									 项目
								</div>
							</div>
							<a class="more" href="javascript:;">
								 查看详情 <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="span3">
						<div class="dashboard-stat green">
							<!-- <div class="visual">
								<i class="fa fa-shopping-cart"></i>
							</div> -->
							<div class="details">
								<div class="number">
									 <?php echo $ip_total ?>次
								</div>
								<div class="desc">
									 ip总数
								</div>
							</div>
							<a class="more" href="admin/mystatistic/getlist">
								 查看详情 <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="span3">
						<div class="dashboard-stat purple">
							<!-- <div class="visual">
								<i class="fa fa-globe"></i>
							</div> -->
							<div class="details">
								<div class="number">
									 <?php echo $pv_total?>次
								</div>
								<div class="desc">
									 pv总数
								</div>
							</div>
							<a class="more" href="admin/mystatistic/getlist">
								 查看详情 <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
					<div class="span3">
						<div class="dashboard-stat yellow">
							<!-- <div class="visual">
								<i class="fa fa-bar-chart-o"></i>
							</div> -->
							<div class="details">
								<div class="number">
									 <?php echo $uv_total?>次
								</div>
								<div class="desc">
									 uv总数
								</div>
							</div>
							<a class="more" href="admin/mystatistic/getlist">
								 查看详情 <i class="m-icon-swapright m-icon-white"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- END INLINE NOTIFICATIONS PORTLET-->

				<!-- BEGIN INTERACTIVE CHART PORTLET-->
				<div class="portlet box" id="tabChart">
					<div class="portlet-title">
						<div class="caption" style="color:black;"><i class="icon-reorder"></i>近7天数据趋势</div>
					</div>
					
					<ul id="myTab" class="nav nav-tabs">
					   <li class="active"><a href="#ips" data-toggle="tab">ip数</a></li>
					   <li><a href="#pvs" data-toggle="tab">pv数</a></li>
					   <li><a href="#uvs" data-toggle="tab">uv数</a></li>
		

					</ul>
					
					<div id="myTabContent" class="tab-content">
					   <div id="ips" class="tab-pane active" style="min-width: 410px; height: 400px; margin: 0 auto"></div>
					   <div class="tab-pane " id="pvs" style="min-width: 410px; height: 400px; margin: 0 auto"></div>
					   <div class="tab-pane " id="uvs"  style="min-width: 410px; height: 400px; margin: 0 auto"></div>
					   
					</div>
					
					

				</div>
				<!-- END INTERACTIVE CHART PORTLET-->
			</div>
		</div>
		<!-- END PAGE CONTAINER-->

	</div>
	<!-- END PAGE -->
	<?php
		$this->load->view ( 'footer' );
	?>

	<script src="media/js/form-samples.js"></script>

	<script type="text/javascript">
	$(function () {
		$('#myTab a').click(function(e){
		
			 var chart = $('#ips').highcharts();
			 chart.setSize( $("#ips").width(), 400 );
			 chart = $('#pvs').highcharts();
			 chart.setSize( $("#ips").width(), 400 );
			 chart = $('#uvs').highcharts();
			 chart.setSize( $("#ips").width(), 400 );
		});

        $('#ips').highcharts({
            title: {
                text: 'ip数',
                x: -20 //center
            },
           
            xAxis: {
                categories:
                [
                	<?php
                	$count = count($days);
                	for($i=6;$i>=0;$i--)
                	{
                		echo "'$days[$i]',";
                	}
                	?>

                ]
            },
            yAxis: {
                title: {
                    text: '次'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            credits: {
            	enabled:false
            },
			exporting: {
				enabled:false
			},

            tooltip: {
                valueSuffix: '次'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series:
            [
				{
                	name: 'ip数',
                	data:
                	[
                		<?php
                		for($j=6 ;$j>=0 ; $j--)
                		{
							print_r($ips[$days[$j]]);
							if($j>0)
								echo ',';
                		}
                		?>
                	]
            	}
            ]
        });
    });
   </script>
   <script type="text/javascript">
	$(function () {
		
        $('#pvs').highcharts({
         	
            title: {
                text: 'pv数',
                x: -20 //center
            },
           
            xAxis: {
                categories:
                [
                	<?php
                	$count = count($days);
                	for($i=6;$i>=0;$i--)
                	{
                		echo "'$days[$i]',";
                	}
                	?>

                ]
            },
            yAxis: {
                title: {
                    text: '次'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            credits: {
            	enabled:false
            },
			exporting: {
				enabled:false
			},

            tooltip: {
                valueSuffix: '次'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series:
            [
				{
                	name: 'pv数',
                	data:
                	[
                		<?php

                		for($j=6 ;$j>=0 ; $j--)
                		{
							print_r( $pvs[$days[$j]]);
							if($j > 0)
								echo ',';
                		}
                		?>
                	]
            	}
            ]
        });
    });
   </script>
	<script type="text/javascript">
		$(function () {
			$('#uvs').highcharts({
				title: {
					text: 'uv数',
					x: -20 //center
				},

				xAxis: {
					categories:
							[
								<?php
                                $count = count($days);
                                for($i=$count-1;$i>=0;$i--)
                                {
                                    echo "'$days[$i]',";
                                }
                                ?>

							]
				},
				yAxis: {
					title: {
						text: '次'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},

				credits: {
					enabled:false
				},
				exporting: {
					enabled:false
				},

				tooltip: {
					valueSuffix: '次'
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series:
						[
							{
								name: 'uv数',
								data:
										[
											<?php
                                            for($j=6 ;$j>=0 ; $j--)
                                            {
                                                print_r( $uvs[$days[$j]] );
                                                if( $j > 0 )
                                                    echo ',';
                                            }
                                            ?>
										]
							}
						]
			});
		});
	</script>
    
<script src="media/highcharts/highcharts.js"></script>
<script src="media/highcharts/modules/exporting.js"></script>





	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>