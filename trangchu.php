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
	 $("#postStatus").validate({
		rules: {
			contentStt: {
				required: true,
			}
		},
		submitHandler: submitFormPost
	});
	function submitFormPost(){
        var data = $("#postStatus").serialize();
        $.ajax({
            type : 'POST',
            url  : 'PostStatus.php',
            data : data,
            success:  function(data)
            {
				$("#contentStt").val("");
            }
        });
        return false;
	}
});
</script>
<script type="text/javascript">
	function dangxuat(){
		window.location="http://localhost/abc/welcome.php";
	}
</script>
<style> 
	 .myErrors {
		color: red;
		font-size: 20px;
		font-family: "Times New Roman";
	 }
</style>
<body style="background-color: #e9ebee";z-index: 1>
<div class="col-md-12" style=" padding: 0px;">
	<div class="col-md-12" name="header" style="background-color: #4267b2; padding: 10px;"; z-index: 2>
		<div class="col-md-1" style="padding-right: 0px">
			<img src="http://localhost/img/fb.png" style="float: right;" height="35" width="35" />
		</div>
		<div class="col-md-6">
			<input class="col-md-10" style="padding: 5px" type="text" name="search" placeholder="Tìm kiếm trên Facebook">
			<button type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</div>
		<span class="col-md-2 text-right" style="color: white; padding: 5px;font-family: arial;font-size: 15px">Hello: <?php echo $_COOKIE['acc']?></span>
		<button type="button" class="col-md-1 btn btn-warning" style="padding: 5px;margin-left: 180px" onclick="dangxuat()">Đăng Xuất</button>
		
	</div>
	<div class="col-md-12" style="margin-top: 20px;">
		<div class="col-md-3" name="menu">
		</div>
		<div class="col-md-6" name="content">
			<form class="col-md-12" id="postStatus"  name = "postStatus" style="background-color: white" method="POST">
				<div class="col-md-12"style="border-bottom: solid 1px #e9ebee">
					<div class="col-md-3" style="padding: 10px">
						<button type="button"style="color: #4267b2;border: none ; background-color: white"><span class="glyphicon glyphicon-camera"></span> Ảnh/Video</button>
					</div>
					<div class="col-md-4"  style="padding: 10px;">
						<button type="button"style="color: #4267b2;border: none ; background-color: white"><span class="glyphicon glyphicon-facetime-video"></span> Video trực tiếp</button>
					</div>
					<div class="col-md-5" style="padding: 10px">
						<button type="button"style="color: #4267b2; border: none; background-color: white"><span class="glyphicon glyphicon-picture"></span> Album ảnh/video</button>
					</div>
				</div>
				<div class="col-md-12" style="border-bottom: solid 1px #e9ebee">
					<div id="error"></div>
					<input class="col-md-12" id="contentStt" style="margin-top: 20px; margin-bottom: 20px;padding: 20px; border: none" type="text" name="contentStt" placeholder="Bạn đang nghĩ gì?"/>
					<div class="myErrors"></div>
				</div>
				<div class="col-md-12">
					<input class="col-md-2 btn btn-primary" type="submit" style="float:right; padding: 3px; margin: 10px" value="Đăng"/>
				</div>
			</form>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "qlnhanvien";
				
				$name = $_COOKIE["acc"];

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT * FROM `status` WHERE user_status = '$name' ORDER by id_status DESC;";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<div class="col-md-12" style="margin-top: 30px; pađing: 10px; background-color: white">';
							echo	'<div class="col-md-12" style="margin-top: 10px">';
								echo	'<img class="col-md-1"src="http://localhost/img/hhhh.jpg" style="padding: 0px "height="40" width="40" />';
								echo	'<span class="col-md-3" style="color: #4267b2; margin-top: 10px;margin-bottom: 20px; font-size: 20px">';
								echo	$row["user_status"];
								echo	'</span>';
								echo '</div>';
								echo '<div class="col-md-12">';
									echo '<span>';
									echo $row["content"];
									echo '</span>';
								echo '</div>';
								echo '<div class="col-md-12" style="margin-bottom: 30px">';
									echo '<span style="float: right">';
										echo $row["time"]." / ".$row["date"];
									echo '</span>';
								echo '</div>';
						echo	'</div>';
					}
				}else{
					echo '<div class="col-md-12" style="margin-top: 30px; pađing: 30px;">';
					echo	'<h3>Không có bài đăng nào để hiển thị</h3>';
					echo '</div>';
				} 
				$conn->close();
			?> 
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<div class="col-md-12" name="footer">
		<span></span>
	</div>
</div>
</body>
</html>