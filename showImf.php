<html>
<body>
<?php 	
	
	echo	$cookie_name = $_COOKIE["acc"]; 
	echo	$cookie_pass = $_COOKIE["pass"]; 
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "qlnhanvien";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM `account` WHERE name ='$cookie_name' && password = '$cookie_pass';";
	$result = $conn->query($sql);
	
	if ($result->num_rows == 0) {
		echo "user not found";
	} else {
		echo "<h4>Xin Chao :</h4>".$cookie_name;
		setcookie('acc', $cookie_name, time() + (86400 * 3), "/");
		setcookie('pass',$cookie_pass, time() + (86400 * 3), "/");
	}
	$conn->close();
?>
</body>
</html>