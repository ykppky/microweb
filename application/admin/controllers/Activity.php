<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-4
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once "Article.php";
class Activity extends Article
{
	function __construct()
	{
		parent::__construct();
		$this->tableName = "activity";
		$this->tablName = "学院动态";
		$this->tab2Name = "活动专区";
		$this->controlerName = "Activity";
		$this->urlTable['add'] = $this->controlerName."/add";
		$this->urlTable['list'] =  $this->controlerName."/getlist";
		$this->urlTable['update'] =  $this->controlerName."/update";
		$this->urlTable['delete'] =  $this->controlerName."/delete";
		$this->urlTable['getlist'] =  $this->controlerName."/getNewsList";
		$this->urlTable['deal'] =  $this->controlerName."/deal";
		$this->menu = 2;
	}
}
?>
