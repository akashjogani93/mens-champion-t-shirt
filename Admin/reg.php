<?Php
  $conn=mysqli_connect('localhost','root','','project');
  if(isset($_POST['add'])){
  $username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$mobile_no=$_POST['mobile_no'];

  $insert= mysqli_query($conn,"insert into users(username,password,email,mobile_no) values('$username','$password','$email','$mobile_no')");
  echo"<script>alert('registred');
	location.href='index.php';
  </script>";
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="res.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <div class="row">
    <div class="container">
        <form action="#" method="post" class="registration-form">
            <h2>Register</h2>

            <!-- Name -->
            <div class="input-group">
                <label for="username">Full Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your full name" required>
            </div>

            <!-- mobile_no -->
            <div class="input-group">
                <label for="mobile_no">Contact</label>
                <input type="text" id="mobile_no" name="mobile_no" placeholder="Enter your phoneno" required>
            </div>
			
			<!-- Email -->
			<div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
			
	
            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                      <button type="submit" name="add" class="btn btn-primary">Register</button>
                    </div>
        </form>
    </div>
	<script>
  document.querySelector('form').addEventListener('submit', function(e) {
    const mobileField = document.getElementById('mobile_no');
    const mobile = mobileField.value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    const mobileRegex = /^[6-9]\d{9}$/;
    if (!mobileRegex.test(mobile)) {
      e.preventDefault();
      alert("Invalid mobile number. It should start with 9, 8, 7, or 6 and be 10 digits long.");
      mobileField.focus();
      return;
    }

    if (password !== confirmPassword) {
      e.preventDefault();
      alert("Passwords do not match.");
      document.getElementById('confirm-password').focus();
      return;
    }
  });
</script>

</body>
</html>
