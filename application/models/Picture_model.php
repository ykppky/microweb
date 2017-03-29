<?php
class Picture_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllPicture(){

		$sql = "select * from album";
		
		$query = $this->db->query($sql);

		return $query = $query->result_array();
	}

}