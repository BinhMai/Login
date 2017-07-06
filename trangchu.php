<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php 
	require ('DB_Manager.php');
	$DB = new DB_Manager();
	
	if(isset($_POST['hoten']) || isset($_POST['diachi']) || isset($_POST['sdt']))
		$DB->update('account', array('hoten'=>$_POST['hoten'],'diachi'=>$_POST['diachi'], 'sdt'=> $_POST['sdt'], 'avatar'=>$_FILES['image']['name']),'name',$_COOKIE['acc']);
?>
<body style="background-color: #e9ebee";z-index: 1>
	<div class="col-md-12" style=" padding: 0px;">
		<div class="col-md-12" name="header" style="background-color: #4267b2; padding: 10px;"; z-index: 2>
			<?php include('header.php')?>
		</div>
		<div class="col-md-12" style="margin-top: 20px;padding:0px">
			<div class="col-md-3" name="menu">
			</div>
			<div class="col-md-6" name="content">
				<?php include('content.php')?>
			</div>
			<div class="col-md-3" style="padding: 0px">
				<?php include('right-content.php')?>
			</div>
		</div>		
		<div class="col-md-12" name="footer">
			<span></span>
		</div>
	</div>
</body>
</html>