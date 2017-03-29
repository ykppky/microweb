<?php
/*
 * Created on 2014-4-10
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 Class Specialties_model extends CI_Model{

 	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}
	

	function getById($id)
	{
		$sql = "select * from `specialties` where `id` = $id ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function getinfo()
	{
		$sql = "select * from `specialties`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function getlist($curpage,$prenum,$condition)
	{
		$tmp = ($curpage-1)*$prenum;
		if($condition)
		{
			$condition = '%'.$condition.'%';
			$sql = "select * from `specialties` where `title` like '$condition' or `author` like '$condition' order by `id` desc limit $tmp,$prenum";
		}
		else
		{
			$sql = "select * from `specialties` order by `id` desc limit $tmp,$prenum";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function gettotal($prenum,$condition)//计算页面总数
	{
		if($condition)
		{
			$condition = '%'.$condition.'%';
			$sql = "select count(*) from `specialties` where `title` like '$condition' or `author` like '$condition'";
		}
		else{
			$sql = "select count(*) from `specialties`";
		}
		$query = $this->db->query($sql);
		$total = $query->row_array();
		$total = ceil($total['count(*)']/$prenum);
		return $total;
	}
	
 }

?>
