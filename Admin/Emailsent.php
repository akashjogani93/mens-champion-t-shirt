
<?php 
session_start(); 
include_once('includes/config.php');

if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
   
    $user_id = $_SESSION['user_id'];  
    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
        exit();
    }

    $sql = "UPDATE user SET password = '$password' WHERE user_id='$user_id'";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Password has been updated successfully');</script>";
        header("location:LoginForm.php"); 
        
        // Optionally, redirect to login or other page
    }
   
} ?>



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
    <style>
        :root {
            --primary-color: #5469d4;
            --secondary-color: #f8f9fc;
            --accent-color: #4051a3;
            --text-color: #4a4a4a;
            --light-gray: #f1f3f9;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7ff 0%, #c3e0ff 100%);
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }
        
        .auth-card {
            width: 100%;
            max-width: 450px;
            border: none;
            border-radius: 16px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin: 0 auto;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 2rem;
            text-align: center;
        }
        
        .logo-area {
            margin-bottom: 1.5rem;
        }
        
        .main-logo {
            height: 60px;
            width: 60px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(84, 105, 212, 0.4);
        }
        
        .system-name {
            font-weight: 700;
            color: var(--text-color);
            font-size: 1.35rem;
            margin-bottom: 0.5rem;
        }
        
        .page-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }
        
        .separator {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.1), transparent);
            margin: 1rem 0;
        }
        
        .card-body {
            padding: 2.5rem;
            background-color: white;
        }
        
        .instructions {
            text-align: center;
            color: #757575;
            margin-bottom: 2rem;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-control {
            height: 52px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem 0.75rem 3rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(84, 105, 212, 0.2);
        }
        
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #b0b0b0;
            transition: color 0.3s ease;
            font-size: 1.1rem;
        }
        
        .form-control:focus + .form-icon {
            color: var(--primary-color);
        }
        
        .action-button {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 0.85rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(84, 105, 212, 0.4);
            margin-top: 1rem;
        }
        
        .action-button:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(84, 105, 212, 0.5);
        }
        
        .action-button:active {
            transform: translateY(0);
        }
        
        .action-button i {
            margin-right: 8px;
        }
        
        .card-footer {
            background-color: var(--light-gray);
            padding: 1.5rem;
            text-align: center;
            border-top: none;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        
        .footer-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .footer-link:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }
        
        .footer-link i {
            margin-right: 6px;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .auth-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
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
                <h2 class="system-name">Recover Your Account</h2>
                <div class="separator"></div>
                <h5 class="page-title">Please enter new password to reset your account</h5>
            </div>
            <div class="card-body">
                <p class="instructions">Please enter new password to reset your account</p>
                
                <form method="post">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password" required>
                        <br>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" name="login">Change Password</button>
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