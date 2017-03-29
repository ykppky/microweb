
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo base_url() ?>"/>
</head>
<body>
	<form action="index.php/welcome/improveUserInfo" method="post" id="form">
	<table>
		<tr></tr>
		<tr>
    	<td style="width: 100px"><label>真实姓名：</label></td>
    	<td><input type='text' name="truename" id="truename" style="height: 20px;width: 120px"></td>
  		</tr>
  		<tr>
    	<td><label>年级专业：</label></td>
    	<td><input type='text' name="specialties" id="specialties" style="height: 20px;width: 120px"></td>
  		</tr>
  		<tr>
    	<td colspan="2"><em style="color: red">格式：年级+专业</em>（如：13网工）</td>
  		</tr>
  		<tr>
    	<td><em style="color: red">*</em><label>微信号：</label></td>
    	<td><input type='text' name='wxaccount' id="wxaccount" style="height: 20px;width: 120px"></td>
  		</tr>
  		<tr><input name="openid" id="openid"  type="hidden" value="<?php echo $openid?>"></tr>
  		<tr></tr>
   		<tr>
    	<td colspan="2"><center><input type='button' value="提交" id="button" style="height: 30px;width: 60px"></center></td>
  		</tr>
  		<tr>
    	<td colspan="2"><em style="color: red">*</em>为必填内容！</td>
  		</tr>
	</table>
</body>
</html>
<script src="common/application/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$('#button').on('click', function () {

		var truename = $('#truename').val();
		var specialties = $('#specialties').val();
		var wxaccount = $('#wxaccount').val();

		if(truename){
			var patt = new RegExp(/^[\u4e00-\u9fa5]{2,10}$/); //姓名正则匹配
  			var ret_test = patt.test(truename);

  			if(!ret_test){
  				alert('请输入有效的真实姓名！');
				return false;
			}
		}

		if( !specialties ){
			alert('请完善您的个人信息！');
			return false;
		}else{
			var patt = new RegExp(/^[0][0-9][\u4e00-\u9fa5]{2,10}$/); //
  			var ret_test = patt.test(specialties);
  			if(!ret_test){
  				var patt = new RegExp(/^[1][0-6][\u4e00-\u9fa5]{2,10}$/); //
  				var ret_test = patt.test(specialties);
  				if(!ret_test)
  				{
  			  				alert('请输入正确的格式！');
  							return false;
  				}
  			}

		}

		if( !wxaccount ){
			alert('请完善您的个人信息！');
			return false;
		}


		$('#form').submit();
	});
</script>