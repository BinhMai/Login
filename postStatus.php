<?php 
	$content = $_POST['contentStt'];
	$user = $_COOKIE['acc'];
	
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
	$conn->query("INSERT INTO `status`(`id_status`, `user_status`, `content`, `time`,`date`) VALUES (NULL,'$user','$content', CURRENT_TIME,CURRENT_DATE);");
	$conn->close();
?>