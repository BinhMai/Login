<?php 
	//$name = $_POST['result'];
	$user = "binhmai";
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "qlnhanvien";
	
	//$ten = ",".'"'.$name.'"';
	echo $ten2 = ",".$_COOKIE['search'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql= ("SELECT * FROM `account` WHERE name = 'binhmai'");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()){			
			echo $listname = "'".$row['friends']."'"."<br>";
			echo $listFr = str_replace($ten2,"",$listname);
			//$conn->query("UPDATE `qlnhanvien`.`account` SET `friends` = $listFr WHERE `account`.`name` = 'binhmai'");
		}
	}
	$conn->close();
?>