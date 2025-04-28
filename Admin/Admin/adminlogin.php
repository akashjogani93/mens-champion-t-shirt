<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $read = mysqli_query($conn, "SELECT * FROM admin WHERE name = '$name' AND password = '$password'");

    $row = mysqli_num_rows($read);

    if ($row > 0) {
        // Redirect to admin dashboard or another page
        header("Location:dashboard.php");
        exit(); // always call exit after header redirection
    } else {
        echo "Invalid";
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
				<form method="post">
				  <div class="mb-3">
					<label class="form-label">enter name</label>
					<input type="text" name="name" class="form-control">
				  </div>
				  <div class="mb-3">
					<label class="form-label">enter password</label>
					<input type="text" name="password" class="form-control">
				  </div>
				  <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
				</form>
			<div>
		</div>
	
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>