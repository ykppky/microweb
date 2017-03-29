<?php $this->load->view('header') ?>
    <div class="Listpage">
        <div class="top46"></div>
        <div class="page-bizinfo">
            <div class="header" style="position: relative;">
                <center><h1 id="activity-name"><?php echo $activities['title'] ?></h1></center>
                <span id="post-date">时间：<?php echo $activities['time'] ?></span>
            </div>
            <!-- <div class="showpic"><img src="uploads/e/eydulg1452760971/e/d/4/7/thumb_5698a77f93776.jpg"/></div> -->
            <div class="text" id="content">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $activities['content'] ?>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;（<?php echo $activities['author'] ?>）</p>
            <br />            
            </div>  
            <input type="hidden" id='id' class="id" value="<?php echo $id ?>">
        </div>
        <center><input class="button" value="点击评论" type="button" id="pl" onclick="pinglun(<?php echo $id ?>)"></center>
        <div style="margin: 20px">
            <ul id="list">

            </ul>
            <center id='more'><a href="javascript:void(0);" onclick="pinglunmore()" class="a">查看更多></a></center>
        </div>
        <a class="footer"><span class="top">返回顶部</span></a>
        <script>
            $(".footer").click(function() {
                jQuery("html,body").animate({
                    scrollTop: 0
                }, 500, function() {});
            });
        </script>
        <script>
        function pinglun(id){
        layer.open({
            type: 2,
            title: '评论',
            shadeClose: true,
            shade: 0.3,
            area: ['300px', '160px'],
            content:"index.php/welcome/pinglun?id="+id //iframe的url
        });
        }
        </script>
        <script>
        var count = "";
        var url = "index.php/welcome/getactivitycontent";
        var id = document.getElementById("id").value;
        $(function(){

            count = 6;
            $.ajax({
              type: 'POST',
              url: url,
              data: {
                id: id,
                count: count
              },
              dataType: 'json',
              success: function(data){
                if(data[1]['status'] == 0) $('#more').hide();
                var html = "";
                
                for(var i= 0; i<data[0].length;i++ ){

                    html += "<li><div><img src='"+data[0][i]['headimg']+"' style='width: 40px; height: 40px; border-radius:50%' /><span style='font-size: 16px;font-weight: 5px'>"+data[0][i]['nickname']+":</span>&nbsp&nbsp<span style=' font-size: 14px;display:block; margin-top:5px'>"+data[0][i]['content']+"</span></div><div style='text-align: right; font-size: 12px; margin-top:5px'>"+data[0][i]['sendtime']+"</div></li><hr/>";

                    // document.getElementById("list").innerHTML=html;  
                      
                }
                document.getElementById("list").innerHTML=html;
                // $("#list").html(html);
              }
            });
        })

        function pinglunmore(){
            count = count+5;
            $.ajax({
              type: 'POST',
              url: url,
              data: {
                id: id,
                count: count
              },
              dataType: 'json',
              success: function(data){
                var html = "";
                if(data[1]['status'] == 0) document.getElementById('more').innerHTML = '没有更多了';;
                for(var i= 0; i<data[0].length;i++ ){

                    html += "<li><div><img src='"+data[0][i]['headimg']+"' style='width: 40px; height: 40px; border-radius:50%' /><span style='font-size: 16px;font-weight: 5px'>"+data[0][i]['nickname']+":</span>&nbsp&nbsp<span style=' font-size: 14px;display:block; margin-top:5px'>"+data[0][i]['content']+"</span></div><div style='text-align: right; font-size: 12px; margin-top:5px'>"+data[0][i]['sendtime']+"</div></li><hr/>";

                    // document.getElementById("list").innerHTML=html;  
                      
                }
                document.getElementById("list").innerHTML=html;
                // $("#list").html(html);
              }
            });

        }
        </script>
<?php $this->load->view('footer') ?>    