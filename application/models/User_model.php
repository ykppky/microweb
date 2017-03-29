<?php
/*
 * Created on 2014-4-10
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 Class User_model extends CI_Model{

 	function __construct(){
		 parent::__construct();
		 $this->load->database();
	}


  	function saveUserInfo($arr)
  	{
        // openid	用户的唯一标识
		// nickname	用户昵称
		// sex	用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
		// province	用户个人资料填写的省份
		// city	普通用户个人资料填写的城市
		// country	国家，如中国为CN
		// headimgurl	用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。
		// privilege	用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）
		// unionid	只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。

		$openid = $arr['openid'];
		$nickname = $arr['nickname'];
		$province = $arr['province'];
		$city = $arr['city'];
		$country = $arr['country'];
		$headimgurl = $arr['headimgurl'];
		$sex = $arr['sex'];
		$time = date("Y-m-d H:i:s");
		$sql = "insert into `user` values(null,'$openid','$headimgurl','$nickname',null,'$sex',null,'$time','$province','$city',null)";

		$query = $this->db->query($sql);
  	}

  	function improve($arr)
  	{
  		$openid = $arr['openid'];
        $truename = $arr['truename']; 
        $specialties = $arr['specialties'];
        $wxaccount = $arr['wxaccount'];

        $sql = "update user set truename = '$truename',wxaccount = '$wxaccount',specialties = '$specialties' where openid = '$openid'";

        $query = $this->db->query($sql);
  	}

  	function checkUserInfo($arr)
  	{	
  		$openid = $arr['openid'];

  		$sql = "select * from `user` where `openid` = '$openid'";
		$query = $this->db->query($sql);

		$query = $query->result_array($query);

		return $query;
  	}

  	function getUserStatus($openid)
  	{
  		$sql = "select `wxaccount` from `user` where `openid` = '$openid'";

  		$query = $this->db->query($sql);

		$query = $query->result_array($query);

		return $query;

  	}

  	function getInfos($city,$openid,$count)
  	{
  		$sql = "select * from `user` where `city` = '$city' and `openid` != '$openid' order by `id` desc limit 0,$count";

  		$query = $this->db->query($sql);

		$query = $query->result_array($query);

		return $query;
  	}

  	function getAllLaoxiang($city,$openid)
  	{
  		$sql = "select * from `user` where `city` = '$city' and `openid` != '$openid'";

  		$query = $this->db->query($sql);

		$query = $query->result_array($query);

		return $query;
  	}
}