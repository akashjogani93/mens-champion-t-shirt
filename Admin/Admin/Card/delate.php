<?php
	
	$conn = mysqli_connect('localhost','root','','project');
	$cart_id = $_REQUEST['id'];
	$delete = mysqli_query($conn, "DELETE FROM cart WHERE cart_id = '$cart_id'");
	
	if($delete){
		echo "<script>alert('Data Deleted')</script>";
	}

?>