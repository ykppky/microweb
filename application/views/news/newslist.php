
<?php $this->load->view('listheader') ?>   
<center style="width: 100%; height: 30px;font-size: 20px;padding-top:10px; "><?php echo $menu ?></center>
<hr/>
<ul class="mainmenu">
    <?php for($i = 0; $i<count($news);$i++ )
            { 
        ?>
    <li><a href="index.php/welcome/getnewscontent/?id=<?php echo $news[$i]['id'] ?>"><em></em>
    <p>
        <span><?php echo $news[$i]['title'] ?></span>
    </p>
    <b></b></a></li>
    <?php 
            }
             ?>
</ul>

<div style="width: 100% ;height: 50px; line-height: 50px">
<?php if($curpage == 1 ){

?>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:left; margin: 15px 14px;line-height: 34px; text-align: center;"><a>上一页</a></div>
    <?php 

        if($curpage != $totalpage ){
     ?>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:right; margin: 15px 16px; line-height: 34px;text-align: center;">
        <a href="index.php/welcome/newslist/catalog/<?php echo ($curpage+1) ?>">下一页</a>
    </div>

    <?php }else{?>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:right; margin: 15px 16px; line-height: 34px;text-align: center;">
        <a>下一页</a>
    </div>
        <?php
        }  
    }elseif( $curpage>1 && $curpage<$totalpage){
         ?>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:left; margin: 15px 14px;line-height: 34px; text-align: center;"><a href="index.php/welcome/newslist/catalog/<?php echo ($curpage-1) ?>">上一页</a></div>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:right; margin: 15px 16px; line-height: 34px;text-align: center;"><a href="index.php/welcome/newslist/catalog/<?php echo ($curpage+1) ?>">下一页</a></div>
    <?php 
        }elseif($curpage == $totalpage){ 
            ?>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:left; margin: 15px 14px;line-height: 34px; text-align: center;"><a href="index.php/welcome/newslist/catalog/<?php echo ($curpage-1) ?>">上一页</a></div>
    <div style="height: 34px;width: 100px; border:1px solid #666 ;float:right; margin: 15px 16px; line-height: 34px;text-align: center;"><a>下一页</a></div>
    <?php 
        }
     ?>
</div>

<div style="width: 100%;height: 30px;margin: -30px auto; font-size: 20px;text-align: center" ><?php echo $curpage."/".$totalpage; ?></div>
<script type="text/javascript" src="common/application/js/common.js"></script>
<script type="text/javascript" src="common/application/js/news.js"></script>
<?php $this->load->view('footer') ?>    