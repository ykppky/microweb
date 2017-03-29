<?php
/*
 * Created on 2014-6-1
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class Response extends BaseController {
	function __construct()
 	{
  		parent::__construct();
		$this->load->model("response_model");
 	}

	function response()
	{				

		$arr = $this->response_model->getResponse();
		$data['response'] = $arr;
		$data['menu'] = 3;
		$this->load->view('Baseinfo/response',$data);
		

	}


	function responseUpdate()
	{
		$subscribe = $this->input->post('subscribe',true);
		$textresponse = $this->input->post('textresponse',true);
		$arr = array($subscribe,$textresponse);

		$this->load->model('response_model');
		$this->response_model->updateInfo($arr);
		$this->alert->func("修改成功",base_url()."admin.php/response/response");
	}
	

 }
?>