<?php
	
	$conn = mysqli_connect('localhost','root','','pod');
	$order_id = $_REQUEST['id'];
	$delete = mysqli_query($conn, "DELETE FROM order WHERE order_id = '$order_id'");
	
	if($delete){
		echo "<script>alert('Data Deleted')</script>";
	}

?>