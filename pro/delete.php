<?php
	$conn=mysqli_connect('localhost','root','','project_db');
	
	$id = $_REQUEST['id'];
	
	$delete=mysqli_query($conn,"delete from category where id = '$id'");
	

	
?>