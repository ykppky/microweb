<?php
/*
 * Created on 2014-6-1
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class Baseinfo extends BaseController {
	function __construct()
 	{
  		parent::__construct();
		$this->load->model("College_model");
 	}


	function introduce_update()
	{	 
		$deal_type = $this->input->post('deal_type',TRUE);

		if($deal_type == 'update')
		{
			$phone = $this->input->post('phone');
			$title = $this->input->post('title');
			$content = $this->input->post('content1');
			$address =$this->input->post('address');
			$qq =$this->input->post('qq');
			$brief =$this->input->post('brief');
			$arr = array( $title, $phone,  $address, $qq, $brief, $content);


			$this->College_model->updateWebSiteBaseInfo($arr);

			$this->alert->func("修改成功", base_url()."admin.php/baseinfo/introduce");

					}
	}

	function introduce()
	{				
		//设置菜单相关信息

		$arr = $this->College_model->getWebSiteBaseInfo();
		$data['baseinfo'] = $arr;
		$data['menu'] = 1;
		$this->load->view('Baseinfo/introduce',$data);	

	}

 }
?>