<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
	<div class="col-md-6" style="margin-left: 300px;margin-top: 150px; background-color: yellow">
		<span class="text-center"><h1>Đăng Nhập Hệ Thống</h1></span>
		<form action="showImf.php" method="post">
			<div class="col-md-12">
				<span class="col-md-4" style="padding-right:0px"><h3>Tên Tài Khoản:</h3></span>
				<input class="col-md-6" style="padding-left:0px; margin-top: 20px" type="text" name="acount">
			</div>
			<div class="col-md-12">
				<span class="col-md-4" style="padding-right:0px"><h3>Mật Khẩu:</h3></span>
				<input class="col-md-6" style="padding-left:0px; margin-top: 20px" type="text" name="password">
			</div>
			<button type="submit" class="col-md-3 btn btn-primary" style="margin-left: 30px; margin-bottom: 20px" >Đăng Nhập</button>
		</form>
	</div>
	<?php
		function login(){
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
			$sql = "SELECT * FROM person";
			$result = $conn->query($sql);

			echo '<h1>Hello A.N.L.A.B</h1>';
			if ($result->num_rows > 0) {
				// output data of each row
				echo "MaNV:________Name:________Adress:________PhoneNumber</br>";
				while($row = $result->fetch_assoc()) {
					echo $row["maNV"]. "_____________".$row["nameNV"]. "_________".$row["adrress"]. "______".$row["phoneNumber"]. "<br>";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		}
	?>
</html>