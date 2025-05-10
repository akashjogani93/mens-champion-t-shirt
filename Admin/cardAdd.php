<?php
include('navigation.php');
$uploadedImage = $_SESSION['uploaded_image'] ?? '';
$productid = $_SESSION['productid'] ?? '';
$user_id = $_SESSION['user_id'] ?? '';
$rate= $_SESSION['amount'] ?? '';
if (isset($_POST['uploaded_image'])) 
{
    $_SESSION['uploaded_image'] = $_POST['uploaded_image'];
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  	<style>
      body {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .form-container {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-top: 50px;
      }

	#paymentForm {
		display: none;
		margin-top: 30px;
		padding: 20px;
		border: 2px solid #28a745;
		border-radius: 10px;
		width: 50%;
		background-color: #f9f9f9;
	}

	#paymentForm input[type="button"]:first-child {
		background-color: #28a745;
		color: white;
	}

	#paymentForm input[type="button"]:last-child {
		background-color: #dc3545;
		color: white;
	}

    </style>
	
    <div class="container">
	  <div class="row justify-content-center">
		<div class="text-center mb-3">
			<?php if (!empty($uploadedImage)) { ?>
			<!-- <img src="Admin/product/uploads/<?php echo $uploadedImage; ?>" width="200" /> -->
			<?php } else { ?>
			<!-- <p>No design uploaded yet.</p> -->
			<?php } ?>
		</div>
		<div class="col-md-6">
			<div class="form-container">
				<h4 class="text-center mb-4 font-family:algerian;">Add to Cart</h4>
				<form method="post" onsubmit="return false;">
					<div class="mb-3">
						<label for="size" class="form-label">Size</label>

						<div class="d-flex flex-wrap gap-2">
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('S')">S</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('M')">M</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('L')">L</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('XL')">XL</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('XXL')">XXL</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('BIG')">BIG</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('Iphone')">Iphone</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('Vivo')">Vivo</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('Samsung')">Samsung</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('Poco')">Poco</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('Motorola')">Motorola</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('Redmi')">Redmi</button>
							<button type="button" class="btn btn-outline-primary" onclick="selectSize('OTHERS')">OTHERS</button>
						</div>
						<!-- Hidden input to store selected size -->
						<input type="hidden" name="size" id="size" required>
				  	</div>
				  <div class="mb-3">
					<label for="quantity" class="form-label">Rate</label>
					<input type="number" name="rate" class="form-control" id="rate" readonly required value="<?php echo $rate; ?>">
				  </div>
				  <div class="mb-3">
					<label for="quantity" class="form-label">Quantity</label>
					<input type="number" name="quantity" class="form-control" id="quantity" required oninput="calculateTotal()">
				  </div>
				  <div class="mb-3">
					<label for="quantity" class="form-label">Total Amount</label>
					<input type="number" name="Amount" class="form-control" id="Amount" required readonly> 
				  </div>
				  <div class="d-grid gap-2">
					<!-- <button name="add" class="btn btn-success" onclick="showPaymentForm()">Order Now</button> -->
					<button type="button" name="add" class="btn btn-success" onclick="showPaymentForm()">Order Now</button>
				  </div>
				</form>
			</div>
		</div>
	  </div>	
	</div>

	<center>
		<form id="paymentForm">
			<input type="textbox" name="name" id="name" placeholder="Enter your name as in order form" /><br/><br />
			<input type="textbox" name="amt" id="amt" placeholder="Enter The Book amount" readonly/><br /><br />
			<input type="textbox" name="street" id="street" placeholder="Enter Street" /><br /><br />
			<input type="textbox" name="city" id="city" placeholder="Enter City" /><br /><br />
			<input type="textbox" name="state" id="state" placeholder="Enter State" /><br /><br />
			<input type="textbox" name="address" id="address" placeholder="Enter Address" /><br /><br />
			<input type="textbox" name="pincode" id="pincode" placeholder="Enter Pincode" /><br /><br />
			<input type="button" name="btn" value="Pay Now" onclick="pay_now()" />
			<input type="button" name="btn" value="Cancel" onclick="cancelPayment()" />
		</form>
	</center>

