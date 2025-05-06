<?php
include("../nav.php");
	$conn = mysqli_connect('localhost','root','','project');
?>

    <div class="container">
</br>
</br>
		<div class="row">
			<div class="col-md-12">
				<a href="#" class="btn btn-danger">Completed</a>
				<a href="refunded.php" class="btn btn-warning">Refunded</a>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				  <thead class="table-dark">
					<tr>
						<th>id</th>
						<th>date</th>
                        <th>Amount</th>
                        <th>Order Id</th>
                        <th>Username</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Transaction ID</th>
					</tr>
				  </thead>
				  <tbody>
					<?php 
						$query = "SELECT 
						payment.payment_id,
						payment.amount,
						payment.date,
						payment.status,
						payment.transaction,
						payment.orderid,
						product.product_name,
						user.name
						FROM payment
						JOIN user ON user.user_id = payment.userid
						JOIN product ON product.product_id = payment.productid
						WHERE payment.status='completed'";

						$ret = mysqli_query($conn, $query);
						while ($product = mysqli_fetch_assoc($ret)) {
				  ?>
					<tr>
						<td><?php echo $product['payment_id']?></td>
						<td><?php echo $product['date']?></td>
						<td><?php echo $product['amount']?></td>
						<td><?php echo $product['orderid']?></td>
						<td><?php echo $product['name']?></td>
						<td><?php echo $product['product_name']?></td>
						<td><?php echo $product['status']?></td>
						<td><?php echo $product['transaction']?></td>
					</tr>
					<?php 
					}
					?>
				  </tbody>
				</table>
			</div>
		</div>
	
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>