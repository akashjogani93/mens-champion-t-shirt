<?Php
    include("../nav.php");
  $conn=mysqli_connect('localhost','root','','project');
  if(isset($_POST['add'])){
  $username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$mobile_no=$_POST['mobile_no'];

  $insert= mysqli_query($conn,"insert into user(name,password,email,phone) values('$username','$password','$email','$mobile_no')");
  echo "<script>alert('User Added Successffully'); window.location='read.php';</script>";
  }
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-3">
            <a href="read.php" class="btn btn-warning">View User</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="#" method="post" class="border p-4 rounded bg-light shadow">
                <h3 class="mb-4 text-center">Register</h3>

                <!-- Full Name -->
                <div class="mb-3">
                    <label for="username" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your full name" required>
                </div>

                <!-- Contact -->
                <div class="mb-3">
                    <label for="mobile_no" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter your phone number" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" name="add" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
