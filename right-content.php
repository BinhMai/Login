<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<form class="col-md-8" style="float: right; border: solid 5px white;padding-bottom: 10px">
	<?php
		$friend_column = $DB->get_list('account','friends','name',$_COOKIE['acc']);
		
		if($friend_column[0]['friends'] != ""){
			$datafr = $DB-> get_listIn('account','*','name',$friend_column[0]['friends']);
			for($i=0;$i<count($datafr);$i++){?>
				<div class="col-md-12" style="padding: 0px; margin-top: 10px">
					<img src="/img/<?php echo $datafr[$i]['avatar'] != '' ? $datafr[$i]['avatar'] : "black.png";?>" height="35px" width="35px" />
					<a href='<?php echo "profile.php?user=".'"'.$datafr[$i]['name'].'"'?>'>
						<span style="color: black;font-size: 15px; margin-left: 10px">
							<?php echo $datafr[$i]['name']?>
						</span>
					</a>
				</div><?php
			}
		}else{
			echo '<span>Bạn bè trống</span>';
		}
	?>
</form>