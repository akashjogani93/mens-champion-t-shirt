<?php
	
	$conn = mysqli_connect('localhost','root','','project');
	$category_id = $_REQUEST['id'];
	$delete = mysqli_query($conn, "DELETE FROM product_category WHERE category_id = '$category_id'");
	
	if($delete){
		echo "<script>alert('Data Deleted')</script>";
	}

?>