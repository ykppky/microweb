<!DOCTYPE html>
<html>
<head>
<title></title>
<base href="<?php echo base_url() ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<link href="common/application/css/news.css" rel="stylesheet" type="text/css"/>
<link href="common/application/css/type.css" rel="stylesheet" type="text/css"/>
<link href="common/application/css/footer.css" rel="stylesheet" type="text/css">
<link href="common/application/css/cate.css" rel="stylesheet" type="text/css">
<link href="common/application/css/message.css" rel="stylesheet" type="text/css">
<link href="common/application/css/photo.css" rel="stylesheet" type="text/css"/>
</head>
<style>
    .moreout{width: 100%}
    .moreout .more{width: 120px}
</style>
</head>
<body>
<div id="ui-header">
        <div class="fixed">
            <a class="ui-title" id="popmenu">菜单</a>
            <a class="ui-btn-left_pre" href="javascript:history.go(-1)"></a>
            <a class="ui-btn-right_home" href="index.php"></a>
        </div>
    </div>
    <!--start 顶部菜单-->
    <div id="overlay"></div>
    <div id="win">
        <ul class="dropdown">
            <?php if($action != 'introduce'){ ?><li><a href="index.php/welcome/introduce"><span>学校概况</span></a></li><?php } ?>
            <?php if($action != 'news'){ ?><li><a href="index.php/welcome/newslist"><span>活动新闻</span></a></li><?php } ?>
            <?php if($action != 'album'){ ?><li><a href="index.php/welcome/picture"><span>学院一角</span></a></li><?php } ?>
            <?php if($action != 'specialty'){ ?><li><a href="index.php/welcome/specialties"><span>专业信息</span></a></li><?php } ?>
            <?php if($action != 'laoxiang'){ ?><li><a href="index.php/welcome/laoxiang"><span>老乡聚一堂</span></a></li><?php } ?>
            <?php if($action != 'moral'){ ?><li><a href="index.php/welcome/morallist"><span>道德天地</span></a></li><?php } ?>
            <?php if($action != 'activity'){ ?><li><a href="index.php/welcome/activitieslist"><span>活动专区</span></a></li><?php } ?>
            <?php if($action != 'opennews'){ ?><li><a href="index.php/welcome/opennewslist"><span>通知公告</span></a></li><?php } ?>
            <?php if($action != 'msg'){ ?><li><a href="index.php/welcome/msg"><span>联系我们</span></a></li><?php } ?>
            <div class="clr"></div>
        </ul>
    </div>
<div class="qiandaobanner" style="margin-top :46px">
    <a><img src="../common/application/images/laoxiang.jpg"></a>
</div>
<div id="main" role="main" class="main">
<?php 
    if($openid == 1) {
    
    $headimgurl="http://wx.qlogo.cn/mmopen/Q3auHgzwzM4iajQLW75RSpzNh8IibRWQqpjJgtkF8hRY5Enwvq9aGayYqcBEeHoArEvicFomFMHzboO2CqbkaOTggu7zRnK5oHglhsp0Xlp2ec/0";
    $nickname  = "有一種習慣叫單曲循環";
    $city = "漳州";
    } 
    ?>
<input type="hidden" value='<?php echo $openid; ?>' id="openid">
<input type="hidden" value='<?php echo $city; ?>' id="city">
</div>
<div style="margin: 0 10px 0 10px;">
    <span style="font-size: 20px">您好！</span>
    <span style="display: block;position: absolute;top:150px; left:10px;"><img src="<?php echo $headimgurl ?>" style='width: 40px; height: 40px; border-radius:50%'></span>
    <strong style='color: red; font-size:large'><?php echo $nickname ?></strong>
</div>
<div style="margin: 20px 10px 0 10px;"> <span>同院老乡：</span><?php echo $count ?>人</div>

