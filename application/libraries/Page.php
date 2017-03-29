<?php
/*
 * Created on 2014-3-9
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Page {

	//页面总数
 	private $totalpage;
 	//每页显示数量
 	private $prenum;
	//当前页面
	private $curpage;
	//最后页面
	private $lastpage;

	public function settotalpage($totalpage)
	{
		$this->totalpage = $totalpage;
	}
	public function gettotalpage()
	{
		return $this->totalpage;
	}

	public function setprenum($prenum)
	{
		$this->prenum = $prenum;
	}

	public function getprenum()
	{
		return $this->prenum;
	}
 	public function setcurpage($curpage)
 	{
 		$this->curpage = $curpage;
 	}
 	public function getcurpage()
 	{
 		return $this->curpage;
 	}

 	public function setlastpage($lastpage)
 	{
 		$this->lastpage = $lastpage;
 	}

 	public function getlastpage()
 	{
 		return $this->lastpage;
 	}

 }

?>