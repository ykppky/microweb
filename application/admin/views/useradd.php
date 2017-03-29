<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>user添加</title>
<style>
body, input, select, button, h1 {
	font-size: 28px;
	line-height:1.7;
}
</style>	
</head>

<body>
<h1>新建用户</h1>
<label>请输入昵称：</label>
<input type="text" id="nickname" /><br>
<label>请输如电话：</label>
<input type="text" id="phone" /><br>
<label>请输入email：</label>
<input type="text" id="email" /><br>
<label>请输入账号：</label>
<input type="text" id="account" /><br>
<label>请输入密码：</label>
<input type="text" id="password" /><br>
<button id="save" >保存</button>
<p id="createResult"></p>
<div id="next">
	<a href="Addcontroller/getinfo">下一步</a>
</div>

<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
<script>
$("#next").hide();
$(document).ready(function(){
	$("#save").click(function(){ 
		$.ajax({ 
		    type: "POST", 	
			url: "<?php echo base_url()?>admin.php/Addcontroller/useradd",
			data: {
				nickname: $("#nickname").val(),
				phone: $("#phone").val(),
				email: $("#email").val(),
				account: $("#account").val(), 
				password: $("#password").val()
			},
			dataType: "json",
			success: function(data){

				$("#save").hide();
				if (data.success) { 
					$("#createResult").html(data.msg);
					$("#next").show();
				} else {
					$("#createResult").html("出现错误：" + data.msg );
				}  
			},
			error: function(jqXHR){     
			   alert("xmlhttp.status:" + jqXHR.status + "/xmlhttp.readyState:" + jqXHR.readyState);  
			},     
		});
	});
});

</script>
</body>
</html>