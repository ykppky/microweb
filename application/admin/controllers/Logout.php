<?php
/*
 * Created on 2014-3-28
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


 class Logout extends BaseController{

	function __construct()
	{
		parent::__construct();
		
	}
	//退出
	function index()
	{

		//删除session
        //$this->session->unset_userdata('admin');
		//跳转
		session_start();
		session_unset($_SESSION['user']);
		session_destroy();
		$this->alert->func("退出成功",base_url()."admin.php/login");
	}
 }
?>
