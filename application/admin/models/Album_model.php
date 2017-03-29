<?php
/**
 * Created by PhpStorm.
 * User: YJS
 * Date: 2016-07-03
 * Time: 16:37
 */
class Album_model extends CI_Model
{
    private $prefix;//表名前缀

    function __construct()
    {
        parent::__construct();
        $this->load->model("Util_model");
        $this->prefix = "";
    }

    /*
    * * User: YJS
    * Date: 2016/7/3
    * Description:获取广告信息
    */
    function getAlbumList( $table )
    {
        $query = $this->Util_model->query( null, $data, $this->prefix.$table );
        return $query->result_array();
    }


    /*
    * * User: YJS
    * Date: 2016/7/3
    * Description:添加广告
    */
    function addAlbum( $table, $arr )
    {
        $data = array( 'null', $arr[0], $arr[1],$arr[2], date('Y-m-d H:i:s'));
        $this->Util_model->add( $data, $this->prefix.$table );
    }

    /*
    * * User: YJS
    * Date: 2016/7/3
    * Description:更新广告
    */

    function updateAlbumById( $table, $id, $arr )
    {
        $col = Array("title","url","img");
        for( $i=0;$i<count($col);$i++)
        {
            $data1[$col[$i]] = $arr[$i];
        }
        $data2['id'] = $id;
        $this->Util_model->update( $data1, $data2, $this->prefix.$table );
    }

    function deleteAlbumById( $table, $id )
    {
        $data2['id'] = $id;
        $this->Util_model->delete( $data2, $this->prefix.$table );
    }

    function getAlbumById( $table, $id )
    {
        $data['id'] = $id;
        $query = $this->Util_model->query( null, $data, $this->prefix.$table );
        return $query->row_array();
    }
}