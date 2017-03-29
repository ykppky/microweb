<?php
/*
 * Created on 2014-4-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 Class Msg_model extends CI_Model{

 	public $project_id;
 	public function __construct(){
		 parent::__construct();
		 $this->load->database();
		 $this->load->model('util_model');
	}
	
	function get()
	{		
		$sql = "select * from `baseinfo` where `type` = 'isallow' ";
		#mysql_query("SET NAMES GBK"); //防止中文乱码
		$query = $this->db->query($sql);
        //return $query->result();
		return $query->result_array();
	}
	function update($set)
	{
		$sql = "update `baseinfo` set `isshow` = '$set'  where `type`='isallow' ";
		$this->db->query($sql);
		//$this->db->cache_delete_all();
		$this->db->cache_delete('/msg', 'set');
	}


	//计算翻页数量
	function gettotal($condition)
	{

		if($condition)
		{
			$condition = '%'.$condition.'%';
			$sql = "select count(*) from `u_guestbook` where `name` like '$condition' and `project_id`= '$this->project_id'";
		}
		else{
			$sql = "select count(*) from `u_guestbook` where `project_id`= '$this->project_id'";
		}
		$query = $this->db->query($sql);
		$total = $query->row_array();
		if( $total == null)
			return 0;
		$total = $total['count(*)'];
		return $total;
	}
	//获取列表信息
	function getlist($offset,$limit,$condition)
	{	
		if($condition)
		{
			$condition = '%'.$condition.'%';
			$sql = "select * from `u_guestbook` where `name` like '$condition' and `project_id`= '$this->project_id' order by `date` desc limit $offset,$limit";
		}
		else
		{
			$sql = "select * from `u_guestbook` where `project_id`= '$this->project_id'  order by `date` desc limit $offset,$limit";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//获取单独信息
	function getById($id)
	{		
		$sql = "select * from `u_guestbook` where `id` = $id";
		$query = $this->db->query($sql);
		//echo $sql;
		return $query->row_array();
	}

	function delete($id)
	{
		$sql = "delete from `u_guestbook` where `id` = $id";
		$this->db->query($sql);
	}

 }

?>
