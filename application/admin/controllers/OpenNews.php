<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-4
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once "Article.php";
class OpenNews extends Article
{
    function __construct()
    {
        parent::__construct();
        $this->tableName = "open_news";
        $this->tablName = "学院信息";
        $this->tab2Name = "通知公告";
        $this->controlerName = "OpenNews";
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
