<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>website_type添加</title>
<style>
body, input, select, button, h1 {
	font-size: 28px;
	line-height:1.7;
}
</style>	
</head>
<?php session_start(); ?>
<body>
<h1>添加website_type</h1>
<label>请输入website_title：</label> 
<input type="text" id="title" /><br>

<input type="hidden" name="" id="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
<input type="hidden" name="" id="project_id" value="<?php echo $_SESSION['project_id'] ?>" />

<label>请选择模板：</label> 
<select id="web">
	<option value="" selected >请选择</option>
<?php
	
	for($i = 0; $i < count($info);$i++){
 ?>

	<option value="<?php echo $info[$i]['website_type']?>"><?php echo $info[$i]['website_type']?></option>

<?php }?>
</select>
<br>
<button id="save" >保存</button>
<p id="createResult"></p>

<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
<script>

$(document).ready(function(){ 
	$("#save").click(function(){ 
		$.ajax({ 
		    type: "POST", 	
			url: "<?php echo base_url()?>admin.php/Addcontroller/websiteadd",
			data: {
				title: $("#title").val(),
				user_id:   $("#user_id").val(),
				project_id:   $("#project_id").val(),
				website: $("#web").val()
			},
			dataType: "json",
			success: function(data){
				$("#save").hide();
				if (data.success) { 
					$("#createResult").html(data.msg);
					
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