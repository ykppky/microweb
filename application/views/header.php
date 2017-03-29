  <!DOCTYPE html>
  <html>
  <head>
  <title><?php echo $title ?></title>
  <base href="<?php echo base_url() ?>"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>

  <link href="common/application/css/news.css" rel="stylesheet" type="text/css"/>
  <link href="common/application/css/type.css" rel="stylesheet" type="text/css"/>
  <link href="common/application/css/footer.css" rel="stylesheet" type="text/css">
  <link href="common/application/css/cate.css" rel="stylesheet" type="text/css">
  <link href="common/application/css/message.css" rel="stylesheet" type="text/css">
  <link href="common/application/css/photo.css" rel="stylesheet" type="text/css"/>
<!--   <script src="common/application/js/jquery.wookmark.min.js" type="text/javascript"></script> -->
  <script type="text/javascript" src="common/application/js/mootools-core.js"></script>
  <script type="text/javascript" src="common/application/js/mediabox.js"></script>
  <script src="common/application/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <script src="common/application/js/layer.js" type="text/javascript"></script>
</head>
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
<body>
    <div id="ui-header">
        <div class="fixed" <?php if($authority){ echo "style='display:none'";} ?> >
            <a class="ui-title" id="popmenu">菜单</a>
            <a class="ui-btn-left_pre" href="javascript:history.go(-1)"></a>
            <a class="ui-btn-right_home" href="index.php"></a>
        </div>
    </div>
    <!--start 顶部菜单-->
    <div id="overlay"></div>
    <div id="win">
        <ul class="dropdown">
            <li><a href="index.php/welcome/index"><span>首页</span></a></li>
            <li><a href="index.php/welcome/introduce"><span>学校概况</span></a></li>
            <li><a href="index.php/welcome/newslist"><span>动态新闻</span></a></li>
            <li><a href="index.php/welcome/album"><span>学院一角</span></a></li>
            <li><a href="index.php/welcome/specialties"><span>专业信息</span></a></li>
            <li><a href="index.php/welcome/laoxiang"><span>老乡聚一堂</span></a></li>
            <li><a href="index.php/welcome/morallist"><span>道德天地</span></a></li>
            <li><a href="index.php/welcome/activitieslist"><span>活动专区</span></a></li>
            <li><a href="index.php/welcome/opennewslist"><span>通知公告</span></a></li>
            <li><a href="index.php/welcome/msg"><span>联系我们</span></a></li>
            <div class="clr"></div>
        </ul>
    </div>
    <!--end 顶部菜单-->