<script>
	function selectSize(size) 
	{
		document.getElementById('size').value = size;

		// Optional: highlight selected button
		const buttons = document.querySelectorAll('.btn-outline-primary');
		buttons.forEach(btn => btn.classList.remove('active'));
		event.target.classList.add('active');
	}
	function calculateTotal() {
		let rate = parseFloat(document.getElementById('rate').value) || 0;
		let qty = parseInt(document.getElementById('quantity').value) || 0;
		let total = rate * qty;
		document.getElementById('Amount').value = total;
	}

	function showPaymentForm() 
	{
		let size = document.getElementById('size').value.trim();
		let quantity = document.getElementById('quantity').value;
		let Amount = document.getElementById('Amount').value;

		console.log(size);
		if (size === '') {
			alert('Please enter the Size.');
			document.getElementById('size').focus();
			return false;
		}

		if (quantity === '' || parseInt(quantity) <= 0) {
			alert('Please enter a valid Quantity.');
			document.getElementById('quantity').focus();
			return false;
		}

		// If all fields are filled, show payment form
		document.getElementById('amt').value = Amount;
		document.getElementById('paymentForm').style.display = 'block';
	}

	function cancelPayment() {
		document.getElementById('paymentForm').style.display = 'none';
	}

	function pay_now()
	{
		let name = document.getElementById('name').value.trim();
		let amt = document.getElementById('amt').value.trim();
		let street = document.getElementById('street').value.trim();
		let city = document.getElementById('city').value.trim();
		let state = document.getElementById('state').value.trim();
		let address = document.getElementById('address').value.trim();
		let pincode = document.getElementById('pincode').value.trim();
		let imagepath="<?php echo trim($uploadedImage); ?>";
		let userid="<?php echo $user_id; ?>";
		let productid="<?php echo $productid; ?>";
		let size = document.getElementById('size').value.trim();
		let quantity = document.getElementById('quantity').value.trim();

		// console.log(imagepath)
		// return;

		if (name === '') {
			alert('Please enter your name.');
			document.getElementById('name').focus();
			return false;
		}

		if (amt === '' || parseFloat(amt) <= 0) {
			alert('Please enter a valid amount.');
			document.getElementById('amt').focus();
			return false;
		}

		if (street === '') {
			alert('Please enter your street.');
			document.getElementById('street').focus();
			return false;
		}

		if (city === '') {
			alert('Please enter your city.');
			document.getElementById('city').focus();
			return false;
		}

		if (state === '') {
			alert('Please enter your state.');
			document.getElementById('state').focus();
			return false;
		}

		if (address === '') {
			alert('Please enter your address.');
			document.getElementById('address').focus();
			return false;
		}
		if (pincode === '') {
			alert('Please enter your pincode.');
			document.getElementById('pincode').focus();
			return false;
		}

		jQuery.ajax({
            type: 'post',
            url: 'razorpay/payment_process.php',
            data: "amt=" + amt +
					"&name=" + name +
					"&street=" + street +
					"&city=" + city +
					"&state=" + state +
					"&address=" + address +  
					"&imagepath=" + imagepath +  
					"&productid=" + productid +  
					"&pincode=" + pincode +  
					"&userid=" + userid +
					"&quantity=" + quantity +
					"&size=" + size ,
            success: function(result)
            {
                var options = {
                    "key": "rzp_test_4xqdfbGkan8jb3",
                    "amount": amt * 100,
                    "currency": "INR",
                    "name": "ReadersCave",
                    "description": "Test Transaction",
                    "image": "./logo.jpeg",
                    "handler": function(response) 
					{
                        let log=jQuery.ajax({
                            type: 'post',
                            url: 'razorpay/payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result)
							{
								console.log(result);
                                window.location.href = "index.php";
                            }
                        });
						console.log(log);
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
	}
</script>
	<footer class="text-center mt-4 p-3 bg-light">
  <p>&copy; 2025 Your E-Commerce Website</p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
