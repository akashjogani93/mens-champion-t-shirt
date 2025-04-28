<?php
	$conn = mysqli_connect('localhost','root','','project');
	
	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
		
		$insert  = mysqli_query($conn, "insert into admin (name,phone,email,password) values('$name','$phone','$email','$password')");
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
				<form method="post">
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">phone</label>
					<input type="tel" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">email</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
                  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">password</label>
					<input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <input type="submit" name="add" class="btn btn-primary" value="Submit">
				</form>
			<div>
		</div>
	
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>