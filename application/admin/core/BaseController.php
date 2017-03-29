<?php
/*
 * Created on 2015-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

error_reporting(E_ERROR | E_WARNING | E_PARSE);

 class BaseController extends CI_Controller
{
	public $alert;
    public $onliner;
    public function __construct()
    {
    	
        parent::__construct();
		
     	$this->load->helper('url');
        $this->load->library('Alert');
        $this->alert = new Alert();        
		$this->output->set_header("Content-Type: text/html; charset=utf-8");
		      
        $tmp_url =  $_SERVER["REQUEST_URI"];    

        $tmp = explode('/',$tmp_url);

        $count=count($tmp);

        $tmp_url = $tmp[$count-1];

        session_start();
        $user = $_SESSION['user'];
        
        if($tmp_url=='login'||$tmp_url=='check')
        {   

            return true;
        }else if(empty($user))//登入为空
        {
            
            $this->alert->func("请登入",base_url()."admin.php/login");
            return ;
        }

        return true;
    }   
    
    
	
}


?>
