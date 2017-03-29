<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends BaseController {

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
        echo "<pre>";
        var_dump($data);
        echo "<pre/>";
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
     function __construct()
    {
        parent::__construct();
        $this->page->setprenum(5);
        $this->load->model('advert_model');
        $this->load->model('baseinfo_model');
    }
    //首页

    public function index()
    {   
        $data['ad'] = $this->advert_model->getAdvertList();
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['title'] ='首页-'.$arr['name'];
        $this->load->view('index',$data);
    }

    //简介

    public function introduce()
    {   
        $data['authority'] = $this->input->get('authority',true);
        $arr = $this->baseinfo_model->getinfos();
        $data['title'] ='学院简介-'.$arr['name'];
        $data['baseinfos'] = $arr;
        $data['action'] = "introduce";
        $this->load->view('introduce',$data);
    }

    public function newslist()
    {   
        $data['ad'] = $this->advert_model->getAdvertList();
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['menu'] = "新闻列表";
        $data['title'] ='动态新闻-'.$arr['name'];

        $curpage = $this->uri->segment(4);
        $this->load->model('news_model');
        //获取总页面
        $this->page->settotalpage($this->news_model->gettotal($this->page->getprenum(),null)) ;
        if($curpage<1||$curpage==''||$curpage==null)//页码非法
        {
            $this->page->setcurpage(1);
        }
        else
        {
            $this->page->setcurpage($curpage);
        }

        $arr = $this->news_model->getlist($this->page->getcurpage(),$this->page->getprenum(),null);
        $data['news'] = $arr;
        $data['totalpage'] = $this->page->gettotalpage();
        $data['curpage'] = $this->page->getcurpage();
        $data['action'] = "news";

        $this->load->view('news/newslist',$data);
    }

    public function getnewscontent()
    {   

            $id = $this->input->get('id',true);
            $this->load->model('news_model');
            $arr = $this->news_model->getById($id);
            $data['news'] = $arr;

            $arr = $this->baseinfo_model->getinfos();
            $data['baseinfos'] = $arr;
            $data['title'] ='新闻详情-'.$arr['name'];
            $data['action'] = "news";
            $this->load->view('news/new',$data);
        

    }

    public function album()
    {   
        $this->load->model('picture_model');
        $data['picture'] = $this->picture_model->getAllPicture();
        $data['action'] = "album";
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $this->load->view('picture',$data);
    }

    public function specialtieslist()
    {   
        $data['ad'] = $this->advert_model->getAdvertList();
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;

        $data['menu'] = "专业列表";
        $data['title'] ='专业信息-'.$arr['name'];

        $curpage = $this->uri->segment(4);
        $this->load->model('specialties_model');
        //获取总页面
        $this->page->settotalpage($this->specialties_model->gettotal($this->page->getprenum(),null)) ;
        if($curpage<1||$curpage==''||$curpage==null)//页码非法
        {
            $this->page->setcurpage(1);
        }
        else
        {
            $this->page->setcurpage($curpage);
        }

        $arr = $this->specialties_model->getlist($this->page->getcurpage(),$this->page->getprenum(),null);
        $data['specialties'] = $arr;
        $data['totalpage'] = $this->page->gettotalpage();
        $data['curpage'] = $this->page->getcurpage();
        $data['action'] = "specialty";

        $this->load->view('specialties/specialtieslist',$data);
    }

    public function getspecialtiescontent()
    {   
        $data['authority'] = $this->input->get('authority',true);
        $id = $this->input->get('id',true);
        $this->load->model('specialties_model');
        $arr = $this->specialties_model->getById($id);
        $data['specialties'] = $arr;

        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['title'] ='新闻详情-'.$arr['name'];
        $data['action'] = "specialty";
        $this->load->view('specialties/specialty',$data);
    }

    public function laoxiang()
    {   

        $openid = $this->input->post('openid',true);

        if(!empty($openid)){

            $this->load->model('user_model');
            $res = $this->user_model->getUserStatus($openid);

            $msg = array(
                    'status' => 1,
                    'data' => 'ok'
                    );

            if(empty($res[0]['wxaccount'])){

                $msg = array(
                    'status' => 0,
                    'data' => 'no'
                );
            }

            echo json_encode($msg);
        }else{        
            $openid = $this->input->get('openid',true);
            if(!empty($openid)){
                $data['openid'] = $openid;
                $this->load->view('laoxiang/info',$data);

            }else{
                session_start();
                $data['openid'] = $_SESSION['openid'];
                $data['nickname'] = $_SESSION['nickname'];
                $data['province'] = $_SESSION['province'];
                $data['city'] = $_SESSION['city'];
                $data['headimgurl'] = $_SESSION['headimgurl'];
                $data['action'] = 'laoxiang';
                $this->load->model('user_model');
                if($data['openid'] == ''){
                    $data['openid'] = 1;
                    $data['city'] = '漳州';
                }
                $count = count($this->user_model->getAllLaoxiang($data['city'] ,$data['openid']));
                $data['count'] = $count;
                $this->load->view('laoxiang/laoxiang',$data);
                }
            }
    }

    public function improveUserInfo(){

        $openid = $this->input->post('openid',true);
        $truename = $this->input->post('truename',true);
        $specialties = $this->input->post('specialties',true);
        $wxaccount = $this->input->post('wxaccount',true);
        $arr  = array(
            'openid' => $openid,
            'truename' => $truename,
            'specialties' => $specialties,
            'wxaccount' => $wxaccount
            );
        $this->load->model('user_model');
        $this->user_model->improve($arr);

        echo "<script type='text/javascript'> window.parent.location.reload();</script>";
    }

    public function getlaoxiang(){

        $city = $this->input->post('city',true);
        $openid = $this->input->post('openid',true);
        $count = $this->input->post('count',true);
        $this->load->model('user_model');
        $res[] = $this->user_model->getInfos($city,$openid,$count);
        $allcount = count($this->user_model->getAllLaoxiang($city,$openid));

        if($allcount <= $count){
            $res[] = array(
                'status' => 0);
        }else{
                $res[] = array(
                'status' => 1);

        }
        echo json_encode($res);
    }

    public function morallist()
    {   
        $data['ad'] = $this->advert_model->getAdvertList();
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;

        $data['menu'] = "道德教育";
        $data['title'] ='道德天地-'.$arr['name'];

        $curpage = $this->uri->segment(4);
        $this->load->model('moral_model');
        //获取总页面
        $this->page->settotalpage($this->moral_model->gettotal($this->page->getprenum(),null)) ;
        if($curpage<1||$curpage==''||$curpage==null)//页码非法
        {
            $this->page->setcurpage(1);
        }
        else
        {
            $this->page->setcurpage($curpage);
        }

        $arr = $this->moral_model->getlist($this->page->getcurpage(),$this->page->getprenum(),null);
        $data['moral'] = $arr;
        $data['totalpage'] = $this->page->gettotalpage();
        $data['curpage'] = $this->page->getcurpage();
        $data['action'] = "moral";
        $this->load->view('moral/morallist',$data);
    }

    function getmoralcontent(){

        $id = $this->input->get('id',true);
        $this->load->model('moral_model');
        $arr = $this->moral_model->getById($id);
        $data['moral'] = $arr;

        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['title'] ='新闻详情-'.$arr['name'];
        $data['action'] = "moral";
        $this->load->view('moral/moral',$data);
    }

    public function activitieslist()
    {   
        $data['ad'] = $this->advert_model->getAdvertList();
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['menu'] = "活动宣传";
        $data['title'] ='活动宣传-'.$arr['name'];

        $curpage = $this->uri->segment(4);
        $this->load->model('activities_model');
        //获取总页面
        $this->page->settotalpage($this->activities_model->gettotal($this->page->getprenum(),null)) ;
        if($curpage<1||$curpage==''||$curpage==null)//页码非法
        {
            $this->page->setcurpage(1);
        }
        else
        {
            $this->page->setcurpage($curpage);
        }

        $arr = $this->activities_model->getlist($this->page->getcurpage(),$this->page->getprenum(),null);
        $data['activities'] = $arr;
        $data['totalpage'] = $this->page->gettotalpage();
        $data['curpage'] = $this->page->getcurpage();
        $data['action'] = "activity";
        $this->load->view('activities/activitieslist',$data);
    }

    function getactivitycontent(){

        $id = $this->input->post('id',true);
        if(isset($id)){
            $count = $this->input->post('count',true);
            $this->load->model('comment_model');
            $res[] = $this->comment_model->getComment($id,$count);
            $allcount = $this->comment_model->getAllComment($id);
            if($allcount <= $count){
                $res[] = array(
                    'status' => 0);
            }else{
                $res[] = array(
                    'status' => 1);

            }
            echo json_encode($res);
            
        }else {

            $id = $this->input->get('id',true);
            $this->load->model('activities_model');
            $arr = $this->activities_model->getById($id);
            $data['activities'] = $arr;

            $arr = $this->baseinfo_model->getinfos();
            $data['baseinfos'] = $arr;
            $data['title'] ='活动详情-'.$arr['name'];
            $data['action'] = "activity";
            $data['id'] = $id;
            $this->load->view('activities/activity',$data);
        }
    }

     public function opennewslist()
    {   
        $data['ad'] = $this->advert_model->getAdvertList();
        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['menu'] = "公告列表";
        $data['title'] ='公告公示-'.$arr['name'];

        $curpage = $this->uri->segment(4);
        $this->load->model('opennews_model');
        //获取总页面
        $this->page->settotalpage($this->opennews_model->gettotal($this->page->getprenum(),null)) ;
        if($curpage<1||$curpage==''||$curpage==null)//页码非法
        {
            $this->page->setcurpage(1);
        }
        else
        {
            $this->page->setcurpage($curpage);
        }

        $arr = $this->opennews_model->getlist($this->page->getcurpage(),$this->page->getprenum(),null);
        $data['opennews'] = $arr;
        $data['totalpage'] = $this->page->gettotalpage();
        $data['curpage'] = $this->page->getcurpage();
        $data['action'] = "opennews";
        $this->load->view('opennews/opennewslist',$data);
    }

    function getopennewscontent(){

        $id = $this->input->get('id',true);
        $this->load->model('opennews_model');
        $arr = $this->opennews_model->getById($id);
        $data['opennews'] = $arr;

        $arr = $this->baseinfo_model->getinfos();
        $data['baseinfos'] = $arr;
        $data['title'] ='公告详情-'.$arr['name'];
        $data['action'] = "opennews";
        $this->load->view('opennews/opennew',$data);
    }

    public function msg()
    {   
        $name = $this->input->post('name',true);
        $phone = $this->input->post('phone',true);
        $email = $this->input->post('email',true);
        $specialty = $this->input->post('specialty',true);
        $content = $this->input->post('content',true);
        if($name || $phone || $email || $specialty || $content){

            $msg = array(
                'status' => 1, 
                'msg' => '留言成功！'
                );
            if(!$name || !$phone || !$email || !$specialty || !$content) {
                $msg = array('status' => 0, 'msg' => '信息不完整！');
                echo json_encode($msg);
                exit();
            }

            $arr = array($name,$specialty,$phone,$email,$content);
            $this->baseinfo_model->addMessage($arr);
            echo json_encode($msg);

        }else{
            $res = $this->baseinfo_model->getMessage();
            $data['specialty'] = $res;
            $arr = $this->baseinfo_model->getinfos();
            $data['baseinfos'] = $arr;
            $data['action'] = "msg";
            $this->load->view('msg',$data);
        }
    }

    public function pinglun()
    {   
        $id = $this->input->get('id',true);
        if(isset($id)){

            $data['id'] = $id;
            $this->load->view('activities/pinglun',$data);
            
        }else{
            $id = $this->input->post('id',true);
            $count =  $this->input->post('count',true);
            $comment = $this->input->post('comment',true);

            session_start();
            $openid = $_SESSION['openid'];
            // echo $id.$comment;
            $this->load->model('comment_model');
            $this->comment_model->addComment($id,$comment,$openid);

            echo "<script type='text/javascript'> window.parent.location.reload();</script>";
        }
        
        
    }

    public function bdMap()
    {
        $data['address'] = $this->input->get('address',true);
        $data['name'] = $this->input->get('name',true);
        $data['phone'] = $this->input->get('phone',true);

        $this->load->view('bdmap',$data);
    }
}

        