<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php 
	$data = $DB->get_list('account','*','name',$_COOKIE['acc']);
?>

<script type="text/javascript">
	function dangxuat(){
		document.cookie = "pass=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		window.location="http://binhmai.com";
	};
</script>

<script type="text/javascript">
	//window.location = '<?php //echo "http://binhmai.com/search.php?search=".'"'.$_POST['search'].'"'?>//';
</script>

<div class="col-md-1" style="padding-right: 0px">
<!--<?php echo '<a href="profile.php?user='.$_COOKIE['acc'].'"><img src="/img/fb.png" style="float: right;" height="35" width="35" /></a>';?>-->
<a href="http://binhmai.com/trangchu.php"><img src="/img/fb.png" style="float: right;" height="35" width="35" /></a>
</div>
<form class="col-md-5" id="search" method="POST">
	<input class="col-md-10" style="padding: 5px;border-radius: 5px" type="text" name="search" placeholder="Tìm kiếm trên Facebook">
	<button type="submit" class="col-md-1 btn btn-default" style="border-radius: 5px;">
		<span class="glyphicon glyphicon-search"></span>
	</button>
</form>
<div class="col-md-2" style="padding: 0px">
	<span class="col-md-9" style="color: white; padding: 5px;font-family: arial;font-size: 15px; float: right">
		<img src="/img/<?php echo $data[0]['avatar']=="" ? "black.png" : $data[0]['avatar'];?>" height="30" width="30"/>
		<a href='<?php echo 'http://binhmai.com/profile.php?user='.$_COOKIE['acc']?>'>
			<span style="color: white; font-size:18px; margin-left: 10px;">
				<?php echo $data[0]['name']?>
			</span>
		</a>
	</span>
</div>
<span class="col-md-1" style="color: white; padding: 5px;font-family: arial;font-size: 15px">
	<a href="http://binhmai.com/trangchu.php"><span style="color: white; font-size: 18px">Trang Chủ</span></a>
</span>
<button type="button" class="col-md-1 btn btn-warning" style="padding: 5px;margin-top: 5px; margin-left: 150px" onclick="dangxuat()">Đăng Xuất</button>