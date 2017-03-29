<?php $this->load->view('header') ?>
  <div class="qiandaobanner" style="margin-top :46px">
    <img src="common/application/images/email.jpg"/>
  </div>

<div class="cardexplain">
  <!--提示框-->
  <div class="window" id="windowcenter" style="z-index:100">
    <div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
    <div class="content">
        <div id="txt"></div>
    </div>
  </div>
  <div class="history">
      <div class="history-date">
        <ul>
          <a><h2 class="first first1" style="position: relative;" id="closel">请点击留言</h2></a>
          <li  class="green bounceInDown nob ly1" style="display:none" >
            <!--  <dl>
              <dt><input name="wxname"  type="text" class="px" id="wxname1" value=""  placeholder="请输入您的昵称"></dt>
              <dt><textarea name="info" class="pxtextarea" style=" height:60px;"  id="info1"  placeholder="请输入留言" ></textarea></dt>
              <dt><a id="showcard1"  class="submit" >提交留言</a></dt>
            </dl>
            -->
            
            <dl class="clearfix">
            <dt><input name="name" class="px" type="text" id="Guest_Name"   placeholder="请输入您的姓名" style="margin: 10px 0;"/></dt>
            <dt><input name="phone" class="px" type="text" id="Guest_Phone"  placeholder="请输入您的号码" style="margin: 10px 0;"/></dt>
            <dt><input name="email" class="px" type="text" id="Guest_Email"  placeholder="请输入您的邮箱" style="margin: 10px 0;"/></dt>
            <dt><!-- <input name="specialty" class="px" type="text" id="Guest_Specialty"   placeholder="请输入您的专业" style="margin: 10px 0;"/> -->
                <select name="specialty" class="px" id="Guest_Specialty" style="margin: 10px 0;">
                  <option value="请选择">请选择</option>
                  <?php foreach ($specialty as $key => $value) {?> 
                  <option value="<?php echo $value['title'] ?>"><?php echo $value['title'] ?></option>
                  <?php } ?>
                </select>
            </dt>

            <dt><textarea name="content"  class="pxtextarea" style=" height:60px;"  id="info1"  placeholder="请输入留言" ></textarea></dt>
            
            
<!--             <dt>
              <input name="checkcode" class="px" type="text" id="checkcode" name="checkcode" placeholder="请输入验证码" style="margin: 10px 0;" maxlength="4" autocomplete="off"/>
              <img id="codeimg" src="<?php //echo base_url()?>index.php/imgcode" onclick="javascript:this.src='<?php echo base_url()?>index.php/imgcode?tm='+Math.random();"/>
             <a href="javascript:void(0);" class="login-code-change" onclick="javascript:this.src='<?php echo base_url()?>index.php/imgcode?tm='+Math.random();">换一张</a>
            </dt> -->
            <dt><a id="showcard1"  class="submit">提交留言</a></dt>
          </dl>

            
          </li>
        </ul>
      </div>
  </div>
  <div class="plugback">
    <a href="javascript:history.back(-1)">
      <div class="plugbg themeStyle" style="bottom: 70px">
      <span class="plugback"></span>
      </div>
    </a>
  </div>
</div>
<script>

      $(document).on("click","#showcard1",function(){
          // var check = $("#check").val();
          var wecha_id = $("#wecha_id").val();
          var token = $("#token").val();
          var btn = $(this);
        var Guest_Name = $("#Guest_Name").val();
        if (Guest_Name  == '') {
          alert("请输入姓名");
          return
        }else{
          var patt = new RegExp(/^[\u4e00-\u9fa5]{2,20}$/); //姓名正则匹配
          var ret_test = patt.test(Guest_Name);
          if(!ret_test) {
            alert("请输入有效的姓名");
            return;
          }
        }

        var Guest_Phone = $("#Guest_Phone").val();
        if (Guest_Phone  == '') {
          alert("请输入号码");
          return
        }else{
          var patt = new RegExp(/^1\d{10}$/); //手机号码正则匹配
          var ret_test = patt.test(Guest_Phone);
          if(!ret_test) {
            alert("请输入有效的号码");
            return;
          }
        }

        var Guest_Email = $("#Guest_Email").val();
        if (Guest_Email  == '') {
          alert("请输入邮箱");
          return
        }else{
          var patt = new RegExp(/[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,5}\.[a-zA-Z0-9]{1,5}/); //姓名正则匹配
          var ret_test = patt.test(Guest_Email);
          if(!ret_test) {
            alert("请输入有效的邮箱");
            return;
          }          
        }
        
        var Guest_Specialty = $("#Guest_Specialty").val();
        if (Guest_Specialty  == '请选择') {
          alert("请选择专业");
          return
        }

        var info = $("#info1").val();
        if (info == '') {
          alert("请输入内容");
          return
        }

        // var checkcode = $("#checkcode").val();
        // if (checkcode == '') {
        //   alert("请输入验证码");
        //   return
        // }
        var url = "index.php/welcome/msg";
        $.ajax({
          type: 'POST',
          url: url,
          data: {
            name: Guest_Name,
            phone: Guest_Phone,
            email: Guest_Email,
            specialty: Guest_Specialty,
            content: info,
          },
          dataType: 'json',
          success: function(data){
            alert(data.msg); 
            document.location.reload();
          }

        });

      });

      // function alert(title){
      //     var showTime = arguments[1] ? arguments[1] : 1000;
      //     $("#windowcenter").slideToggle("slow");
      //     $("#txt").html(title);
      //     setTimeout('$("#windowcenter").slideUp(500)',showTime);
      // }
      $(document).ready(function(){
        $(".first1").click(function(){
        $(".ly1").slideToggle();
        });
      });

</script>
<?php $this->load->view('footer') ?>