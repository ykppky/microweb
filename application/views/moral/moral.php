<?php $this->load->view('header') ?>
    <div class="Listpage">
        <div class="top46"></div>
        <div class="page-bizinfo">
            <div class="header" style="position: relative;">
                <center><h1 id="activity-name"><?php echo $moral['title'] ?></h1></center>
                <span id="post-date">时间：<?php echo $moral['time'] ?></span>
            </div>
            <!-- <div class="showpic"><img src="uploads/e/eydulg1452760971/e/d/4/7/thumb_5698a77f93776.jpg"/></div> -->
            <div class="text" id="content">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $moral['content'] ?>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;（<?php echo $moral['author'] ?>）</p>
            <br />            
            </div>  
        </div>
        <a class="footer"><span class="top">返回顶部</span></a>
        <script>
            $(".footer").click(function() {
                jQuery("html,body").animate({
                    scrollTop: 0
                }, 500, function() {});
            });
        </script>
<?php $this->load->view('footer') ?>    