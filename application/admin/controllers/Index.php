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
    /*************访问入口函数************/
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

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
            
            $this->responsemsg();
            //$this->definedItem();            
        }
    }
    /*******************回复信息****************/

    public function responsemsg()
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
                
                $content  = '您好！欢迎关注我的公众号!';
                            /*<xml>
                            <ToUserName><![CDATA[toUser]]></ToUserName>
                            <FromUserName><![CDATA[fromUser]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[你好]]></Content>
                            </xml>*/
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
            if( $postObj->Event == 'CLICK'){
                //回复用户消息(纯文本格式) 
                if(strtolower($postObj->EventKey == 'songs')){

                    $content  = '歌曲';
                }
                if(strtolower($postObj->EventKey == 'item1')){

                    $content  = 'jianjie';
                }
                
                            /*<xml>
                            <ToUserName><![CDATA[toUser]]></ToUserName>
                            <FromUserName><![CDATA[fromUser]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[你好]]></Content>
                            </xml>*/
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
        }elseif(strtolower( $postObj->MsgType) == 'text'){

                $content  = '您好！信息我们已经收到！我们会尽快处理的！';

                            /*<xml>
                            <ToUserName><![CDATA[toUser]]></ToUserName>
                            <FromUserName><![CDATA[fromUser]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[你好]]></Content>
                            </xml>*/
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
                        //请求成功，返回错误信息
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
                //print_r($_SESSION['access_token']); echo "<br/>**";
                //print_r($_SESSION['expire_time']); echo "<br/>";
                //echo "现在是：".time();
                //exit();
                $url ='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
                
                $postArr=array(
                    
                    'button'=>array(
                        
                        array(
                            
                            'name'=>urlencode('专业简介'),
                            
                            'sub_button'=>array(
                                
                                array(
                                    
                                    'name'=>urlencode('计算机类专业'),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>'speciality1'
                                    
                                ),//第一个二级菜单
                                array(
                                    
                                    'name'=>urlencode('电子信息工程'),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>'speciality2'
                                    
                                ),//第一个二级菜单
                                array(
                                    
                                    'name'=>urlencode('新能源科学与技术'),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>'speciality3'
                                    
                                ),//第一个二级菜单
                                array(
                                    
                                    'name'=>urlencode('电子信息科学与技术'),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>'speciality4'
                                    
                                ),//第一个二级菜单

                                array(
                                    
                                    'name'=>urlencode('物联网工程'),
                                    
                                    'type'=>'click',
                                    
                                    'key'=>'speciality5'
                                    
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
                                    
                                    'url'=>'http://ykppky.applinzi.com/'
                                    
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
                
                var_dump($res);
                
            }
}