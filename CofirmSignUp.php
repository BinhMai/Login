<html>
<body>
<?php 
	$name = $_POST["nameAcc"]; 
	$pass = $_POST["pass"]; 
	$repass = $_POST["repass"]; 

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
	$sql = "INSERT INTO `account` (`id`, `name`, `password`) VALUES (NULL, '$name','$pass');";

	if ($conn->query($sql) === TRUE) {
		echo "<script type='text/javascript'>alert('Đăng Ký Thành Công');</script>";
		echo "Xin Chào :".$name;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	?>
</body>
</html>