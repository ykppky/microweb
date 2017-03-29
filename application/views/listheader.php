<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?></title>
<base href="<?php echo base_url() ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv ="" "x-ua-compatible" content ="" "ie="edge,chrome=1""/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<link href="common/application/css/news.css" rel="stylesheet" type="text/css"/>
<link href="common/application/css/type.css" rel="stylesheet" type="text/css"/>
<link href="common/application/css/footer.css" rel="stylesheet" type="text/css">
<link href="common/application/css/cate.css" rel="stylesheet" type="text/css">
<link href="common/application/css/message.css" rel="stylesheet" type="text/css">
<script src="common/application/js/jquery-1.10.1.min.js" type="text/javascript"></script>
</head>
<body>
<link rel="stylesheet" href="common/application/css/idangerous.swiper.css">
<link href="common/application/css/iscroll.css" rel="stylesheet" type="text/css">
<script src="common/application/js/iscroll.js" type="text/javascript"></script>
<script src="common/application/js/layer.js" type="text/javascript"></script>
<script type="text/javascript">
    var myScroll;
    function loaded() {
      myScroll = new iScroll('wrapper', {
        snap: true,
        momentum: false,
        hScrollbar: false,
        onScrollEnd: function () {
          document.querySelector('#indicator > li.active').className = '';
          document.querySelector('#indicator > li:nth-child(' + (this.currPageX + 1) + ')').className = 'active';
        }
      });
    }
    document.addEventListener('DOMContentLoaded', loaded, false);
    </script>
<!--music-->
<div class="banner" style="margin-top: 46px">
    <input type="hidden" id="project_id" value=""/>
    <div id="wrapper" style="overflow: hidden;">
        <div id="scroller" style="width: 12141px; transition-property: -webkit-transform; transform-origin: 0px 0px 0px; transform: translate3d(-1349px, 0px, 0px) scale(1);">
            <ul id="thelist">
                        <?php 
                        $count = count($ad);
                        for($i=0;$i<$count;$i++)
                        {
                        ?>
                        <li>
                            <a href="<?php 
                                            if($ad[$i]['url'] == '')
                                                echo $ad[$i]['url'].'uweb/?project_id='.$project_id;
                                            else if($ad[$i]['url']!=''&&$ad[$i]['url']!=null)
                                                echo $ad[$i]['url'];
                                     ?>"
                            >
                            <img src="<?php echo 'uadmin/user/'.$project_id.'/ads/'.$ad[$i]['img']?>" width="100%" />
                            </a>
                        </li>
                        <?php   
                        }
                        ?>
                        
            </ul>
        </div>
    </div>
    <div id="nav">
        <ul id="indicator">
            <li class="active"></li>
            <?php for($i=0 ;$i<count($ad)-1; $i++){
                    echo "<li></li>";
                }
             ?>
        </ul>
    </div>
    <div class="clr">
    </div>
</div>
<script type="text/javascript">
        var count = document.getElementById("thelist").getElementsByTagName("img").length;
        var count2 = document.getElementsByClassName("menuimg").length;
        for (i = 0; i < count; i++) {
            $("#thelist").find("img").css({"width":document.body.clientWidth,"height":document.body.clientWidth*400/640});
        }
        document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";
        setInterval(function () {
            myScroll.scrollToPage('next', 0, 400, count);
        }, 3500);
        window.onresize = function () {
            for (i = 0; i < count; i++) {
                $("#thelist").find("img").css({"width":document.body.clientWidth,"height":document.body.clientWidth*400/640});
            }
            document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";
        }
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
            <?php if($action != 'news'){ ?><li><a href="index.php/welcome/newslist"><span>动态新闻</span></a></li><?php } ?>
            <?php if($action != 'album'){ ?><li><a href="index.php/welcome/album"><span>学院一角</span></a></li><?php } ?>
            <?php if($action != 'specialty'){ ?><li><a href="index.php/welcome/specialties"><span>专业信息</span></a></li><?php } ?>
            <?php if($action != 'laoxiang'){ ?><li><a href="index.php/welcome/laoxiang"><span>老乡聚一堂</span></a></li><?php } ?>
            <?php if($action != 'moral'){ ?><li><a href="index.php/welcome/morallist"><span>道德天地</span></a></li><?php } ?>
            <?php if($action != 'activity'){ ?><li><a href="index.php/welcome/activitieslist"><span>活动专区</span></a></li><?php } ?>
            <?php if($action != 'opennews'){ ?><li><a href="index.php/welcome/opennewslist"><span>通知公告</span></a></li><?php } ?>
            <?php if($action != 'msg'){ ?><li><a href="index.php/welcome/msg"><span>联系我们</span></a></li><?php } ?>
            <div class="clr"></div>
        </ul>
    </div>
<div id="insert1">
</div>
