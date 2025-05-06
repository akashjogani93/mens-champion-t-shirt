<?php
include("../nav.php");
$conn = mysqli_connect('localhost','root','','project');

if(isset($_POST['add'])){
	$name = $_POST['name'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];
	$file_name = $_FILES["file"]["name"];
	$temp_name = $_FILES["file"]["tmp_name"];
	$folder = "uploads/" . $file_name;
	if(move_uploaded_file($temp_name, $folder)) {
		$insert = mysqli_query($conn, "INSERT INTO product (product_name, product_category, product_description, amount, file) VALUES ('$name', '$category', '$description', '$amount', '$folder')");

		if($insert){
			// echo "Product added successfully with image.";
			echo "<script>alert('Product Category Added'); window.location='read.php';</script>";
		} else {
			echo "Database insert failed.";
		}
	} else {
		echo "Image upload failed.";
	}
}
?>

<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body> -->
  <div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-2">
				<a href="read.php" class="btn btn-warning">View Product Category</a>
			</div>
		</div>
		</br>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form method="post" enctype="multipart/form-data">
	<div class="mb-3">
		<label class="form-label">Name</label>
		<input type="text" name="name" class="form-control" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Category</label>
		<input type="text" name="category" class="form-control" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Description</label>
		<input type="text" name="description" class="form-control" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Add Product Image</label>
		<input type="file" name="file" class="form-control" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Amount</label>
		<input type="text" name="amount" class="form-control">
	</div>
	<input type="submit" name="add" class="btn btn-primary" value="Submit">
</form>

			<div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>