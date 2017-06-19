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
</html>