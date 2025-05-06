<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'project');

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $read = mysqli_query($conn, "SELECT * FROM admin WHERE name = '$name' AND password = '$password'");

    $row = mysqli_num_rows($read);

    if ($row > 0) 
    {
        $_SESSION['adminlogin'] = $name;
        header("Location:dashboard.php");
        exit();
    } else {
       echo "<script>alert('Wrong Username And Password')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>t-shirt Printing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
      body {
        background: url('../img/adminlogin.jpg') no-repeat center center fixed;
        background-size: cover;
      }
      .login-form {
        background: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        margin-top: 100px;
      }
    </style>

  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="post" class="login-form">
            <h3 class="text-center mb-4">Admin Login</h3>
            <div class="mb-3">
              <label class="form-label">Enter Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Enter Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <input type="submit" name="login" class="btn btn-primary w-100" value="LOGIN">
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

