<!DOCTYPE html>
<html>
<head>
<title></title>
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
<script language="JavaScript" type='text/javascript' src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<link href="common/application/css/photo.css" rel="stylesheet" type="text/css"/>
<script src="common/application/js/jquery.imagesloaded.js" type="text/javascript"></script>
<script src="common/application/js/jquery.wookmark.min.js" type="text/javascript"></script>
<script type="text/javascript" src="common/application/js/mootools-core.js"></script>
<script type="text/javascript" src="common/application/js/mediabox.js"></script>
<script src="common/application/js/layer.js" type="text/javascript"></script>
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
    .moreout{width: 100%}
    .moreout .more{width: 120px}
</style>
</head>
<body id="photo">
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
    <a><img src="common/application/images/banner.jpg"></a>
</div>
<div id="main" role="main" class="main">
    <div class="hidden" style="display: none;">
    <?php for($i=0;$i<count($picture);$i++){ ?>
        <li>
        <a href="uadmin/user/album/<?php echo $picture[$i]['img'] ?>" rel="lightbox[ostec]" title="<?php echo $picture[$i]['title'] ?>">
        <img src="uadmin/user/album/1px.gif" realSrc="uadmin/user/album/<?php echo $picture[$i]['img'] ?>" style="height:100px" alt=""/>
        </a>
        </li>
    <?php } ?>
    </div>
    <ul id="Gallery" class="gallery" style="text-align: center;">数据加载中，请稍后...</ul>
    
</div>
<a href="javascript:;" onClick="main.loadMore();" class="more">加载更多</a>

<a class="footer"><span class="top">返回顶部</span></a>
    <script src="common/application/js/jquery.imagesloaded.js" type="text/javascript"></script>
    <script>
        var _content = []; //临时存储li循环内容
        var main = {
            _default:8, //默认显示图片个数
            _loading:4,  //每次点击按钮后加载的个数
            init:function(){
                var lis = $(".main .hidden li");

                $(".main ul.gallery").html("");
                for(var n=0;n<main._default;n++){
                    lis.eq(n).appendTo(".main ul.gallery");
                }
                $(".main ul.gallery img").each(function(){
                    $(this).attr('src',$(this).attr('realSrc'));
                })
                for(var i=main._default;i<lis.length;i++){
                    _content.push(lis.eq(i));
                }

                $(".main .hidden").html("");
                
                var links = $$("a").filter(function(el) {
                    return el.rel && el.rel.test(/^lightbox/i);
                  });
                main.gallery(links);
            },
            loadMore:function(){
                
                var mLis = $(".main ul.gallery li").length;
                for(var i =0;i<main._loading;i++){
                    var target = _content.shift();
                    if(!target){
                        $('.more').html("<p>全部加载完毕...</p>");
                        break;
                    }
                    $(".main ul.gallery").append(target);
                    $(".main ul.gallery img").eq(mLis+i).each(function(){
                        $(this).attr('src',$(this).attr('realSrc'));
                    });
                }
                var links = $$("a").filter(function(el) {
                    return el.rel && el.rel.test(/^lightbox/i);
                  });
                
                main.gallery(links);
            },
            gallery:function(links){

                $('#Gallery').imagesLoaded(function() {
                    // Prepare layout options.
                    var options = {
                        autoResize: true, // This will auto-update the layout when the browser window is resized.
                        container: $('#main'), // Optional, used for some extra CSS styling
                        offset: 4, // Optional, the distance between grid items
                        itemWidth: 150 // Optional, the width of a grid item
                    };
                    // Get a reference to your grid items.
                    var handler = $('#Gallery li');
                    // Call the layout function.
                    handler.wookmark(options);
                });
                Mediabox.scanPage = function() {
                  
                  $$(links).mediabox({/* Put custom options here */}, null, function(el) {
                    var rel0 = this.rel.replace(/[[]|]/gi," ");
                    var relsize = rel0.split(" ");
                    return (this == el) || ((this.rel.length > 8) && el.rel.match(relsize[1]));
                  });
                };
                window.addEvent("domready", Mediabox.scanPage);
            }
        }
        main.init();

    </script>
    <script>
        $(".footer").click(function() {
            jQuery("html,body").animate({
                scrollTop: 0
            }, 500, function() {});
        });
    </script>
    <!--下面是瀑布流js-->
<!--     <script type="text/javascript">
            // (function ($){
            //     $('.gallery').imagesLoaded(function() {
            //         // Prepare layout options.
            //         var options = {
            //             autoResize: true, // This will auto-update the layout when the browser window is resized.
            //             container: $('.main'), // Optional, used for some extra CSS styling
            //             offset: 4, // Optional, the distance between grid items
            //             itemWidth: 150 // Optional, the width of a grid item
            //         };
            //         // Get a reference to your grid items.
            //         var handler = $('.gallery li');
            //         // Call the layout function.
            //         handler.wookmark(options);
            //     });
            // })(jQuery);

    </script> -->
<?php $this->load->view('footer') ?>