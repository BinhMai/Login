<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js" type="text/javascript"></script>
<?php 
	$friend_column = $DB->get_column('friends','account','name',$_COOKIE['acc']);
	
	if($friend_column['friends'] != "")
		$data = $DB-> get_listIn('status','count(id_status)','user_status',$friend_column['friends']);
	else
		$data = $DB-> get_list('status','count(id_status)','user_status',$_COOKIE['acc']);
	
	$total_records = $data[0]['count(id_status)'];
	
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 5;
	
	$total_page = ceil($total_records / $limit);
	
	if ($current_page > $total_page){
		$current_page = $total_page;
	}
	else if ($current_page < 1){
		$current_page = 1;
	}
	
	$start = ($current_page - 1) * $limit;
	
	if($total_page != 0)
		$data = $DB->get_listStatus('status','user_status',$_COOKIE['acc'], $friend_column['friends'],'order by date DESC, time DESC',$start,$limit);
	else
		$data = null;
?>
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
		messages:{
			contentStt:{
				required: "Nội dung bài đăng không được để trống"
			}
		},
		submitHandler: submitFormPost
	});
	function submitFormPost(){
        var data = $("#postStatus").serialize();
        $.ajax({
            type : 'POST',
            url  : 'postStatus.php',
            data : data,
            success:  function(data)
            {
				$("#contentStt").val("");
				window.location="http://binhmai.com/trangchu.php";
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
</style>
<form class="col-md-12" id="postStatus"  name = "postStatus" style="background-color: white" method="POST">
	<div class="col-md-12"style="border-bottom: solid 1px #e9ebee">
		<div class="col-md-3" style="padding: 10px">
			<button type="button" style="color: #4267b2;border: none ; background-color: white"><span class="glyphicon glyphicon-camera"></span> Ảnh/Video</button>
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
		<textarea class="col-md-12" id="contentStt" style="margin-top: 20px; margin-bottom: 20px;padding: 20px; border: none;word-wrap: break-word" type="text" maxlength= "2000" name="contentStt" placeholder="Bạn đang nghĩ gì?"></textarea>
		<div class="myErrors"></div>
	</div>
	<div class="col-md-12">
		<input class="col-md-2 btn btn-primary" type="submit" style="float:right; padding: 3px; margin: 10px" value="Đăng"/>
	</div>
</form>
<?php
	if ($data != null) {
		for($i=0;$i<count($data);$i++){
			$avatar = $DB->get_list('account','avatar','name','"'.$data[$i]['user_status'].'"');?>
			<div class="col-md-12" style="margin-top: 30px; padding: 10px; background-color: white">
					<div class="col-md-12" style="margin-top: 10px">';
						<img class="col-md-1" src="/img/<?php echo $avatar[0]['avatar'] != '' ? $avatar[0]['avatar'] : "black.png";?>" style="padding: 0px "height="40" width="40" />
						<a href='<?php echo "http://binhmai.com/profile.php?user=".'"'.$data[$i]['user_status'].'"'?>'>
							<span class="col-md-3" style="color: #4267b2; margin-top: 5px;margin-bottom: 20px; font-size: 20px">
								<?php echo $data[$i]['user_status']?>
							</span>
						</a>					
					</div>
					<div class="col-md-12">
						<span class="col-md-12" style="word-wrap: break-word">
							<?php echo $data[$i]['content'];?>
						</span>
					</div>
					<div class="col-md-12" style="margin-bottom: 30px">
						<span style="float: right">
							<?php echo $data[$i]['time']." / ".$data[$i]['date'];?>
					</span>
					</div>
			</div>
		<?php }
	}else{
		echo '<div class="col-md-12" style="margin-top: 30px; pađing: 30px;">';
		echo	'<h3>Không có bài đăng nào để hiển thị</h3>';
		echo '</div>';
	} 
?>
<div class="pagination" style="margin-left: 250px">
<?php 
	// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
	if ($current_page > 1 && $total_page > 1){
		echo '<a href="trangchu.php?page='.($current_page-1).'">Prev</a> | ';
	}
	// Lặp khoảng giữa
	for ($i = 1; $i <= $total_page; $i++){
		// Nếu là trang hiện tại thì hiển thị thẻ span
		// ngược lại hiển thị thẻ a
		if ($i == $current_page){
			echo '<span>'.$i.'</span> | ';
		}
		else{
			echo '<a href="trangchu.php?page='.$i.'">'.$i.'</a> | ';
		}
	}
	// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
	if ($current_page < $total_page && $total_page > 1){
		echo '<a href="trangchu.php?page='.($current_page+1).'">Next</a> | ';
	}
?>
</div>