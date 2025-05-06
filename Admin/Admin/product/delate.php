<?php
	$conn=mysqli_connect('localhost','root','','project');
	
	$product_id = $_REQUEST['id'];
	
	$delete=mysqli_query($conn,"delete from product where product_id = '$product_id'");	
	if($delete){
		echo "<script>alert('Product Deleted'); window.location='read.php';</script>";

	}

?>