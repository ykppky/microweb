<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-26
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


 class Login extends BaseController{

 	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function index()
	{
		$this->load->view('login');
	}
	//用来判断用户名密码是否正确
	function check()
	{
		//校验用户名密码是否正确
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$this->load->model('User_model');
		$this->load->model("College_model");
		$re = $this->User_model->checkuser($username,$password);

		if($re == 'empty')//用户名不存在
		{		
			$this->alert->func("用户名为空",base_url()."admin.php/login");
		}
		else if($re == 'error')//密码错误
		{		
			$this->alert->func("密码错误",base_url()."admin.php/login");
		}
		else //登入成功,将信息添加到session
		{	
			session_start();

			$_SESSION['user'] = $username;

			//提示登入成功 进行跳转
			$this->alert->func("登入成功",base_url().'admin.php');
		}

	}
 }

?>
