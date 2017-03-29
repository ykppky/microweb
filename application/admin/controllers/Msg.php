<?php
/*
 * Created on 2014-4-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


 class Msg extends BaseController {

 	function __construct()
 	{
  		parent::__construct();
		$this->load->model("College_model");
		
 	}
	public function deal()
	{
		$this->output->set_header("Content_Type:text/html;charset=utf-8");
		$isallow = $this->input->post('isallow', TRUE);
		if($isallow==null)
			$isallow = 'no';
		$this->load->model("msg_model");
		$this->msg_model->update($isallow);

		$this->alert->func("更改成功",base_url()."../set");
	}

	function getlist()
 	{
		$data['menu'] = 3;		
		$this->load->view('Msg/msg_list',$data);
 	}
	public function getmsglist()
	{
		$offset = $this->input->get('offset', TRUE);
		$limit = $this->input->get('limit', TRUE);
		$search = $this->input->get('search', TRUE);

		$list = $this->College_model->getMessageList($offset,$limit,$search);
		$total=$this->College_model->getMessageTotal($search);
		$count = count($list);
		$data = null;
		for( $i=0;$i<$count; $i++)
		{
			$data[$i]['name'] = $list[$i]['name'];
			$data[$i]['specialty'] = $list[$i]['specialty'];
			$data[$i]['phone'] = $list[$i]['phone'];
			$data[$i]['email'] = $list[$i]['email'];
			$data[$i]['content'] = $list[$i]['content'];
			$data[$i]['sendtime']= $list[$i]['sendtime'];
			if($list[$i]['ischeck'] == 1){
				$data[$i]['status'] = "已查看";
			}else{
				$data[$i]['status'] = "未查看";
			}

			$data[$i]['operator'] .= '<a href="admin.php/msg/view/'.$list[$i]['id'].'"> 查看 </a> &nbsp;/&nbsp;
								   <a href="admin.php/msg/delete/'.$list[$i]['id'].'" class="STYLE4" onclick="return confirm(&quot;确定删除留言？&quot;);">删除 </a>';

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
		$arr = $this->College_model->getNewsById( "message", $id );
		$this->College_model->setCheckMessage($id);
		$data['msg'] = $arr;

		$this->load->view('Msg/msg_view',$data);
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->College_model->deleteNews( "message", $id );
		$this->alert->func("删除留言成功",base_url()."admin.php/msg/getlist");
	}
 }
?>
