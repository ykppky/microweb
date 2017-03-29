<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mystatistic extends BaseController {

	function __construct()
 	{
  		parent::__construct();
		$this->load->model('mystatistic_model');
 	}
 	
 	function getlist()
 	{
 		
 		//设置菜单相关信息
		$data['menus']=$this->menuarr;		
		$data['menuid']=$this->menuid ;
		$data['sub_menuid']=$this->sub_menuid ;
		$data['three_sub_menuid']=$this->three_sub_menuid ;
 		
		$this->load->view('Mystatistic/mystatistic_list',$data);
 	}	
 	
 	function getmystatisticlist()
 	{

		$offset = $this->input->get('offset', TRUE);
		$limit =  $this->input->get('limit', TRUE);
		$search = $this->input->get('search', TRUE);
	
		$list = $this->mystatistic_model->getlist($offset,$limit,$search);
		$total= $this->mystatistic_model->gettotal($search);
				
		$count = count($list);
		$data = null;//获取session		
		for( $i=0;$i<$count; $i++)
		{
			$data[$i]['title'] = $list[$i]['website_title'];
			$data[$i]['enter_url'] = $list[$i]['enter_url'];
			
			$data[$i]['date'] = $list[$i]['date'];
			$data[$i]['starttime'] = $list[$i]['starttime'];
			$data[$i]['endtime']	= $list[$i]['endtime'];
			$date_tmp = date('Y-m-d H:i:s');
			$data[$i]['ip_num'] = $list[$i]['ip_num'];
			$data[$i]['pv_num']	= $list[$i]['pv_num'];
			$data[$i]['uv_num']	= $list[$i]['uv_num'];
			
			$date_tmp = date('Y-m-d H:i:s');
			if($data[$i]['starttime']>$date_tmp)
			{
				$data[$i]['status']='未开始';
			}
			else if($data[$i]['starttime']<=$date_tmp&&$data[$i]['endtime']>=$date_tmp)
			{
				$data[$i]['status']='进行中';
			}
			else if ($data[$i]['endtime']<$date_tmp)
			{
				$data[$i]['status']='已结束';
			}
			else {
				$data[$i]['status']='未开始';
			}

			$data[$i]['operator']='
			<a href="uadmin/mystatistic/show/'.$list[$i]['project_id'].'" >查看详情</a>';
		}
		if( $data != null)
			$json = '{"total": '.$total.',"rows": '.json_encode($data).'}';
		else
			$json =  '{"total": '.$total.',"rows": []}';
		echo $json;
	
 	}
 	
 	//解释ip pv uv
 	function explain()
 	{
 		 		
 		//设置菜单相关信息
		$data['menus']=$this->menuarr;		
		$data['menuid']=$this->menuid ;
		$data['sub_menuid']=$this->sub_menuid ;
		$data['three_sub_menuid']=$this->three_sub_menuid ;
 		
 		$arr = $this->session->userdata('user');
		$this->load->model('Manual_model');
		$tmp = $this->Manual_model->getByType("explain");
		$data['content']=$tmp['content'];
		$this->load->view('Mystatistic/explain',$data);
 	}
 	
 	function explain_update()
	{
		$arr = $this->session->userdata('user');
		$data['menuid']=4;
		$data['sub_menuid']=41;
		$data['three_sub_menuid']=0;
		$this->load->model('Manual_model');
		$tmp = $this->Manual_model->getByType("explain");
		$data['content']=$tmp['content'];
		$this->load->view('Mystatistic/explain_update',$data);
	}
	
	function explain_update_deal()
	{
		$this->load->model('Manual_model');
		$content1 = $this->input->post('content1',true);
		$this->Manual_model->update(array('explain',$content1));
		$this->alert->func("数据小解更新成功","explain");
	}
 	function show($project_id)
 	{ 		
		//设置菜单相关信息
		$data['menus']=$this->menuarr;		
		$data['menuid']=$this->menuid ;
		$data['sub_menuid']=$this->sub_menuid ;
		$data['three_sub_menuid']=$this->three_sub_menuid ;
		
		$data['project_id'] = $project_id;
		$this->load->view('Mystatistic/show',$data);
 	}
 	
	function getshows($project_id)
 	{

		$offset = $this->input->get('offset', TRUE);
		$limit =  $this->input->get('limit', TRUE);
	
		$list = $this->mystatistic_model->getdetaillist($offset,$limit,$project_id);
		$total= $this->mystatistic_model->getdetailtotal($project_id);
				
		
		$count = count($list);
		$data = null;//获取session
		
		for( $i=0;$i<$count; $i++)
		{
			$data[$i]['first_type'] = $list[$i]['type_name'];
			$data[$i]['second_type'] =  $list[$i]['title'];
			$data[$i]['title'] = $list[$i]['title'];
			$data[$i]['date'] = $list[$i]['date'];
			$data[$i]['ip'] = $list[$i]['ip'];
			$data[$i]['uv']	= $list[$i]['uv'];
			$data[$i]['referer']	= $list[$i]['referer'];
			$data[$i]['visit_url']	= $list[$i]['visit_url'];
			
		}
		if( $data != null)
			$json = '{"total": '.$total.',"rows": '.json_encode($data).'}';
		else
			$json =  '{"total": '.$total.',"rows": []}';
		echo $json;
	
 	}
 	
 	
}
?>