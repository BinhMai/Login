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
	$sql = "SELECT * FROM account";
	$result = $conn->query($sql);

	$check = false;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["name"] == $ac && $row["password"] == $pss)
				$check=true;
		}
	} else {
		echo "Xin kiểm tra lại cơ sở dữ liệu";
	}
	
	if($check == true)
		echo "<h4>Xin Chao :</h4>".$ac;
	else
		echo "User not found";
	$conn->close();
?>
</body>
</html>