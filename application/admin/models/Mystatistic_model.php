<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-26
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class Mystatistic_model extends CI_Model{
 	
 	private $user;
	function __construct()
 	{
  		parent::__construct();	
  		$this->tableName = "user";
  		$this->load->model('Util_model');		
        //$this->user = $this->session->userdata('user');
 	}
 	
 	function getlist($offset,$limit,$condition)
	{		
		$user_id = $this->user['id'];
			
		$sql = "select * from `website` where `user_id` = $user_id ";
		if($condition)
  		{
  			$condition = '%'.$condition.'%';
  			$condition = "(`website_title` like '$condition' or `type_name` like '$condition' or `title` like '$condition' )";
  			$sql = $sql. "and $condition  ` and `website`.`isdel`=0 limit $offset,$limit";
  		}
  		else{
			$sql = $sql. " and `website`.`isdel`=0 order by `website`.`date` desc limit $offset,$limit";
  		}
		
		
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		
		$count = count($arr);
		for($i=0;$i<$count;$i++)
		{
			$tmp = $arr[$i]['project_id'];
			$sql = "select * from `website_visit` where `project_id` = '$tmp' ";
			$query = $this->db->query($sql);
			$tmp_arr = $query->row_array();
			$arr[$i]['ip_num'] = $tmp_arr['ip_num'];
			$arr[$i]['uv_num'] = $tmp_arr['uv_num'];
			$arr[$i]['pv_num'] = $tmp_arr['pv_num'];
		}
		
		return $arr;
	}
	function gettotal($condition)//计算页面总数
	{		
		$user_id = $this->user['id'];		
		$sql = "select count(*) from `website` where `user_id` = $user_id ";
		if($condition)
  		{
  			$condition = '%'.$condition.'%';
  			$condition = "(`website_title` like '$condition' or `type_name` like '$condition' or `title` like '$condition' )";
  			$sql = $sql. "and $condition   and `website`.`isdel`=0 ";
  		}
  		else{
			$sql = $sql. " and `website`.`isdel`=0 ";
  		}
		
		$query = $this->db->query($sql);
		$re = $query->row_array();
		return $re['count(*)'];		
	}
	
	
 	function getdetaillist($offset,$limit,$project_id)
	{		
		$user_id = $this->user['id'];
		$sql = "select * from `website_visit_log` where `project_id` = '$project_id'  limit $offset,$limit";
		$query = $this->db->query($sql);
		$arr = $query->result_array();
		
		$count = count($arr);
		for($i=0;$i<$count;$i++)
		{
			$sql = "select * from `website` where `project_id` = '$project_id' ";
			$query = $this->db->query($sql);
			$tmp_arr = $query->row_array();
			$arr[$i]['type_name']= $tmp_arr['type_name'];
			$arr[$i]['second_type'] =  $tmp_arr['title'];
			$arr[$i]['title'] = $tmp_arr['website_title'];
		}
		
		return $arr;
	}
	function getdetailtotal($project_id)//计算页面总数
	{				
		$user_id = $this->user['id'];
		$sql = "select count(*) from `website_visit_log` where `project_id` = '$project_id'  ";
		$query = $this->db->query($sql);
		$re = $query->row_array();
		return $re['count(*)'];		
		
	}
	
	//首页 获取用户总项目数
	function getProjectTotal()
	{
		$user_id = $this->user['id'];
		$sql = "select count(*) from `website` where `user_id` = '$user_id'  ";
		$query = $this->db->query($sql);
		$re = $query->row_array();
		return $re['count(*)'];		
	}
	
	//ip,uv pv总访问数量
	function getIpUvPvTotal()
	{
		$user_id = $this->user['id'];			
		$sql = "select sum(`ip_num`) as `ip_total`,sum(`pv_num`) as `pv_total`,sum(`uv_num`) as `uv_total` from `website_visit` where `user_id` = '$user_id'  ";
		$query = $this->db->query($sql);
		$re = $query->row_array();
		
		return $re;	
	}
	
	//ip,uv pv总访问数量
 	function getIpUvPvByDateTotal($date)
	{
		$arr = array();
		$user_id = $this->user['id'];
		$tmp_date = date("Y-m-d",strtotime("$date   -1   day"));;
		$sql = "select count(*) from `website_visit_log` where `user_id` = '$user_id' and `date`<'$date' and `date`>='$tmp_date'";
		$query = $this->db->query($sql);
		$re = $query->row_array();
		$arr['pvs'] = $re['count(*)'];	
		if($re['count(*)'] == null )
			$arr['pvs']=0;
		
		$sql = "select count(*) from `website_visit_log` where `user_id` = '$user_id' and `date`<'$date' and `date`>='$tmp_date' group by `ip`";
		$query = $this->db->query($sql);
		$re = $query->row_array();
		$arr['ips'] = $re['count(*)'];
		if($re['count(*)'] == null )
			$arr['ips']=0;
		
		$sql = "select count(*) from `website_visit_log` where `user_id` = '$user_id' and `date`<'$date' and `date`>='$tmp_date' group by `uv`";
		$query = $this->db->query($sql);
		$re = $query->row_array();
		$arr['uvs'] = $re['count(*)'];
		if($re['count(*)'] == null )
			$arr['uvs']=0;
		
		return $arr;
		
	}
 }
 ?>