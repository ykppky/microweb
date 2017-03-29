<?php
/**
 * Created by PhpStorm.
 * User: YJS
 * Date: 2016-07-02
 * Time: 21:41
 */

class College_model extends CI_Model{

    private $prefix;//表名前缀

    function __construct()
    {
        parent::__construct();
        $this->load->model("Util_model");
        $this->prefix = "";
    }

    function getBaseInfo( $type )
    {
        $data['type'] = $type;

        $query = $this->Util_model->query( null, $data, $this->prefix.'baseinfo');
        $query = $query->row_array();
        if( empty( $query) ){
            return null;
        }
        return $query['content'];
    }
    function updateBaseInfo( $type, $value )
    {
        $res = $this->getBaseInfo( $type );
        if( $res === null )
        {
            $data = array("null", $type, $value);
            $this->Util_model->add( $data, "baseinfo");
        }
        else
        {
            $data1['content'] = $value;
            $data2['type'] = $type;
            $this->Util_model->update( $data1,$data2, $this->prefix.'baseinfo');
        }
    }
    /**
     * User: YJS
     * Date: 2016-07-02
     * Des:获取网站基本信息
     */
    function getWebSiteBaseInfo()
    {
        $result['name'] = $this->getBaseInfo("name");
        $result['address'] = $this->getBaseInfo("address");
        $result['qq'] = $this->getBaseInfo("qq");
        $result['introduce'] = $this->getBaseInfo("introduce");
        $result['phone'] = $this->getBaseInfo("phone");
        $result['brief'] = $this->getBaseInfo("brief");
        $result['time'] = $this->getBaseInfo("time");
        return $result;
    }
    /**
     * User: YJS
     * Date: 2016-07-02
     * Des:更新网站基本信息
     */
    function updateWebSiteBaseInfo( $data )
    {   
        $this->updateBaseInfo( "name", $data[0] );
        $this->updateBaseInfo( "phone", $data[1] );
        $this->updateBaseInfo( "address", $data[2] );
        $this->updateBaseInfo( "qq", $data[3] );
        $this->updateBaseInfo( "brief", $data[4] );
        $this->updateBaseInfo( "introduce", $data[5] );
        $this->updateBaseInfo( "time", date("Y-m-d H:i:s") );
    }
    /**
     * Date: 2016-09-09
     * Des:获取table的列表
     */
    function getTableList(  $table, $offset, $limit ,$condition, $isOrder = true )
    {
        $cols = array('id','title','author','time','content','order');
        $cols = $this->Util_model->getTableColumns( $cols, array("content") );
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select $cols from `$table` where `title` like '$condition' or `author` like '$condition'";
        }
        else
        {
            $sql = "select $cols from `$table`";
        }

        if( $isOrder )
            $sql = $sql."order by `order` DESC ";
        $sql = $sql."limit $offset, $limit";
        $query = $this->db->query( $sql );
        return $query->result_array();
    }
    /**
     * Date: 2016-07-02
     * Des:获取specialties的列表
     */    


    function getspeList(  $table, $offset, $limit ,$condition, $isOrder = true )
    {
        $cols = array('id','title','time','content','order');
        $cols = $this->Util_model->getTableColumns( $cols, array("content") );
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select $cols from `$table` where `title` like '$condition' or `author` like '$condition'";
        }
        else
        {
            $sql = "select $cols from `$table`";
        }

        if( $isOrder )
            $sql = $sql."order by `order` DESC ";
        $sql = $sql."limit $offset, $limit";
        $query = $this->db->query( $sql );
        return $query->result_array();
    }
    /**
     * User: YJS
     * Date: 2016-07-02
     * Des:获取table的条数
     */
    function getTableTotal(  $table, $condition  )
    {
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select count(*) from `$table` where `title` like '$condition' or `author` like '$condition'";
        }
        else{
            $sql = "select count(*) from `$table`";
        }
        $query = $this->db->query($sql);
        $total = $query->row_array();
        if( $total == null)
            return 0;
        $total = $total['count(*)'];
        return $total;
    }

    function getspetotal(  $table, $condition  )
    {
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select count(*) from `$table` where `title` like '$condition'";
        }
        else{
            $sql = "select count(*) from `$table`";
        }
        $query = $this->db->query($sql);
        $total = $query->row_array();
        if( $total == null)
            return 0;
        $total = $total['count(*)'];
        return $total;
    }
    /**
     * User: YJS
     * Date: 2016-07-02
     * Des:通过id获取新闻
     */
    function getNewsById( $table, $id )
    {
        $query = $this->Util_model->getById( $id, $this->prefix.$table );
        return $query->row_array();
    }
    function updateNews( $table, $id, $data )
    {
        $data1 = null;
        $col = Array("title","author","time","order","content" );
        for( $i=0;$i<count($col);$i++)
        {
            $data1[$col[$i]] = $data[$i];
        }
        $data2['id'] = $id;
        $this->Util_model->update( $data1, $data2, $this->prefix.$table );
    }

    function updatespecialties( $table, $id, $data )
    {
        $data1 = null;
        $col = Array("title","time","order","content" );
        for( $i=0;$i<count($col);$i++)
        {
            $data1[$col[$i]] = $data[$i];
        }
        $data2['id'] = $id;
        $this->Util_model->update( $data1, $data2, $this->prefix.$table );
    }
    function deleteNews( $table, $id )
    {
        $data['id'] = $id;
        $this->Util_model->delete( $data, $this->prefix.$table );
    }
    function addNews( $table, $data )
    {
        $this->Util_model->add( $data, $this->prefix.$table );
    }

    /**
     * User: YJS
     * Date: 2016-07-03
     * Des:获取留言的列表
     */
    function getMessageList( $offset, $limit ,$condition )
    {
        $cols = array('id','name','specialty','phone','email','content','sendtime','ischeck' );
        $cols = $this->Util_model->getTableColumns( $cols, array("project_id") );
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select $cols from `message` where (`title` like '$condition' or `author` like '$condition')  ";
        }
        else
        {
            $sql = "select $cols from `message` ";
        }
        $sql = $sql."order by `sendtime` DESC limit $offset, $limit";
        $query = $this->db->query( $sql );
        return $query->result_array();
    }
    /**
     * User: YJS
     * Date: 2016-07-03
     * Des:获取留言的条数
     */
    function getMessageTotal( $condition  )
    {
        if($condition)
        {
            $condition = '%'.$condition.'%';
            $sql = "select count(*) from `message` where (`title` like '$condition' or `author` like '$condition')  ";
        }
        else{
            $sql = "select count(*) from `message` ";
        }
        $query = $this->db->query($sql);
        $total = $query->row_array();
        if( $total == null)
            return 0;
        $total = $total['count(*)'];
        return $total;
    }
    /**
     * User: YJS
     * Date: 2016-07-03
     * Des:审核信息通过
     */
    function setCheckMessage( $id )
    {
        $data1['ischeck'] = 1;
        $data2['id'] = $id;
        $this->Util_model->update( $data1, $data2, $this->prefix."message" );
    }
    /**
     * User: YJS
     * Date: 2016-07-03
     * Des:获取网站详情
     */
    function getWebSiteDetail()
    {
        $data['project_id'] = $this->project_id;
        $query = $this->Util_model->query( null,$data, $this->prefix."website" );
        return $query->row_array();
    }
}