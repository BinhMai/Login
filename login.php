<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
	<?php 
		if(!isset($_COOKIE['acc']) && !isset($_COOKIE['pass'])) {
			include('dangnhap.php');exit;
		} else {
			include('showImf.php');exit;
		}
	?>
</html>