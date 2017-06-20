<html>
<body>
<?php 
	if(isset($_POST["acc"])) {
		$name = $_POST["acc"]; 
		$pass = $_POST["pass"]; 
		$repass = $_POST["repass"]; 
		
		if($_POST["acc"] == ""){
			echo "<script type='text/javascript'>alert('Tên Tài Khoản Không Được Để Trống');</script>";
			include('signup.php');
			exit();
		}else if($pass == '' && $repass == ''){
			echo "<script type='text/javascript'>alert('Mật Khẩu Không Được Để Trống');</script>";
			include('signup.php');
			exit();
		}else if($pass!= $repass){
			echo "<script type='text/javascript'>alert('Hai mật khẩu phải trùng nhau');</script>";
			include('signup.php');
			exit();
		}
		else{
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
		}
	}
	?>
</body>
</html>