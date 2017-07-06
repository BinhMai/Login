<?php 
	if(isset($_POST['nameAcc'])){
		$name = $_POST['nameAcc'];
		$pass = $_POST["pass"]; 
		
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
		$sql = "SELECT * FROM `account` WHERE name ='$name';";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0){
			echo "already";
		}else{
			echo "success";
			setcookie('acc', $name, time() + (86400 * 3), "/");
			setcookie('pass', $pass, time() + (86400 * 3), "/");
			$conn->query("INSERT INTO `account` (`id`, `name`, `password`) VALUES (NULL, '$name','$pass');");
		}
		$conn->close();
	}
?>