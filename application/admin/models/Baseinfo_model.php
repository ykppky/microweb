<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-5
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 Class baseinfo_model extends CI_Model{

 	public function __construct(){
		 parent::__construct();
		 $this->load->database();
		 $this->load->model('util_model');
	}


 	function update($arr)
	{
		$query = $this->util_model->getByProjectId('baseinfo');
		$arr1=$query->row_array();
		$data1 = null;
		$col = Array("tel","fax","phone","email","company_name","linkman","content","address");
		for( $i=0;$i<count($col);$i++)
		{
			$data1[$col[$i]] = $arr[$i];
		}
		$data2['project_id'] = $this->project_id ;
		
		if(empty($arr1))
		{	
			$project_id="'".$project_id."'";
			$arr1=array('null',$this->project_id,$arr[0],$arr[1],$arr[2],'',$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],'','','','','',0,0);
			$query = $this->util_model->add($arr1, "baseinfo");				
		}
		else 
		{
			$this->util_model->update( $data1, $data2, "baseinfo");
		}
	}

	function getbaseinfo()
	{
		$query = $this->util_model->getByProjectId($this->project_id, 'baseinfo');
		$arr=$query->row_array();
		if(empty($arr))
		{
			$arr = array('tel' => '','fax' => '','phone' => '','email' => '','baidumap'=>'','one_key'=>'',
			'company_name' => '','linkman' => '','content' => '');
		}
		return $arr;		
	}
	
 }

?>