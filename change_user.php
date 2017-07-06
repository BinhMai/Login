<?php
	if(isset($_GET['user'])){
		$data = $DB->get_list('account','*','name',$_GET['user']);
	}else{
		$data = $DB->get_list('account','*','name',$_POST['acc']);
	}
?>
<form class="col-md-12" style="background-color: white" method="POST" enctype="multipart/form-data" action="TrangChu.php">
	<?php 
		if(!isset($_GET['user']) || $_GET['user'] == $_COOKIE['acc'])
			echo '<div class="col-md-12" style="padding: 0px">
					<label class="col-md-6; text-left"style="margin-top: 20px;padding-top: 5px; color: #4267b2;">Thay đổi ảnh đại diện :</label>
					<input class="col-md-12 btn btn-success" style="margin-left: 10px" type="file" name="image" />
				</div>';
	?>
	<div class="col-md-12" style="padding: 0px; margin-top: 20px">
		<label class="col-md-5" style="padding-top: 5px; color: #4267b2;">Họ Và Tên&nbsp:</label>
		<input class="col-md-7 text-left"style="padding-top: 5px;border: none" type="text" name="hoten"value="<?php echo $data[0]['hoten']==''? "Not Value" : $data[0]['hoten']?>" />
	</div>
	
	<div class="col-md-12" style="padding: 0px;margin-top: 10px">
		<label class="col-md-5" style="padding-top: 5px; color: #4267b2;float: left">Địa chỉ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
		<input class="col-md-7 text-left"style="margin-top: 5px;border: none" type="text" name="diachi" value="<?php echo $data[0]['diachi']== ''? "Not Value" : $data[0]['diachi']?>" />
	</div>
	
	<div class="col-md-12" style="padding: 0px;margin-top: 20px">
		<label class="col-md-5" style="padding-top: 5px; color: #4267b2;">SĐT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
		<input class="col-md-7 text-left"style="padding-top: 5px;border: none" type="text" name="sdt"value="<?php echo $data[0]['sdt']==''? "Not Value" : $data[0]['sdt']?>" />
	</div>
	<div class="col-md-12" style="margin-bottom: 30px;margin-top: 20px">
		<?php if(!isset($_GET['user']) || $_GET['user'] == $_COOKIE['acc'])
			echo '<button type="submit" class="col-md-4 btn btn-success" style="float: right">Cập Nhật</button>';
			//$DB->update('account', array('hoten'=>"Nguyễn Văn Nam",'diachi'=>"VietNam"),'name',$_COOKIE['acc']);
		?>
	</div>
</form>