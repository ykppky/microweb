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

	public $websiteType;
	public $alert;
    private $referer;
    public $obj;

    public function __construct()
    {
    	
        parent::__construct();
		$this->load->library('page');
		$this->page = new Page();
		$this->load->library("alert");
		$this->alert = new Alert();
		
		$this->load->library('Cookies');
		$this->obj = new Cookies("ykp");

		$this->load->helper('url');
		$this->output->set_header("Content-Type: text/html; charset=utf-8");
    }   
}


?>
