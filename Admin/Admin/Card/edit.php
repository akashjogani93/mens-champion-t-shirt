<?php 
	$conn = mysqli_connect('localhost','root','','project');
	$cart_id = $_REQUEST['id'];
	
	if(isset($_POST['edit'])){
		$size = $_POST['size'];
		$quantity = $_POST['quantity'];
		
		$update = mysqli_query($conn, "update cart set size = '$size', quantity = '$quantity' where cart_id = '$cart_id' ");
		
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
					$read = mysqli_query($conn, "select * from cart where cart_id = '$cart_id'");
					
					while($res = mysqli_fetch_array($read)){
				?>
				<form method="post">
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">size</label>
					<input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['size'] ?>">
				  </div>
                  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">quantity</label>
					<input type="amt" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['quantity'] ?>">
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