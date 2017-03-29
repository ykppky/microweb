<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on 2014-3-4
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class Article extends BaseController
{
    public $tableName;
    public $urlTable;
    public $controlerName;
    public  $tablName;
    public $tab2Name;
    public $menu;
    function __construct()
    {
        parent::__construct();
        $this->load->model("College_model");

    }
    //添加列表
    public function add()
    {

        $data['url'] = $this->urlTable;
        $data['title'] = $this->tab2Name."添加";
        $data['tab1name'] = $this->tablName;
        $data['tab2name'] = $this->tab2Name;
        $data['menu'] = $this->menu;
        $this->load->view( $this->urlTable['add'], $data );
        
    }

    //获取列表
    public function getlist()
    {
        $data['title'] = $this->tab2Name."列表";
        $data['tab1name'] = $this->tablName;
        $data['tab2name'] = $this->tab2Name;
        $data['url'] = $this->urlTable;
        $data['menu'] = $this->menu;
        $this->load->view( $this->urlTable['list'],$data );
    }

    public function getNewsList()
    {
        $offset = $this->input->get('offset', TRUE);
        $limit = $this->input->get('limit', TRUE);
        $search = $this->input->get('search', TRUE);

        $list = $this->College_model->getTableList( $this->tableName, $offset,$limit,$search);
        $total=$this->College_model->getTableTotal( $this->tableName, $search );

        $count = count($list);
        $data = null;
        for( $i=0;$i<$count; $i++)
        {
            $data[$i]['title'] = $list[$i]['title'];
            $data[$i]['author']= $list[$i]['author'];
            $data[$i]['date'] = $list[$i]['time'];
            $data[$i]['order'] = $list[$i]['order'];
            $data[$i]['operator']='<a href="admin.php/'.$this->urlTable['update'].'/'.$list[$i]['id'].'" > 修改</a> &nbsp;/&nbsp;
                                  <a href="admin.php/'.$this->urlTable['delete'].'/'.$list[$i]['id'].'"
												class="STYLE4" onclick="return confirm(&quot;确定删除该'.$this->tab2Name.'？&quot;);">删除 </a>';
        }
        if( $data != null)
            $json = '{"total": '.$total.',"rows": '.json_encode($data).'}';
        else
            $json =  '{"total": '.$total.',"rows": []}';
        echo $json;
    }

    public function getspeList()
    {
        $offset = $this->input->get('offset', TRUE);
        $limit = $this->input->get('limit', TRUE);
        $search = $this->input->get('search', TRUE);

        $list = $this->College_model->getspelist( $this->tableName, $offset,$limit,$search);
        $total=$this->College_model->getspetotal( $this->tableName, $search );
        $count = count($list);
        $data = null;
        for( $i=0;$i<$count; $i++)
        {
            $data[$i]['title'] = $list[$i]['title'];
            $data[$i]['date'] = $list[$i]['time'];
            $data[$i]['order'] = $list[$i]['order'];
            $data[$i]['operator']='<a href="admin.php/'.$this->urlTable['update'].'/'.$list[$i]['id'].'" > 修改</a> &nbsp;/&nbsp;
                                  <a href="admin.php/'.$this->urlTable['delete'].'/'.$list[$i]['id'].'"
                                                class="STYLE4" onclick="return confirm(&quot;确定删除该'.$this->tab2Name.'？&quot;);">删除 </a>';
        }
        if( $data != null)
            $json = '{"total": '.$total.',"rows": '.json_encode($data).'}';
        else
            $json =  '{"total": '.$total.',"rows": []}';
        echo $json;
    }

    //处理用户提交操作
    public function deal()
    {
        //接受参数
        $this->output->set_header("Content_Type:text/html;charset=utf-8");
        $deal_type = $this->input->post("deal_type",true);
        if($deal_type == 'add')
        {
            $title = $this->input->post('title',TRUE);
            $author = $this->input->post('author',TRUE);
            $date = $this->input->post('date',TRUE);
            $order = $this->input->post('order',TRUE);
            $content1 = $this->input->post('content1');
            $arr = array('null', $title,$author,$date,$content1, $order);
            $this->College_model->addNews( $this->tableName, $arr );
            $this->alert->func("添加".$this->tab2Name."成功", base_url()."admin.php/".$this->urlTable['list'] );
        }
        if($deal_type == 'addspecialties')
        {
            $title = $this->input->post('title',TRUE);
            $date = $this->input->post('date',TRUE);
            $order = $this->input->post('order',TRUE);
            $content1 = $this->input->post('content1');
            $arr = array('null', $title,$date,$order,$content1);
            $this->College_model->addNews( $this->tableName, $arr );
            $this->alert->func("添加".$this->tab2Name."成功", base_url()."admin.php/".$this->urlTable['list'] );
        }
        if($deal_type == 'update')
        {
            $title = $this->input->post('title',true);
            $author = $this->input->post('author',TRUE);
            $date = $this->input->post('date',TRUE);
            $order = $this->input->post('order',TRUE);
            $content1 = $this->input->post('content1');
            $id = $this->input->post('id',TRUE);
            $content1 = mysql_escape_string( $content1 );
            $arr = array($title,$author,$date,$order,$content1);


            $this->College_model->updateNews( $this->tableName, $id, $arr );
            $this->alert->func("修改".$this->tab2Name."成功", base_url()."admin.php/".$this->urlTable['list']  );
        }

        if($deal_type == 'updatespecialties')
        {
            $title = $this->input->post('title',true);
            $date = $this->input->post('date',TRUE);
            $order = $this->input->post('order',TRUE);
            $content1 = $this->input->post('content1');
            $id = $this->input->post('id',TRUE);
            $content1 = mysql_escape_string( $content1 );
            $arr = array($title,$date,$order,$content1);


            $this->College_model->updatespecialties( $this->tableName, $id, $arr );
            $this->alert->func("修改".$this->tab2Name."成功", base_url()."admin.php/".$this->urlTable['list'] );
        }
    }
    //更新操作
    public function update()
    {
        $data['title'] = $this->tab2Name."修改";
        $data['tab1name'] = $this->tablName;
        $data['tab2name'] = $this->tab2Name;
        $data['url'] = $this->urlTable;
        $id = $this->uri->segment(3);
        $data['value'] = $this->College_model->getNewsById( $this->tableName, $id );
        $data['menu'] = $this->menu;
        $this->load->view( $this->urlTable['update'], $data);
    }
    //删除操作
    public function delete()
    {
        //获取id
        $id = $this->uri->segment(3);
        $this->College_model->deleteNews( $this->tableName, $id );
        $this->alert->func("删除".$this->tab2Name."成功", base_url()."admin.php/".$this->urlTable['list'] );
    }
}
?>
