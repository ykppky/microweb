<?php
	//session_start();
	//require_once('ValidationCode.php');
	class ImgCode extends CI_Controller
	{
		function __construct()
	 	{
	  		parent::__construct();
	  		$this->load->helper('cookie');
	 	}
		function index()
		{	
			$this->load->library('ValidationCode');
			$image = new ValidationCode();
			$image->showImage();
			//$code = array("code"=>$image->getCheckCode());
			set_cookie("code",$image->getCheckCode());
			// echo $image;
			// echo $code;
			// $this->session->set_userdata('code',$code);
		}

 	}

?>
