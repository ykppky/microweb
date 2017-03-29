<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

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
						<h3 class="page-title">
							留言列表 <small></small>
						</h3>

						<ul class="breadcrumb">

							<li><i class="ion-ios-home"></i><a href="admin.php">后台管理</a> <i
								class="ion-ios-arrow-forward"></i></li>

							<li><a>高级功能</a> <i class="ion-ios-arrow-forward"></i>

							</li>

							<li><a>留言列表</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN SAMPLE TABLE PORTLET-->


						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="ion-ios-list-outline"></i>留言列表</div>
								<div class="actions">
									
								</div>

							</div>
							<div class="portlet-body">
							 <table
							 		   id="toggleTable"
						        	   data-toggle="table"
						               data-toolbar="#get"
						               data-url="<?php echo base_url()?>admin.php/msg/getmsglist"
						               data-pagination="true"
						               data-side-pagination="server"
						               data-page-list="[5, 10, 20, 50, 100, 200]"
						               data-search="true"
						               data-height="460"
						               data-query-params="queryParams">
						            <thead>
						            	<tr>
						            	  <th data-field="name">姓名</th>
						            	  <th data-field="specialty">专业</th>
						            	  <th data-field="phone">联系电话</th>
						            	  <th data-field="email">邮箱</th>						            	  
						               	  <th data-field="sendtime">发布时间</th>
						               	  <th data-field="status">状态</th>
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
	<!--[if lt IE 9]>

	<script src="media/js/excanvas.min.js"></script>

	<script src="media/js/respond.min.js"></script>

	<![endif]-->
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
	        console.log(JSON.stringify(params));
	        // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
	        return params;
	    }

	</script>

</body>

<!-- END BODY -->

</html>
