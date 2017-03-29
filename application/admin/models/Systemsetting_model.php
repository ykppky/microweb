<?php
/**
 * Created by PhpStorm.
 * User: WWS
 * Date: 2016/2/29
 * Time: 23:54
 */
class Systemsetting_model extends CI_Model{
 	
	public $project_id;
 	public function __construct(){
		 parent::__construct();
		 $this->load->database();
		 $this->load->model('util_model');
        //$arr = $this->session->userdata('admin');

	}
   

    /*
    * * User: WWS
    * Date: 2016/3/5
    * Description:获取对应城市的广告信息
    */
    function getAdvertList()
    {
        $sql = "select * from `advert`";
        $query = $this->db->query( $sql );
        $query = $query->result_array();

        return $query;
    }

    /*
    * * User: WWS
    * Date: 2016/3/5
    * Description:删除对应广告信息
    */
    function deleteAdvertById( $id )
    {         
        $data2['id'] = $id;
        $this->util_model->delete($data2, "advert");
    }

    /*
    * * User: WWS
    * Date: 2016/3/6
    * Description:添加城市的广告
    */
    function addAdvert( $arr )
    {
        $data = array( 'null', $arr[0], $arr[1],$arr[2], date('Y-m-d H:i:s'));
        $this->util_model->add( $data, "advert");
    }

    /*
      * * User: WWS
      * Date: 2016/3/6
      * Description:获取相关广告
      */
    function getAdvertById( $id )
    {
        $data['id'] = $id;
        $query = $this->util_model->query( null, $data, "advert");
        $query = $query->row_array();
        return $query;
    }

      /*
      * * User: WWS
      * Date: 2016/3/6
      * Description:更新广告
      */

    function updateAdvertById($id,$arr)
    {
        $col = Array("title","url","img");
        for( $i=0;$i<count($col);$i++)
        {
            $data1[$col[$i]] = $arr[$i];
        }
        $data2['id'] = $id;
        $this->util_model->update( $data1, $data2, "advert");
    }
    
    
 /*
      * * User: WWS
      * Date: 2016/3/6
      * Description:获取相关广告
      */
    function getWxixinById( )
    {

        $query = $this->util_model->query( null, $data, "weixin");
        $query = $query->row_array();
        return $query;
    }
    
 	/*
      * * User: WWS
      * Date: 2016/3/6
      * Description:更新广告
      */

    function updateAdWeixin($type,$arr)
    {
    	$re = $this->getWxixinById();
    	if($re == null || $re ==''){
    		$data = array( 'null',$this->project_id, '', '','', '', '' );
        	$this->util_model->add( $data, "weixin");
    	}
    	if($type=='circle'){
			$col = Array("forward_circle","circle_icon");
	        for( $i=0;$i<count($col);$i++)
	        {
	            $data1[$col[$i]] = $arr[$i];
	        }
	        $data2['project_id'] = $this->project_id;
	        $this->util_model->update( $data1, $data2, "weixin");
    	}
    	else{
    		$col = Array("title","forward_friend","friend_icon");
	        for( $i=0;$i<count($col);$i++)
	        {
	            $data1[$col[$i]] = $arr[$i];
	        }

	        $this->util_model->update( $data1, $data2, "weixin");
    	}
        
    }
    
    
}