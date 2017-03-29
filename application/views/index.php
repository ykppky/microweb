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
				    							echo $ad[$i]['url'].'index.php';
				    						else if($ad[$i]['url']!=''&&$ad[$i]['url']!=null)
				    					 		echo $ad[$i]['url'];
				    				 ?>"
				    		>
				    		<img src="<?php echo 'uadmin/user/ads/'.$ad[$i]['img']?>" width="100%" />
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
<body>
<div id="ui-header">
    <center class="fixed" style="font-size:20px">
        <span><?php echo $baseinfos['name'] ?></span>
    </center>
</div>
<div class="device">
	<div class="content-slide">
		<a href="index.php/welcome/introduce">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/3.png">
			</p>
			<p class="title">
				学院简介
			</p>
		</div>
		</a>
		<a href="index.php/welcome/activitieslist">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/23.png">
			</p>
			<p class="title">
				活动专区
			</p>
		</div>
		</a>
		<a href="index.php/welcome/album">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/2.png">
			</p>
			<p class="title">
				学院一角
			</p>
		</div>
		</a>
		<a href="index.php/welcome/specialtieslist">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/20.png">
			</p>
			<p class="title">
				专业信息
			</p>
		</div>
		</a>
		<a href="index.php/welcome/laoxiang">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/16.png">
			</p>
			<p class="title">
				老乡聚一堂
			</p>
		</div>
		</a>
		<a href="index.php/welcome/morallist">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/6.png">
			</p>
			<p class="title">
				道德天地
			</p>
		</div>
		</a>
		<a href="index.php/welcome/newslist">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/18.png">
			</p>
			<p class="title">
				动态新闻
			</p>
		</div>
		</a>
		<a href="index.php/welcome/opennewslist">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/4.png">
			</p>
			<p class="title">
				通知公告
			</p>
		</div>
		</a>
		<a href="index.php/welcome/msg">
		<div class="mbg">
			<p class="ico">
				<img src="common/application/images/15.png">
			</p>
			<p class="title">
				院长邮箱
			</p>
		</div>
		</a>
	</div>
</div>
<?php $this->load->view('footer') ?>