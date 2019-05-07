<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript" >
$(document).ready(function() {	
	jQuery.validator.setDefaults({
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().find('div.myErrors'));
		}
	});
	 $("#signup").validate({
		rules: {
			nameAcc: {
				required: true,
				//errorUser: true
			},
			pass:{
				required: true,
				minlength: 6
			},
			repass:{
				required: true,
				minlength: 6,
				equalTo: "#pass"
			}		
		},
		messages: {
			pass: {
				minlength: "Mật Khẩu phải dài hơn 6 kí tự"
			},
			repass: {
				minlength: "Mật khẩu phải dài hơn 6 kí tự",
				equalTo: "Hai mật khẩu phải trùng nhau"
			},
		},
		submitHandler: submitForm
	});
	function submitForm(){
        var data = $("#signup").serialize();
		$('#error').html(data);
        $.ajax({
            type : 'POST',
            url  : 'CheckUser.php',
            data : data,
            success:  function(data)
            {
                if(data == "already"){
                    $("#error").fadeIn(1000, function(){
                        $("#error").html('<div class="alert alert-danger text-left"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tài Khoản Này Đã Tồn Tại !</div>');
                    });
                }else{
					window.location="http://binhmai.com/trangchu.php";
                }
            }
        });
        return false;
	}
	
	 $("#login").validate({
		rules: {
			acclogin: {
				required: true,
				//errorUser: true
			},
			passlogin:{
				required: true,
			}
		},
		submitHandler: submitFormLogin
	});
	function submitFormLogin(){
        var data = $("#login").serialize();
		$('#errorLogin').html(data);
        $.ajax({
            type : 'POST',
            url  : 'CheckLogin.php',
            data : data,
            success:  function(data)
            {
                if(data == "failed"){
                    $("#errorLogin").fadeIn(1000, function(){
                        $("#errorLogin").html('<div class="alert alert-danger text-left"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Tên tài khoản hoặc mật khẩu không chính xác !</div>');
                    });
                }else{
					window.location="http://binhmai.com/trangchu.php";
                }
            }
        });
        return false;
	}
});
</script>
<style> 
	 .myErrors {
		color: red;
		font-size: 20px;
		font-family: "Times New Roman";
	 }
	 label{
		 margin-right: 240px;
	 }
	table, td {
		border: 1px solid black;
		padding: 15px 40px 15px 40px;
	}
	table{
		margin-left: 50px;
	}
	th{
		border: 1px solid black;
	}
</style> 

<body background="http://binhmai.com/img/go.jpg">
	<div class="col-md-12" style="margin-top: 50px;">
		<div class="col-md-11">
		<!--action="SignUp.php"
			action="login.php"
			type="submit"
		-->
			<form>
				<button type="button" class="col-md-1 btn btn-primary" style="float: right; padding: 10px" data-toggle="modal" data-target="#showUserModal"> ShowUsers</button>
			</form>
			<form>
				<button type="button" class="col-md-1 btn btn-danger" style="float: right; padding: 10px;margin-right: 10px;" data-toggle="modal" data-target="#SignUpModal">Đăng Ký</button>
			</form>
			<form>
				<button type="button" class="col-md-1 btn btn-success" style="float: right; margin-right: 10px;padding: 10px" data-toggle="modal" data-target="#LoginModal">Đăng Nhập</button>
			</form >
		</div>
	</div>
	<div class="modal fade" id="SignUpModal" role="dialog">
		<div class="modal-dialog" style="margin-top: 100px">
			<!-- Modal content-->
			<div class="modal-content"  style="background-color: #f7f8fa;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title text-center">Đăng Ký Tài Khoản</h2>
				</div>
				<div class="modal-footer">
					<div class="col-md-12 form-signin ">
						<form id="signup" name="signup" method="POST">
							<div id="error"></div>
							<div class="col-md-12">
								<input class="col-md-10" id="nameAcc" style="margin-left:30px; padding: 15px" type="text" name="nameAcc"  placeholder="Email or Username"/>
								<div class="myErrors"></div>
							</div>
							<div class="col-md-12">
								<input class="col-md-10" id="pass"style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="pass" placeholder="Password">
								<div class="myErrors"></div>
							</div>
							<div class="col-md-12">
								<input class="col-md-10" id="repass" style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="repass" placeholder="Recofirm Password">
								<div class="myErrors"></div>
							</div>
							<!--<button class="col-md-10 btn btn-danger" style="margin:20px 40px 40px 30px; padding: 15px" id="submit" type="submit">
								<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
							 </button>-->
							 <div class="col-md-12">
								<input class="col-md-10 btn btn-danger" style="margin:20px 40px 40px 30px; padding: 15px" id="processForm" type="submit" value="Đăng Ký" />
							 </div>
						</form>
					</div>
				<div class="hhh" ></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="LoginModal" role="dialog">
		<div class="modal-dialog" style="margin-top: 100px">
			<!-- Modal content-->
			<div class="modal-content"  style="background-color: #f7f8fa;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title text-center">Đăng Nhập Hệ Thống</h2>
				</div>
				<div class="modal-footer">
					<div class="col-md-12">
						<form id="login" method="post" name="login">
							<div id="errorLogin"></div>
							<div class="col-md-12">
								<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="text" name="acclogin" placeholder="Email or Username">
								<div class="myErrors"></div>
							</div>
							<div class="col-md-12">
								<input class="col-md-10" style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="passlogin" placeholder="Password">
								<div class="myErrors"></div>
							</div>
							<div class="col-md-12">
								<input type="submit" class="col-md-10 btn btn-success" style="margin:20px 40px 40px 30px; padding: 15px" value="Đăng Nhập" name="login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="showUserModal" role="dialog">
		<div class="modal-dialog" style="margin-top: 100px">
			<!-- Modal content-->
			<div class="modal-content"  style="background-color: #f7f8fa;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title text-center">Các Tài Khoản Đang Có Trong Hệ Thống</h2>
				</div>
				<div class="modal-footer">
					<table class="text-center">
						<tr>
							<th style="padding: 15px 40px 15px 45px;">ID</th>
							<th style="padding: 15px 40px 15px 80px;">User</th>
							<th style="padding: 15px 40px 15px 60px;">Password</th>
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
			</div>
		</div>
	</div>
</body>
</html>