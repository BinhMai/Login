<html>
<body>
<?php 
	$ac = $_POST["acount"]; 
	$pss = $_POST["password"];
	
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
	$sql = "SELECT * FROM `account` WHERE name ='$ac' && password = '$pss';";
	$result = $conn->query($sql);
	
	if ($result->num_rows == 0) {
		echo "user not found";
	} else {
		echo "<h4>Xin Chao :</h4>".$ac;
	}
	$conn->close();
?>
</body>
</html>