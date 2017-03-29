<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-26
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class User_model extends CI_Model{
 	

 	private $tableName;//表名
	function __construct()
 	{
  		parent::__construct();

  		$this->tableName = "admin";
  		$this->load->model('Util_model');
 	}
 
  	function checkuser($username, $password)
  	{
  		$data['account'] = $username;
  		$query = $this->Util_model->query(null, $data,$this->tableName);
  		
  		$arr = $query->row_array();

  		if(empty($arr))//用户不存在
		{
			return "empty";
		}
		if(md5($password) != $arr['password'])
		{
			return "error";
		}
		return $arr;
  	}
  	
  
	
 	//获取单独信息
	function getById($id)
	{
		$query = $this->Util_model->getById($id,'user');
		//$query->result_array();
		return $query->row_array();
	}
	
 	
 	//校验用户是否存在
	function isExist($account)
	{
		$data['account'] = $account;
		$table = 'admin';
		$query=$this->Util_model->query(null,$data,$table);
		$arr = $query->row_array();
		if(count($arr))
		{
			return "no";
		}
		return "yes";
	}
	
 	function add($arr)
	{
		$account = $arr[0];
		$nickname = $arr[1];
		$pw = md5($arr[2]);
		$classid = $arr[3];
		
		//获取当前时间
		$date = date("Y-m-d H:i:s");
		$sql = "insert into `admin` values(null,'$account','$nickname','$pw',null,$classid,'$date',0)";
		$query = $this->db->query($sql);						
	}

  	function getByUserId($user_id)
  	{
  		$data["id"] = $user_id;
		$query = $this->Util_model->query( null, $data, "admin");
		return $query->row_array();
  	}

    function getUserList( $offset, $limit ,$condition )
    {
        $cols = array('id','openid','nickname','truename','sex','wxaccount','time','province','city','specialties');
        $cols = $this->util_model->getTableColumns($cols,array('headimg'));

        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select $cols from `user` where (`openid` like '$condition' or `nickname` like '$condition' or `nickname` like '$condition' or `truename` like '$condition' or `sex` like '$condition' or `wxaccount` like '$condition' or `province` like '$condition' or `city` like '$condition' or `specialties` like '$condition')";
        }
        else
        {
            $sql = "select $cols from `user` ";
        }
        $sql = $sql."order by `time` DESC limit $offset, $limit";

        $query = $this->db->query( $sql );
        return $query->result_array();
    }
    function getUserTotal( $condition  )
    {
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select count(*) from `user` where (`openid` like '$condition' or `nickname` like '$condition' or `nickname` like '$condition' or `truename` like '$condition' or `sex` like '$condition' or `wxaccount` like '$condition' or `province` like '$condition' or `city` like '$condition' or `specialties` like '$condition')";
        }
        else{
            $sql = "select count(*) from `user` ";
        }
        $query = $this->db->query($sql);
        $total = $query->row_array();
        if( $total == null)
            return 0;
        $total = $total['count(*)'];
        return $total;
    }
 }