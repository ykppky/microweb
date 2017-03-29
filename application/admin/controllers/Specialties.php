<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-4
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once "Article.php";
class Specialties extends Article
{
	function __construct()
	{
		parent::__construct();
		$this->tableName = "specialties";
		$this->tablName = "学院信息";
		$this->tab2Name = "专业信息";
		$this->controlerName = "Specialties";
		$this->urlTable['add'] = $this->controlerName."/add";
		$this->urlTable['list'] =  $this->controlerName."/getlist";
		$this->urlTable['update'] =  $this->controlerName."/update";
		$this->urlTable['delete'] =  $this->controlerName."/delete";
		$this->urlTable['getlist'] =  $this->controlerName."/getspeList";
		$this->urlTable['deal'] =  $this->controlerName."/deal";
		$this->menu = 1;
	}
}
?>