<?Php
  $conn=mysqli_connect('localhost','root','','project');
  if(isset($_POST['add'])){
  $payment_amount=$_POST['payment_amount'];
	$payment_method=$_POST['payment_method'];
	$payment_status=$_POST['payment_status'];
	

  $insert= mysqli_query($conn,"insert into payment(payment_amount,payment_method,payment_status) values('$payment_amount','$payment_method','$payment_method')");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Details</title>
  <link rel="stylesheet" href="Payment.css">

</head>
<body>
  <div class="container">
    <h1>Payment Details</h1>
    
    <div class="payment-details">
      <label for="payment_amount">Payment Amount:</label>
      <input type="text" id="payment_amount">

      <label for="payment_method">Payment Method:</label>
      <input type="text" id="payment_method" >

      <label for="payment_status">Payment Status:</label>
      <input type="text" id="payment_status" >
    </div>

    <div class="d-grid gap-2">
        <button type="submit" name="add" class="btn btn-primary">Pay Now</button>
    </div>
	</div>
  <script src="scripts.js"></script>
</body>
</html>
