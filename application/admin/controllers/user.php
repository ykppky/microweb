<?php
/*
 * Created on 2014-4-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


 class User extends BaseController {

 	function __construct()
 	{
  		parent::__construct();
		$this->load->model("college_model");
		$this->load->model("user_model");
 	}
	public function deal()
	{
		$this->output->set_header("Content_Type:text/html;charset=utf-8");
		$isallow = $this->input->post('isallow', TRUE);
		if($isallow==null)
			$isallow = 'no';
		$this->load->model("friends_model");
		$this->friends_model->update($isallow);

		$this->alert->func("更改成功",base_url()."../set");
	}

    function getlist()
 	{
		//设置菜单相关信息
		// $data['menus']=$this->menuarr;		
		// $data['menuid']=$this->menuid ;
		// $data['sub_menuid']=$this->sub_menuid ;
		// $data['three_sub_menuid']=$this->three_sub_menuid ;
		//var_dump($data);

		$this->load->view('friends/friends_list');
 	}
	public function getuserlist()
	{
		$offset = $this->input->get('offset', TRUE);
		$limit = $this->input->get('limit', TRUE);
		$search = $this->input->get('search', TRUE);

		$list = $this->user_model->getUserList($offset,$limit,$search);
		$total=$this->user_model->getUserTotal($search);
		$count = count($list);
		$data = null;
		for( $i=0;$i<$count; $i++)
		{
			$data[$i]['openid'] = $list[$i]['openid'];
			$data[$i]['headimg'] = $list[$i]['headimg'];
			$data[$i]['nickname'] = $list[$i]['nickname'];
			$data[$i]['truename'] = $list[$i]['truename'];
			if($list[$i]['sex'] == 1) {

			 	$data[$i]['sex'] == "男";
			}else{

			 	$data[$i]['sex'] == "女";
			}
			$data[$i]['wxaccount']= $list[$i]['sendtime'];
			$data[$i]['time']= $list[$i]['time'];
			$data[$i]['province']= $list[$i]['province'];
			$data[$i]['city']= $list[$i]['city'];
			$data[$i]['specialties']= $list[$i]['specialties'];
			$data[$i]['operator'] .= '<a href="admin.php/user/delete/'.$list[$i]['id'].'" class="STYLE4" onclick="return confirm(&quot;确定删除该用户？&quot;);">删除 </a>';

		}
		if( $data != null)
			$json = '{"total": '.$total.',"rows": '.json_encode($data).'}';
				//$json = json_encode($data);
		else
			$json =  '{"total": '.$total.',"rows": []}';
		echo $json;
	}

 	//展示
	function view()
	{
		//设置菜单相关信息
		// $data['menus']=$this->menuarr;		
		// $data['menuid']=$this->menuid ;
		// $data['sub_menuid']=$this->sub_menuid ;
		// $data['three_sub_menuid']=$this->three_sub_menuid ;
		
		$id = $this->uri->segment(3);
		$arr = $this->college_model->getNewsById( "message", $id );
		$this->college_model->setCheckMessage($id);
		$data['msg'] = $arr;

		$this->load->view('friends/friends_view',$data);
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->college_model->deleteNews( "user", $id );
		$this->alert->func("删除用户成功",base_url()."admin.php/user/getlist");
	}
 }
?>
