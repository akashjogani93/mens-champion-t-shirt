<?php
	
	$conn = mysqli_connect('localhost','root','','project');
	$payment_id = $_REQUEST['id'];
	$delete = mysqli_query($conn, "DELETE FROM payment WHERE payment_id = '$payment_id'");
	
	if($delete){
		echo "<script>alert('Data Deleted')</script>";
	}

?>