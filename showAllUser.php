<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
	table, th, td {
		border: 1px solid black;
		padding: 5px;
	}
</style>
<body>
<div>	
<table>
	<tr>
		<th>ID</th>
		<th>User</th>
		<th>Password</th>
	</tr>
	<?php
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

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["password"]."</td>";
				echo "</tr>";
			}
		} 
		$conn->close();
	?> 
</table>
</div>
</body>
</html>