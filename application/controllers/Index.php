<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends BaseController {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     *
    *public function __construct(){

        parent::__construct();
        $this->load->model('response_model');
    }*/
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    /*************访问入口函数************/
    public function index()
    {   

        $nonce     = $_GET['nonce'];
        
        $token     = 'ykppky';
        
        $timestamp = $_GET['timestamp'];
        
        $echostr   = $_GET['echostr'];
        
        $signature = $_GET['signature'];
        
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        
        if(isset($echostr) && $signature == $str){
            
            //第一次接入weixin api接口的时候
            echo  $echostr;
            
            exit;
        }else{
            
            $this->responseMsg();         
        }
    }
    /*******************回复信息****************/

    public function responseMsg()
    {

        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        
        
        //2.处理消息类型，并设置回复类型和内容
        /*<xml>
        <ToUserName><![CDATA[toUser]]></ToUserName>
        <FromUserName><![CDATA[FromUser]]></FromUserName>
        <CreateTime>123456789</CreateTime>
        <MsgType><![CDATA[event]]></MsgType>
        <Event><![CDATA[subscribe]]></Event>
        </xml>
        /*<xml>
        <ToUserName><![CDATA[toUser]]></ToUserName>
        <FromUserName><![CDATA[fromUser]]></FromUserName>
        <CreateTime>12345678</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[你好]]></Content>
        </xml>*/
        
        $postObj = simplexml_load_string( $postArr );
        $this->load->model('response_model');

        $arr = $this->response_model->getResponse();
        //$postObj->ToUserName = '';
        //$postObj->FromUserName = '';
        //$postObj->CreateTime = '';
        //$postObj->MsgType = '';
        //$postObj->Event = '';
        // gh_e79a177814ed
        //判断该数据包是否是订阅的事件推送
        
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注 subscribe 事件
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息(纯文本格式) 
                
                $content  = $arr['subscribe'];
                            /*<xml>
                            <ToUserName><![CDATA[toUser]]></ToUserName>
                            <FromUserName><![CDATA[fromUser]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[你好]]></Content>
                            </xml>*/
                $this->response_model->responseText($postObj,$content);  
            }elseif($postObj->Event == 'CLICK'){
                //回复用户消息(纯文本格式) 

                if( $postObj->EventKey == "introduce"){

                    $this->load->model("College_model");

                    $res = $this->College_model->getWebSiteBaseInfo();

                    $arr['title'] = $res['name']; 

                    $arr['description'] = $res['brief']; 
                    
                    $arr['picUrl'] = base_url()."uadmin/user/images/1.jpg";

                    $arr['url'] = base_url()."index.php/welcome/introduce?authority=low";

                    $arr  = array(
                                    '1' => $arr
                                     );                  
                }else{
                    $id = $postObj->EventKey;

                    $this->load->model('Specialties_model');

                    $res = $this->Specialties_model->getById($id);

                    $arr['title'] = $res['title']; 

                    $arr['description'] = $res['brief']; 
                    
                    $arr['picUrl'] = base_url()."uadmin/user/images/1.jpg";

                    $arr['url'] = base_url()."index.php/welcome/getspecialtiescontent?authority=low&id=".$id;

                    $arr  = array(
                                    '1' => $arr
                                     );
                    }

                $this->response_model->responseNews($postObj,$arr);
            }
        }elseif(strtolower( $postObj->MsgType) == 'text'){

                $content  = $arr['textresponse'];

                            /*<xml>
                            <ToUserName><![CDATA[toUser]]></ToUserName>
                            <FromUserName><![CDATA[fromUser]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[你好]]></Content>
                            </xml>*/
                $this->response_model->responseText($postObj,$content);
            }
    }

    public function http_curl($url,$type='get',$res='json',$arr=''){

                //1.初始化curl
                
                $ch = curl_init();
                
                //2.设置curl的参数
                curl_setopt($ch,CURLOPT_URL,$url);
                
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        
                if($type == 'post'){
                    
                    curl_setopt($ch,CURLOPT_POST,1);
                    
                    curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
                }
                //3.采集
                
                $output =curl_exec($ch);
                
                if($res=='json'){
                    
                    if(curl_error($ch)){
                        
                        //请求失败，返回错误信息
                        
                        return curl_error($ch);
                        
                    }else{
                        
                        curl_close($ch);
                        //请求成功，返回信息
                        return json_decode($output,true);
                    }
                }
               
            }
    public function  getWxAccessToken(){

                if($_SESSION['access_token'] && $_SESSION['expire_time']>time()){
                    
                  //如果access_token在session没有过期
                    return $_SESSION['access_token'];
                }
                else{
                    
                    //如果access_token比存在或者已经过期，重新取access_token
                    //1 请求url地址
                    $AppId = 'wx5ae875ab1561b768';
                    
                    $AppSecret = '442ff5241bb517815d2400d7b8c30bd6';
                        
                    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$AppId."&secret=".$AppSecret;
                   
                    $res=$this->http_curl($url,'get','json');

                    $access_token =$res['access_token'];

                    session_start();
                    //将重新获取到的aceess_token存到session
                    $_SESSION['access_token']=$access_token;
                    
                    $_SESSION['expire_time']=time()+7000;
                              
                    return $access_token;
                }
            }

    public function  definedItem(){
                
                //创建微信菜单
                
                //目前微信接口的调用方式都是通过 curl post/get
                
                //防止乱码

                header('content-type:text/html;charset=utf-8');

                $access_token = $this ->getWxAccessToken();

                //exit();
                $url ='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
                
                $this->load->model('specialties_model');

                $redirect_uri = urlencode("http://1.ykppky.applinzi.com/index.php/index/getUserOpenId");

                $arr = $this->specialties_model->getinfo();

                $postArr=array(
                    
                    'button'=>array(
                        
                        array(
                            
                            'name'=>urlencode('专业简介'),
                            
                            'sub_button'=>array(
                                
                                array(
                                    
                                    'name'=>urlencode($arr[0]['title']),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>$arr[0]['id']
                                    
                                ),//第一个二级菜单
                                array(
                                    
                                    'name'=>urlencode($arr[1]['title']),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>$arr[1]['id']
                                    
                                ),//第一个二级菜单
                                array(
                                    
                                    'name'=>urlencode($arr[2]['title']),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>$arr[2]['id']
                                    
                                ),//第一个二级菜单
                                array(
                                    
                                    'name'=>urlencode($arr[3]['title']),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>$arr[3]['id']
                                    
                                ),//第一个二级菜单

                                array(
                                    
                                    'name'=>urlencode($arr[4]['title']),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>$arr[4]['id']
                                    
                                ),//第一个二级菜单
           
                            )
                        ),

                        array(
                            
                            'name'=>urlencode('学院关注'),
                            
                            'sub_button'=>array(

                                array(
                                    
                                    'name'=>urlencode('学院简介'),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>'introduce'
                                    
                                ),//第一个二级菜单
                                
                                array(
                                    
                                    'name'=>urlencode('微网站'),
                                    
                                    'type'=>'view',
                                    
                                    'url'=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5ae875ab1561b768&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=ykp#wechat_redirect'
                                    
                                ),//第二个二级菜单
           
                            )
                        ),

                    )
                );
                //echo "****".$postArr."<br/>";
                $postJson = urldecode(json_encode($postArr));
                
                //echo "<hr/>";
                
                //echo "****".$postJson;
                
                $res = $this->http_curl($url,'post','json',$postJson);
                
                return $res;
            }

    public function updateItem(){

        $arr = $this->definedItem();

        if( $arr['errmsg'] == 'ok'){

            $this->alert->func("修改成功", base_url()."admin.php/specialties/getlist");
        }else{

            $this->alert->func("修改失败请重试", base_url()."admin.php/specialties/getlist");
        }
    }

    public function getUserOpenId(){

        $code = $this->input->get('code',true);
        // $state = $this->input->get('state',true);
        $AppId = 'wx5ae875ab1561b768';       
        $AppSecret = '442ff5241bb517815d2400d7b8c30bd6';
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$AppId."&secret=".$AppSecret."&code=".$code."&grant_type=authorization_code";
        $res = $this->http_curl($url,'get');

        $access_token = $res['access_token'];
        $openid = $res['openid'];
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
        $userinfo = $this->http_curl($url,'get');

        $this->load->model('user_model');
        $res = $this->user_model->checkUserInfo($userinfo);
        if(empty($res)) $this->user_model->saveUserInfo($userinfo);

        session_start();
        $_SESSION['openid'] = $userinfo['openid'];
        $_SESSION['nickname'] = $userinfo['nickname'];
        $_SESSION['province'] = $userinfo['province'];
        $_SESSION['city'] = $userinfo['city'];
        $_SESSION['headimgurl'] = $userinfo['headimgurl'];
        
        header('Location: '.base_url());
        //https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN 
        //var_dump($res);
    }

}