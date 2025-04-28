<?php
	$conn=mysqli_connect('localhost','root','','project');
	
	$product_id = $_REQUEST['id'];
	
	$delete=mysqli_query($conn,"delete from product where product_id = '$product_id'");	
?>