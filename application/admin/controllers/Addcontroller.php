<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addcontroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
 	{
  		parent::__construct();
		$this->load->helper('url');
		$this->output->set_header("Content-Type: text/html; charset=utf-8");
		$this->load->model('user_model');
		$this->load->model('website_type_model');
		$this->load->model('website_model');
 	}

 	function GetfourStr($len) 
		{ 
			$chars_array = array( 
		    "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
		    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", 
		    "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", 
		    "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", 
		    "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", 
		    "S", "T", "U", "V", "W", "X", "Y", "Z", 
		  	); 
			$charsLen = count($chars_array) - 1; 
			$outputstr = ""; 
		 	for ($i=0; $i<$len; $i++) 
		 	{ 
		 		$outputstr .= $chars_array[mt_rand(0, $charsLen)]; 
		 	} 
		 	return $outputstr; 
		} 
	function getinfo(){

		$res = $this->website_type_model->sql();

		$data['info'] = $res;

		//echo "<pre>";
		//var_dump($data);
		//echo "<pre/>";
		$this->load->view('websiteadd',$data);
	}

	function useradd(){
		//判断信息是否填写完全
		if (!isset($_POST["nickname"]) || empty($_POST["nickname"])
			|| !isset($_POST["phone"]) || empty($_POST["phone"])
			|| !isset($_POST["email"]) || empty($_POST["email"])
			|| !isset($_POST["account"]) || empty($_POST["account"])
			|| !isset($_POST["password"]) || empty($_POST["password"])) {
			$data = array (
	    		"success"  => false,
	   			"msg" => "请您填写完整！"
			);
			echo json_encode($data);
			return;
		}
		$nickname = $_POST["nickname"];
		$project_id = $this->GetfourStr(8);
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$account = $_POST["account"];
		$password = md5($_POST["password"]);
		$date = date("Y/m/d h:m:sa");

		$path = "uadmin/user/".$project_id."/product/";
		$path1 = "uadmin/user/".$project_id."/article/";
		$path2 = "uadmin/user/".$project_id."/news/";
		$path3 = "uadmin/user/".$project_id."/ads/";

		mkdir($path,0777,true);
		mkdir($path1,0777,true);
		mkdir($path2,0777,true);
		mkdir($path3,0777,true);

		session_start();
		$_SESSION['project_id'] = $project_id;  

		$this->user_model->sdl($project_id,$nickname,$account,$phone,$email,$password,$date);
		
		$res = $this->user_model->sql($project_id);

		$_SESSION['user_id'] = $res['id'];

		$data = array (
	    	"success"  => true,
	   		"msg" => "添加成功"
		);
		echo json_encode($data);
		return;
		
	}

	function websiteadd(){

		if (!isset($_POST["title"]) || empty($_POST["title"])
			|| !isset($_POST["website"]) || empty($_POST["website"])) {
			$data = array (
	    		"success"  => false,
	   			"msg" => "请您填写完整！"
			);
			echo json_encode($data);
			return;
		}

		$user_id = $_POST["user_id"];
		$project_id = $_POST["project_id"];
		$website_type = $_POST["website"];
		$website_title = $_POST["title"];
		$date = date("Y/m/d h:m:sa");

		$res = $this->website_type_model->getid($website_type);

		$website_id = $res[0]['id'];

		$enter_url = "http://www.just77.cn/uweb/?project_id=".$project_id;

		$this->website_model->sdl($user_id,$website_id,$website_type,$website_title,$project_id,$date,$enter_url);

		session_start();
		session_destroy();
		
		$data = array (
	    	"success"  => true,
	   		"msg" => $project_id."项目添加完成！"
		);
		echo json_encode($data);
		return;

	}

	function test(){

		$a = array(1,1,1);;
		echo $a;



		print_r($a);

	}
}
