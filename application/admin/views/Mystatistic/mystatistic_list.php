<?php
	$this->load->view ( 'header' );
?>
<body class="page-header-fixed">

	<?php
	$this->load->view ( 'top' );
	?>
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
						<h3 class="page-title">访问列表</h3>
												
						<ul class="breadcrumb">
							<li><i class="ion-ios-home"></i><a href="uadmin">后台管理</a> <i
								class="ion-ios-arrow-forward"></i></li>
							<li><a>系统中心</a> <i class="ion-ios-arrow-forward"></i>
							</li>
							<li><a>访问数据</a></li>
						</ul>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>数据访问</div>
							</div>
							<div class="portlet-body">
							<table
							    id="toggleTable"
							    data-toggle="table"
							    data-toolbar="#get"
								data-url="<?php echo base_url()?>admin/mystatistic/getmystatisticlist"
								data-pagination="true"
								data-side-pagination="server"
								data-page-list="[5, 10, 20, 50, 100, 200]"
								data-search="true"
								data-height="460"
								data-query-params="queryParams">
								<thead>
									<tr>																			
										<th data-field="title">网站名称</th>				
										<th data-field="date">创建时间</th>		
										<th data-field="ip_num">ip数</th>
										<th data-field="pv_num">pv数</th>
										<th data-field="uv_num">uv数</th>						
										<th data-field="operator">操作</th>
									</tr>
								</thead>
							</table>

						</div>

						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->

	</div>

	<!-- END CONTAINER -->

	<?php
	$this->load->view('footer');
	?>

	<script src="media/js/bootstrap-table.js" type="text/javascript"></script>

	<script>
	$(function(){
		 var count =0;
		 $('#toggleTable').bootstrapTable({
			  }).on('all.bs.table', function (e, name, args) {

				  if( name=="post-header.bs.table")
				  {
					  if( count%2 == 0)
						  	$('#toggleTable').bootstrapTable('resetView');
					  count++;
				  }

			  })
		 });
	 function queryParams(params) {
	        params.your_param1 = 1; // add param1
	        params.your_param2 = 2; // add param2
	        return params;
	    }

	</script>

</body>

</html>