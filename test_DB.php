<?php 
	require ('DB_Manager.php');

	$DB = new DB_Manager();

	//$data2 = $DB->get_column('friends','account','name','binh');
	//$data = $DB-> get_listIn('account','name',$data2['friends']);
	//print_r($data);
	//foreach ($data as $value){
		//foreach ($value as $value2){
			//echo $value2.'<br>';
		//}
	//}
	//echo $data[1]['name'];

	$friend_column = $DB->get_column('friends','account','name',$_COOKIE['acc']);
	echo $friend_column['friends'];
	
	if($friend_column != null)
		$data = $DB-> get_listIn('status','count(id_status)','user_status',$friend_column['friends']);
	print_r($data);
	
?>