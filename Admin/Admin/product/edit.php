<?php 
	$conn = mysqli_connect('localhost','root','','project');
	$category_id = $_REQUEST['id'];
	
	if(isset($_POST['edit'])){
		$name = $_POST['name'];
	
		
		$update = mysqli_query($conn, "update product_category set name = '$name' where category_id = '$category_id' ");
		
		if($update){
			echo"<script>alert('Data Updated')</script>";
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
					$read = mysqli_query($conn, "select * from product_category where category_id = '$category_id'");
					
					while($res = mysqli_fetch_array($read)){
				?>
				<form method="post">
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['name'] ?>">
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