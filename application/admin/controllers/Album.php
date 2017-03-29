<?php
/**
 * Created by PhpStorm.
 * User: YJS
 * Date: 2016-07-03
 * Time: 16:28
 */
class Album extends BaseController{

    public $tableName;
    public $urlTable;
    public $controlerName;
    public  $tab1Name;
    public $tab2Name;
    public $menu;
    function __construct()
    {
        parent::__construct();
        $this->load->model("Album_model");  
        $this->tableName = "album";

        $this->tab1Name = "学院信息";
        $this->tab2Name = "学院风光";
        $this->controlerName = "Album";
        $this->urlTable['add'] = $this->controlerName."/add";
        $this->urlTable['list'] =  $this->controlerName."/getlist";
        $this->urlTable['update'] =  $this->controlerName."/update";
        $this->urlTable['delete'] =  $this->controlerName."/delete";
        $this->urlTable['getlist'] =  $this->controlerName."/getNewsList";
        $this->urlTable['deal'] =  $this->controlerName."/deal";
        $this->menu = 1;
    }

    function getlist()
    {
        $list = $this->Album_model->getAlbumList( $this->tableName );
        $data['list'] = $list;

        $data['folder'] = $this->project_id;
        $data['dir'] = strtolower($this->controlerName);

        $data['title'] = $this->tab2Name."列表";
        $data['tab1name'] = $this->tab1Name;
        $data['tab2name'] = $this->tab2Name;
        //设置菜单相关信息
        $data['menus']=$this->menuarr;
        $data['menuid']=$this->menuid ;
        $data['sub_menuid']=$this->sub_menuid ;
        $data['three_sub_menuid']=$this->three_sub_menuid ;
        $data['url'] = $this->urlTable;
        $data['menu'] = $this->menu;

        $this->load->view( $this->urlTable['list'],$data );
    }
    /*
     * * User: YJS
     * Date: 2016/7/3
     * description：添加广告
     */
    function add()
    {
        //设置菜单相关信息
        $data['url'] = $this->urlTable;
        $data['title'] = $this->tab2Name."添加";
        $data['tab1name'] = $this->tab1Name;
        $data['tab2name'] = $this->tab2Name;

        $data['dir'] = strtolower($this->controlerName);
        $data['folder'] = $this->project_id;
        $data['menu'] = $this->menu;

        $this->load->view( $this->urlTable['add'], $data );
    }
    /*
    * * User: YJS
    * Date: 2016/7/3
    * description：删除广告
    */
    function delete()
    {
        $id = $this->uri->segment(3);
        $arr = $this->Album_model->deleteAlbumById( $this->tableName, $id );
        $this->alert->func( "删除成功！", base_url()."admin.php/".$this->urlTable['list'] );
    }
     /*
      * * User: YJS
      * Date: 2016/7/3
      * description：更新广告
      */
    function update()
    {
        $data['url'] = $this->urlTable;
        $data['title'] = $this->tab2Name."更新";
        $data['tab1name'] = $this->tab1Name;
        $data['tab2name'] = $this->tab2Name;

        $id = $this->uri->segment(3);
        $arr = $this->Album_model->getAlbumById( $this->tableName, $id );

        $data['value']= $arr;
        $data['dir'] =  strtolower($this->controlerName);
        $data['menu'] = $this->menu;
        
        $this->load->view( $this->urlTable['update'], $data );
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
            $this->Album_model->addAlbum( $this->tableName, array( $title, $url, $picname ) );
            $this->alert->func( "添加成功！", base_url()."admin.php/".$this->urlTable['list']);
        }
        else if( $type == "updateadvert" )
        {
            $picname = $this->input->post("picname", true);
            $title = $this->input->post("title", true);
            $id= $this->input->post("id", true);
            $url= $this->input->post("url", true);
            $this->Album_model->updateAlbumById( $this->tableName, $id,array( $title,$url,$picname) );
            $this->alert->func( "修改成功！", base_url()."admin.php/".$this->urlTable['list']);
        }
    }


}