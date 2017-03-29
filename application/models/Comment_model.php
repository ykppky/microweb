<?php 


 Class Comment_model extends CI_Model{

 	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}

	public function addComment($id,$content,$openid=''){
		$time = date('Y-m-d H:i:sa');
		$id = intval($id);
		// echo gettype($id);
		// echo gettype($content);

		// $data = array('activity_id' => $id,'content' => $content,'sendtime' => $time);
		// $this->db->insert('comment',$data);
		$sql = "insert into comment (activity_id, openid, content, sendtime) values ('$id', '$openid', '$content', '$time')";

		$this->db->query($sql);
	}

	public function getComment($id,$count){

		$sql = "select * from comment where activity_id=$id order by id desc limit 0,$count";
		$query = $this->db->query($sql);
		$query = $query->result_array();

		for($i = 0;$i < count($query);$i++){
			$openid = $query[$i]['openid'];
			$sql = "select * from `user` where `openid` = '$openid'";
			$res = $this->db->query($sql);
			$res = $res->result_array();
			$query[$i]['nickname'] = $res[0]['nickname'];
			$query[$i]['headimg'] = $res[0]['headimg'];
		}
		return $query;
	}

	public function getAllComment($id){

		$sql = "select * from comment where activity_id=$id";
		$query = $this->db->query($sql);
		$query = $query->result_array();

		return count($query);
	}
}