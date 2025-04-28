<?php
	$conn = mysqli_connect('localhost','root','','project');
	
	if(isset($_POST['Viewpayment'])){
		$username = $_POST['payment_amount'];
		$password = $_POST['payment_method'];
		
		$ret= mysqli_query($conn, "SELECT payment_method, payment_amount FROM Payment where username = '$username' AND password = '$password'");
		
		$row = mysqli_fetch_array($ret);
		
		
			echo "<script>alert('Payment_sucsessfuly')</script>";		
		
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
            <h2>Payment</h2>

            <!-- Name -->
            <div class="input-group">
                <label for="payment amount">payment amount</label>
                <input type="text" placeholder="" required>
            </div>

            <!-- mobile_no -->
            <div class="input-group">
                <label>payment_method</label>
				<select>
				<option value="credit_card">Credit Card</option>
				<option value="debit_card">Debit Card</option>
				<option value="paypal">PayPal</option>
				<option value="upi">UPI</option>
				</select>
            </div>
			
			<!-- Email -->
			<div class="input-group">
                <label for="payment_stetus">payment_stetus</label>
                <input type="text" id="" name="" placeholder="" required>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                      <button type="submit" name="add" class="btn btn-primary">submit</button>
                    </div>
        </form>
    </div>
</body>
</html>
