<?php
session_start(); 
include_once('includes/config.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $ret = mysqli_query($con,"SELECT user_id, name,password FROM users WHERE email='$email'");

    // Check if the email exists in the database
    $num = mysqli_fetch_array($ret);
    if($num >0){
        $_SESSION['user_id'] = $num['user_id'];
        $_SESSION['name'] = $num['name'];
        header("location:Emailsent.php");  
    }
        else {
            echo "<script>alert('Email not registered with us');</script>";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Password recovery form for users" />
    <meta name="author" content="" />
    <title>Password Recovery | Registration and Login System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <div class="card-header">
                <div class="logo-area">
                    <div class="main-logo">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <h2 class="system-name">Registration and Login System</h2>
                <div class="separator"></div>
                <h3 class="page-title">Password Recovery</h3>
            </div>
            <div class="card-body">
                <p class="instructions">Enter your registered email address below and we'll send you instructions to recover your password.</p>
                
                <form method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your email address" required>
                        <i class="fas fa-envelope form-icon"></i>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" name="login">Reset Password</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="footer-links">
                    <a href="login.php" class="footer-link">
                        <i class="fas fa-sign-in-alt"></i> Back to Login
                    </a>
                    <a href="reg.php" class="footer-link">
                        <i class="fas fa-user-plus"></i> Create Account
                    </a>
                    <a href="index.php" class="footer-link">
                        <i class="fas fa-home"></i> Home
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
