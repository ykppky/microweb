<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Response_model extends CI_Model{


	function __construct(){

		parent::__construct();
		$this->load->model("Util_model");
        $this->prefix = "";
	}

	function getInfo( $type )
    {
        $data['type'] = $type;

        $query = $this->Util_model->query( null, $data, $this->prefix.'response');
        $query = $query->row_array();
        if( empty( $query) ){
            return null;
        }
        return $query['content'];
    }

    function update( $type, $value )
    {
        $res = $this->getInfo( $type );
        if( $res === null )
        {
            $data = array("null", $type, $value);
            $this->Util_model->add( $data, "response");
        }
        else
        {
            $data1['content'] = $value;
            $data2['type'] = $type;
            $this->Util_model->update( $data1,$data2, $this->prefix.'response');
        }
    }
    /**
     * User: YJS
     * Date: 2016-07-02
     * Des:
     */
    function getResponse()
    {
        $result['subscribe'] = $this->getInfo("subscribe");
        $result['textresponse'] = $this->getInfo("textresponse");
        return $result;
    }
    /**
     * User: YJS
     * Date: 2016-07-02
     * Des:更新
     */
    function updateInfo( $data )
    {   
        $this->update( "subscribe", $data[0] );
        $this->update( "textresponse", $data[1] );
    }
}

?>