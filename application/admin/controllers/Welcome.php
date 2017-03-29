<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Welcome extends BaseController {


	function __construct()
 	{
  		parent::__construct(); 	
  		$this->alert = new Alert();
 	}

	
	public function index()
	{			
		$this->load->view('welcome',$data);							
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */