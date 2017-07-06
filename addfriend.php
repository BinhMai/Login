<?php 
	$name = $_POST['result'];
	$user = $_COOKIE['acc'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "qlnhanvien";
	$ten = ",".'"'.$name.'"';
	$ten2 = (string)$name;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql= ("SELECT * FROM `account` WHERE name = $user;");
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()){
			if(isset($_POST['addfriend'])){
				if($row['friends'] != ""){
					$listFr = $row['friends'].$ten;
				}else{
					$listFr = $ten2;
				}
				$conn->query("UPDATE `qlnhanvien`.`account` SET `friends` = '$listFr' WHERE `account`.`name` = $user;");
			}else{
				$listname = (string)"'".$row['friends']."'";
				$listFr = str_replace($ten2,"",$listname);
				$conn->query("UPDATE `qlnhanvien`.`account` SET `friends` = $listFr WHERE `account`.`name` = $user");
			}
		}
	}
	$conn->close();
?>