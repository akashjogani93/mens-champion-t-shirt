<?php
	
	$conn = mysqli_connect('localhost','root','','project');
	$admin_id = $_REQUEST['id'];
	$delete = mysqli_query($conn, "DELETE FROM admin WHERE admin_id = '$admin_id'");
	
	if($delete){
		echo "<script>alert('Data Deleted')</script>";
	}

?>
