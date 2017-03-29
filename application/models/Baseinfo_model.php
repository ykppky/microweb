<?php

Class Baseinfo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->model("Deal_model");
	}
	
	
	/*
	 * 
	 */

	//获取信息
	function getinfos()
	{

		$result['name'] = $this->getInfoBytype("name");
		$result['introduce'] = $this->getInfoBytype("introduce");
		$result['phone'] = $this->getInfoBytype("phone");
		$result['qq'] = $this->getInfoBytype("qq");
		$result['address'] = $this->getInfoBytype("address");
		$result['time'] = $this->getInfoBytype("time");
		return $result;

	}

		function getInfoBytype($type)
	{
		$data['type'] = $type;
		$query = $this->Deal_model->query( null, $data, 'baseinfo');
		$query = $query->row_array();
		if( empty( $query) )
			return null;
		return $query['content'];
	}

	    function getAdvertList()
    {   
        $sql = "select * from `advert`";
        $query = $this->db->query( $sql );
        $query = $query->result_array();
        return $query;
    }

	/**
	 * User: YJS
	 * Date: 2016-07-06
	 * Des:插入留言
	 */
	function addMessage( $arr )
	{
		$name = $arr[0];
		$specialty = $arr[1];		
		$phone = $arr[2];
		$email = $arr[3];
		$content = $arr[4];
		$date = date('Y-m-d H:i:s');

		$sql =" insert into `message` values( null, '$name','$specialty','$phone','$email', '$content', '$date' , 0)";
		$this->db->query( $sql );
	}

	function getMessage()
	{
		$sql = "select * from `specialties`";
        $query = $this->db->query( $sql );
        $query = $query->result_array();
        return $query;
	}
}

?>
