<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>

<?php 
	require ('DB_Manager.php');
	$DB = new DB_Manager();
	
	$dataSearch = $DB->get_list('account','*','name',$_GET['search']);
	$dataFriend = $DB->get_list('account','*','name',$_COOKIE['acc']);
	
	$listname = "'".$dataFriend[0]['friends']."'";
	$name = $_GET['search'];
?>

<body style="background-color: #e9ebee";z-index: 1>
<div class="col-md-12" style=" padding: 0px;">
	<div class="col-md-12" name="header" style="background-color: #4267b2; padding: 10px;"; z-index: 2>
		<?php include('header.php')?>
	</div>
	<div class="col-md-12" style="margin-top: 20px;">
		<div class="col-md-3" name="menu">
		</div>
		<div class="col-md-6" name="content">
			<?php
				if($dataSearch != null){
					for($i=0;$i<count($dataSearch);$i++){?>
						<form class="col-md-12" id="addfriend" method="POST" style="margin-top: 30px; padding: 10px; background-color: white">
							<img class="col-md-3" src="/img/<?php echo $dataSearch[$i]['avatar'] != '' ? $dataSearch[$i]['avatar'] : "black.png";?>" style="padding: 10px "height="150" width="50" />
							<div class="col-md-9" style="margin-top: 20px">
								<input style="color: #4267b2; font-size: 25px; border: none" type="text" name="result" value="<?php echo $dataSearch[$i]['name'];?>" />
								</br>
								<span style="font-size: 15px; margin-top: 5px"><?php echo  $dataSearch[$i]['diachi']."/".$dataSearch[$i]['sdt'];?></span>
								</br>
								<?php
									if (strpos($listname, $name) !== false) 
										echo '<input class="col-md-3 btn btn-danger" type="submit" name="unfriend" style="margin-top: 20px;float: right" value="Hủy kết bạn">';
									else
										echo '<input class="col-md-3 btn btn-danger" type="submit" name="addfriend" style="margin-top: 20px;float: right" value="Thêm bạn bè">';
								?>
							</div>
						</form>
						
					<?php
					}
				}else{
					echo '<form style="margin-top: 30px"><button class="col-md-12 btn btn-warning" type="button">Không có kết quả nào !!!</button></form>';
				}
			?>
		</div>
		<div class="col-md-3" style="padding: 0px">
			<?php include('right-content.php')?>
		</div>
	</div>
</div>
<script type="text/javascript" >
$(document).ready(function() {	
	 $("#addfriend").validate({
		submitHandler: submitFormAddFriend
	});
	function submitFormAddFriend(){
        var data = $("#addfriend").serialize();
        $.ajax({
            type : 'POST',
            url  : 'addfriend.php',
            data : data,
            success:  function(data)
            {
				window.location="http://binhmai.com/trangchu.php";
            }
        });
        return false;
	}
});
</script>