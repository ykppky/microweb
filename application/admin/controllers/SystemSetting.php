<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class SystemSetting extends BaseController{
	function __construct()
	{
		parent::__construct();
		$this->load->model("College_model");

		$this->load->model("Systemsetting_model");
	}

	
	/*
	 * * User: YJS
 	 * Date: 2016/2/29
	 * description：处理系统设置模块的请求
	 */
	function deal()
	{
		$type = $this->input->post("deal_type");
		
		if( $type == "addadvert" )
		{
			$picname = $this->input->post("picname", true);
			$title = $this->input->post("title", true);
			$url= $this->input->post("url", true);
			$this->Systemsetting_model->addAdvert( array( $title, $url, $picname ) );
			$this->alert->func( "添加成功！", base_url()."admin.php/SystemSetting/advertupdate/");
		}
		else if( $type == "updateadvert" )
		{
			$picname = $this->input->post("picname", true);
			$title = $this->input->post("title", true);
			$id= $this->input->post("id", true);
			$url= $this->input->post("url", true);
			$this->Systemsetting_model->updateAdvertById( $id,array( $title,$url,$picname) );
			$this->alert->func( "修改成功！", base_url()."admin.php/SystemSetting/advertupdate");
		}
		
	}

	/*
     * * User: YJS
     * Date: 2016/3/5
     * description：查看广告详情
     */
	function advertupdate()
	{
		//设置菜单相关信息
		$data['menu'] = 4;				
		$list = $this->Systemsetting_model->getAdvertList();
		$data['list'] = $list;
		
		$this->load->view( "SystemSetting/advert_update", $data );
	}

	/*
     * * User: YJS
     * Date: 2016/3/5
     * description：删除广告
     */
	function advertdelete()
	{
		$id = $this->uri->segment(3);
		$arr = $this->Systemsetting_model->deleteAdvertById( $id );
		$this->alert->func( "删除成功！", base_url()."admin.php/SystemSetting/advertupdate/" );
	}
	function adverpicupdate()
	{		
		//设置菜单相关信息
		$data['menus'] = 4;				
		$id = $this->uri->segment(3);
		$arr = $this->Systemsetting_model->getAdvertById( $id );
		$data['value']=$arr;
		session_start();
        $arr  = $_SESSION['user'];;
		$this->load->view( "SystemSetting/advert_picupdate", $data );
	}

	/*
     * * User: YJS
     * Date: 2016/3/5
     * description：添加广告
     */
	function advertadd()
	{
		
		//设置菜单相关信息
		$data['menu'] = 4;			
		$this->load->view( "SystemSetting/advert_add", $data );
	}

 	function object_array($array){
	  if(is_object($array)){
		$array = (array)$array;
	  }
	  if(is_array($array)){
		foreach($array as $key=>$value){
		  $array[$key] = $this->object_array($value);
		}
	  }
	  return $array;
	} 
	
	
}