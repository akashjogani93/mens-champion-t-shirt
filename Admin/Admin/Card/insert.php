<?php
	$conn = mysqli_connect('localhost','root','','project');

	if(isset($_POST['add'])){
		$size = $_POST['size'];
		$quantity = $_POST['quantity'];
		
		$insert  = mysqli_query($conn, "insert into cart (size,quantity) values('$size','$quantity')");
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .form-container {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <div class="container">
	  <div class="row justify-content-center">
		<div class="col-md-6">
			<div class="form-container">
				<h4 class="text-center mb-4 font-family:algerian;">Add to Cart</h4>
				<form method="post">
				  <div class="mb-3">
					<label for="size" class="form-label">Size</label>
					<input type="text" name="size" class="form-control" id="size" required>
				  </div>
				  <div class="mb-3">
					<label for="quantity" class="form-label">Quantity</label>
					<input type="number" name="quantity" class="form-control" id="quantity" required>
				  </div>
				  <div class="d-grid gap-2">
					<button type="submit" name="add" class="btn btn-success">Add to Cart</button>
				  </div>
				</form>
			</div>
		</div>
	  </div>	
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
