<?php
	$conn=mysqli_connect('localhost','root','','project');
	
	$user_id = $_REQUEST['user_id'];
	
	$delete=mysqli_query($conn,"delete from users where user_id = '$user_id'");
	

	
?>