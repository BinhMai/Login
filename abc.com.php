<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
	<?php 
		echo $_COOKIE['pass'];
		if(!isset($_COOKIE['pass'])) {
			include('welcome.php');exit;
		} else {
			include('trangchu.php');exit;
		}
	?>
</html>