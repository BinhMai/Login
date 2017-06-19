<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
	<div class="col-md-5" style="margin-left: 400px;margin-top: 150px; background-color: #f7f8fa">
		<span class="text-center"><h3>Đăng Nhập Hệ Thống</h3></span>
		<hr style="margin-bottom: 10px"></hr>
		<form action="showImf.php" method="post">
			<div class="col-md-12">
				<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="text" name="acc" placeholder="Email or Username">
			</div>
			<div class="col-md-12">
				<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="text" name="pass" placeholder="Password">
			</div>
			<button type="submit" class="col-md-10 btn btn-success" style="margin:20px 40px 40px 30px; padding: 15px" >Đăng Nhập</button>
		</form>
	</div>
</html>