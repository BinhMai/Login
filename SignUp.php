<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<style>
 
 .myErrors {
	color: red;
	font-size: 20px;
	font-family: "Times New Roman";
	margin-left: 30px;
 }
 #feedback{
	 color: red;
	 font-family: "Times New Roman";
	 font-size: 20px;
	 margin-left: 45px;
 }
 
</style> 
<script
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"
 type="text/javascript"></script>
<script
 src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
 type="text/javascript"></script>
<script
 src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"
 type="text/javascript"></script>
<script src="/resources/scripts/mysamplecode.js" type="text/javascript"></script>
<script src="/resources/scripts/date.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('#feedback').load('CheckUser.php').show();
	
	$('#nameAcc').keyup(function(){
		$.post('CheckUser.php',{username: signup.nameAcc.value},
		function(result){
			$.validator.addMethod("errorUser", 
				function(value, element) { 
					if(result != "success")
						return true;
					return false;
				},
				" Please City Option"
			); 
		});
	});
	
	jQuery.validator.setDefaults({
		errorPlacement: function(error, element) {
			error.appendTo(element.parent().find('div.myErrors'));
		}
	});
	
	
	 $("#signup").validate({
		rules: {
			nameAcc: {
				required: true,
				errorUser: true
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
				nameAcc:{
					errorUser: "Tài khoản đã tồn tại"
				},
				pass: {
					minlength: "Mật Khẩu phải dài hơn 6 kí tự"
				},
				repass: {
					minlength: "Mật khẩu phải dài hơn 6 kí tự",
					equalTo: "Hai mật khẩu phải trùng nhau"
				},
			}
		});
	});
</script>
<body>
	<div class="col-md-5" style="margin-left: 400px;margin-top: 150px; background-color: #f7f8fa;">
		<span class="text-center"><h3>Đăng Ký Tài Khoản</h3></span>
		<hr style="margin-bottom: 10px;margin-left: 20px;margin-right: 20px;"></hr>
		<form id="signup" name="signup" method="POST" action="CofirmSignUp.php">
			<div class="col-md-12">
				<input class="col-md-10" id="nameAcc" style="margin-left:30px; margin-top: 20px; padding: 15px" type="text" name="nameAcc"  placeholder="Email or Username"/>
				<div class="myErrors"></div>
			</div>
			<div id="feedback"></div>
			<div class="col-md-12">
				<input class="col-md-10" id="pass"style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="pass" placeholder="Password">
				<div class="myErrors"></div>
			</div>
			<div class="col-md-12">
				<input class="col-md-10" id="repass" style="margin-left:30px; margin-top: 20px; padding: 15px" type="password" name="repass" placeholder="Recofirm Password">
				<div class="myErrors"></div>
			</div>
			<input class="col-md-10 btn btn-danger" style="margin:20px 40px 40px 30px; padding: 15px" id="processForm" type="submit" value="Đăng Ký" />
		</form>
	</div>
</body>
</html>