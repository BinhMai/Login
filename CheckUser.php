<?php 
	if(isset($_POST['username'])){
		$cookie_name = $_POST['username'];
		
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
		$sql = "SELECT * FROM `account` WHERE name ='$cookie_name';";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0){
			echo "success";
		}
		$conn->close();
	}
?>