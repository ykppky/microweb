<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Response_model extends CI_Model{
	//回复多图文类型的微信消息

	function __construct(){
		 
		parent::__construct();
		$this->load->model("util_model");
        $this->prefix = "";		 
	}
	public function responseNews($postObj ,$arr){
		$toUser = $postObj->FromUserName;
		$fromUser = $postObj->ToUserName;
		$template = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<ArticleCount>".count($arr)."</ArticleCount>
					<Articles>";
		foreach($arr as $k=>$v){
			$template .="<item>
						<Title><![CDATA[".$v['title']."]]></Title> 
						<Description><![CDATA[".$v['description']."]]></Description>
						<PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
						<Url><![CDATA[".$v['url']."]]></Url>
						</item>";
		}
		
		$template .="</Articles>
					</xml> ";
		echo sprintf($template, $toUser, $fromUser, time(), 'news');
	}

	// 回复单文本
	public function responseText($postObj,$content){
		$template = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					</xml>";
		//注意模板中的中括号 不能少 也不能多
		$fromUser = $postObj->ToUserName;
		$toUser   = $postObj->FromUserName; 
		$time     = time();
		$msgType  = 'text';
		echo sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
	}

	//回复微信用户的关注事件
	public function responseSubscribe($postObj, $content){
		
		$this->responseNews($postObj,$content);
	}

	function getInfo( $type )
    {
        $data['type'] = $type;

        $query = $this->util_model->query( null, $data, $this->prefix.'response');
        $query = $query->row_array();
        if( empty( $query) ){
            return null;
        }
        return $query['content'];
    }

	function getResponse()
    {
        $result['subscribe'] = $this->getInfo("subscribe");
        $result['textresponse'] = $this->getInfo("textresponse");
        return $result;
    }



	//回复纯文本
}

?>