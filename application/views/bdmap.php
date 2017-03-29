<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo base_url() ?>"/>
	<script src="common/application/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="common/application/js/bdMap.js" type="text/javascript"></script>
</head>

<body>
<div id="map" style="height:570px;width:100%;"></div>
<input type="hidden" value="<?php echo $address; ?>" id="address">
<input type="hidden" value="<?php echo $name; ?>" id="name">
<input type="hidden" value="<?php echo $phone; ?>" id="phone">	
</body>
</html>
<script>
	$(function() {
		var address = $('#address').val();
		var name = $('#name').val();
		var phone = $('#phone').val();
		ShowMap("map",{city:'福清市',addr:address,title:"（昌檀楼）"+name,lawfirm:name,tel:phone,pic:'http://1.ykppky.applinzi.com/uadmin/user/ads/20160915161125.jpg',ismove:'0'});
	})
</script>