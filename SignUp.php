<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
	<div class="col-md-5" style="margin-left: 400px;margin-top: 150px; background-color: #f7f8fa;">
		<span class="text-center"><h3>Đăng Ký Tài Khoản</h3></span>
		<hr style="margin-bottom: 10px;margin-left: 20px;margin-right: 20px;"></hr>
		<form action="CofirmSignUp.php" method="post">
			<div class="col-md-12">
				<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="text" name="acc" placeholder="Email or Username">
			</div>
			<div class="col-md-12">
				<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="pass" placeholder="Password">
			</div>
			<div class="col-md-12">
				<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="repass" placeholder="Recofirm Password">
			</div>
			<button type="submit" class="col-md-10 btn btn-danger" style="margin:20px 40px 40px 30px; padding: 15px" >Đăng Ký</button>
		</form>
	</div>
</body>
</html>