<?php  


Class Advert_model extends CI_Model{

	/*
    * * User: WWS
    * Date: 2016/3/5
    * Description:获取相关信息走马灯图片信息
    */
    function __construct(){
        parent::__construct();
        $this->load->database();
    }   

    function getAdvertList()
    {   
        $sql = "select * from `advert`";
        $query = $this->db->query( $sql );
        $query = $query->result_array();
        return $query;
    }
}