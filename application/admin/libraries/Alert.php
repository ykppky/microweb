<?php
/*
 * Created on 2014-3-15
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Alert{

	public function func($word,$url)
	{
?>
	<html>
		<head>
		<title>
		</title>
		<script language='javascript' type='text/javascript'>
		window.alert("<?php echo $word?>");
		setTimeout(window.location.href='<?php echo $url?>',3);
		</script>
		</head>
		</body>
	</html>
<?php
	}
 }
?>