<div style="margin: 50px 10px 0 10px;"> 
    <ul id="list">
        
    </ul>
    <center id='more' style="margin-top: 30px"><a href="javascript:void(0);" class="a" onclick="laoxiangmore()">查看更多></a></center>
</div>
        <a class="footer"><span class="top">返回顶部</span></a>
<?php $this->load->view('footer') ?>
<script language="JavaScript" type='text/javascript' src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="common/application/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="common/application/js/layer.js" type="text/javascript"></script>
<script>
    var count = 6;

    var openid = $('#openid').val();
    var city = $('#city').val();
    $(function(){

        $.ajax({
            type: 'POST',
            url: 'index.php/welcome/laoxiang',
            data: {
            openid: openid
            },
            dataType: 'json',
            success: function(data){

                if(data.status == 0){
                    layer.open({
                    type: 2,
                    closeBtn: 1,
                    shadeClose: false,
                    title: '首次查看该模块请完善您的信息',
                    shade: 0.3,
                    area: ['300px', '250px'],
                    content:"index.php/welcome/laoxiang?openid="+openid,
                    cancel: function(index){ 
                      if(confirm('确定后您将无法浏览该模块')){
                        layer.close(index);
                        window.history.back(-1);  
                      }
                      return false; 
                    }  
                    });
                }else{
                    getlaoxiang();
                }
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            }

        });
    })

    function laoxiangmore(){

        count = count + 4;
        getlaoxiang();
    }

    function getlaoxiang(){

        $.ajax({
            type: 'POST',
            url: 'index.php/welcome/getlaoxiang',
            data:{
                city: city,
                openid: openid,
                count: count
                },
            dataType: 'json',
            success: function(data){

                if(data[1]['status'] == 0){

                    $('.a').hide();
                }
                var html = "";

                for(var i = 0; i < data[0].length; i++){

                    if(data[0][i]['truename'] == ''){

                        data[0][i]['truename'] = "用户未公开";
                    }

                    if(data[0][i]['sex'] == 1){

                        data[0][i]['sex'] = "男";
                    }else{

                        data[0][i]['sex'] = "女";
                    }

                    html += "<a href='javascript:void(0);' onclick='moreInfo("+data[0][i]['id']+")'><li style='margin-bottom:10px'><img src="+data[0][i]['headimg']+" style='width:40px; height:40px; border-radius:50%;'/><span>"+data[0][i]['nickname']+"</span></li></a><div id='info"+data[0][i]['id']+"' style='display:none; margin:0 0 20px 0; padding-left:30px '><ul><li><span>姓名：</span>"+data[0][i]['truename']+"</li><span>性别：</span>"+data[0][i]['sex']+"<li><span>微信号：</span>"+data[0][i]['wxaccount']+"</li></ul></div><hr style='width:50px;margin:0 40px;'/>";
                }
                //console.log(data);
                document.getElementById("list").innerHTML = html;

                if(count >= <?php echo $count; ?>){
                    $("#more").empty()
                    document.getElementById("more").innerHTML = "<a href='javascript:void(0);' >没有更多了</a>"
                }

                if(<?php echo $count; ?> == 0) $("#more").empty();
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
                }
            });
    }

    function moreInfo(id){
        var id = "#info"+id;
        if($(id).css('display') == 'none'){
            $(id).show();
        }else{
            $(id).hide();
        }
        
    }
</script>
<script>
    $(".footer").click(function() {
        jQuery("html,body").animate({
            scrollTop: 0
        }, 500, function() {});
    });
</script>
<script>
    window.onload = function () {
        var oWin = document.getElementById("win");
        var oLay = document.getElementById("overlay");
        var oBtn = document.getElementById("popmenu");
        var oClose = document.getElementById("close");
        oBtn.onclick = function () {
            oLay.style.display = "block";
            oWin.style.display = "block"
        };
        oLay.onclick = function () {
            oLay.style.display = "none";
            oWin.style.display = "none"
        }
    };
</script>
<style>