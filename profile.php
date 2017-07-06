<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--Hiển thị thông tin cơ bản về User-->
<?php
	require ('DB_Manager.php');
	$DB = new DB_Manager();
	
	if(isset($_GET['user']))
		$dataName = $DB->get_list('account','*','name',$_GET['user']);
	else
		$dataName = $DB->get_list('account','*','name',$_COOKIE['acc']);
?>

<body style="background-color: #e9ebee";z-index: 1>
<div class="col-md-12" style=" padding: 0px;">
	<div class="col-md-12" name="header" style="background-color: #4267b2; padding: 10px;"; z-index: 2>
		<?php include('header.php')?>
	</div>
	<div class="col-md-12" style="margin-top: 20px;padding:0px">
		<div class="col-md-9" name="content" style="padding: 0px">
			<img class="col-md-12" src="/img/<?php echo $dataName[0]['avatar'] != '' ?  $dataName[0]['avatar'] : "black.png";?>" height="550"style="padding: 0px 0px 20px 15px; float: right"/>
			<label style="color: red;font-size: 50px;position: absolute;left: 100px;top: 400px;"><?php echo isset($_GET['user']) ? $_GET['user'] : $_COOKIE["acc"];?></label>
			<div class="col-md-12" style="padding: 0px">
				<div class="col-md-4">
					<?php include('change_user.php')?>
				</div>
				<div class="col-md-8" style="padding: 0px">
					<?php include('profile_post.php')?>
				</div>
			</div>
		</div>
		<div class="col-md-3" style="padding: 0px">
			<?php include('right-content.php')?>
		</div>
	</div>		
	<div class="col-md-12" name="footer">
		<span></span>
	</div>
</div>