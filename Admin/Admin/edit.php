<?php 
	$conn = mysqli_connect('localhost','root','','project');
	$admin_id = $_REQUEST['id'];
	
	if(isset($_POST['edit'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$update = mysqli_query($conn, "update admin set name = '$name', email = '$email', phone = '$phone', password = '$password' where admin_id = '$admin_id' ");
		
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
					$read = mysqli_query($conn, "select * from admin where admin_id = '$admin_id'");
					
					while($res = mysqli_fetch_array($read)){
				?>
				<form method="post">
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['name'] ?>">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">phone</label>
					<input type="tel" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['phone'] ?>">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">email</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['email'] ?>">
				  </div>
                  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">password</label>
					<input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $res['password'] ?>">
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