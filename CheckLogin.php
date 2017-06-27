<?php 
	if(isset($_POST['acclogin'])){
		$name = $_POST['acclogin'];
		$pass = $_POST["passlogin"]; 
		
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
		$sql = "SELECT * FROM `account` WHERE name ='$name'&& password='$pass';";
		$result = $conn->query($sql);
		
		if ($result->num_rows == 0){
			echo "failed";
		}else{
			echo "success";
			setcookie('acc', $name, time() + (86400 * 3), "/");
			setcookie('pass', $pass, time() + (86400 * 3), "/");
		}
		$conn->close();
	}
?>