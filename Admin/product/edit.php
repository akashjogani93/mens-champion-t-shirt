<?php 
	$conn = mysqli_connect('localhost','root','','project');
	$product_id = $_REQUEST['id'];
	// echo $product_id;
	if (isset($_POST['edit'])) {
		$name = $_POST['name'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$amount = $_POST['amount'];
	
		// File handling
		$file_name = $_FILES["file"]["name"];
		$temp_name = $_FILES["file"]["tmp_name"];
		$folder = "uploads/" . $file_name;
	
		// Move file only if new file is uploaded
		if (!empty($file_name)) {
			move_uploaded_file($temp_name, $folder);
	
			// Update with new file
			$update = mysqli_query($conn, "UPDATE product SET 
				product_name = '$name', 
				product_category = '$category', 
				product_description = '$description', 
				amount = '$amount', 
				file = '$folder' 
				WHERE product_id = '$product_id'
			");
		} else {
			// Update without changing the file
			$update = mysqli_query($conn, "UPDATE product SET 
				product_name = '$name', 
				product_category = '$category', 
				product_description = '$description', 
				amount = '$amount' 
				WHERE product_id = '$product_id'
			");
		}
	
		if ($update) {
			echo "<script>alert('Data Updated'); window.location='read.php';</script>";
		} else {
			echo "<script>alert('Update Failed');</script>";
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					$read = mysqli_query($conn, "select * from product where product_id = '$product_id'");
					
					while($res = mysqli_fetch_array($read)){
				?>
				<form method="post" enctype="multipart/form-data">
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['product_name'] ?>">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">category</label>
					<input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['product_category'] ?>">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">description</label>
					<input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['product_description'] ?>">
				  </div>
				  <div class="mb-3">
				 <label class="form-label">Add Product Image</label>
				<input type="file" name="file" class="form-control">
				</div>
                  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">amount</label>
					<input type="amt" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['amount'] ?>">
				  </div>
				  <input type="submit" name="edit" class="btn btn-success" value="Submit">
				</form>
					<?php } ?>
			<div>
		</div>
	
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>