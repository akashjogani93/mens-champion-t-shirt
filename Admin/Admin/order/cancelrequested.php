<?php
include("../nav.php");
	$conn = mysqli_connect('localhost','root','','project');
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <div class="container">
</br>
</br>
		<div class="row">
			<div class="col-md-12">
				<a href="read.php" class="btn btn-warning">Order Placed</a>
				<a href="#" class="btn btn-danger">Cancel Requested</a>
				<a href="delevered.php" class="btn btn-warning">Delevered</a>
				<a href="cancelled.php" class="btn btn-warning">Cancelled</a>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				  <thead class="table-dark">
					<tr>
						<th>Order Id</th>
						<th>Username</th>
						<th>Order Date</th>
						<th>Product Name</th>
						<th>Order Size</th>
						<th>Order Qty</th>
                        <th>Order Amount</th>
                        <th>Order Status</th>
                        <th>Refund</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
				  	 $query = "SELECT 
					   orders.order_date,
					   orders.order_status,
					   orders.order_id,
					   orders.size,
					   orders.qty,
					   orders.rate,
					   orders.order_amount,
					   orders.order_status,
						product.product_name,
						user.name
						FROM orders
						JOIN product ON product.product_id = orders.productid
						JOIN user ON user.user_id = orders.userid
                        WHERE orders.order_status='Cancel_requested'";
					$ret = mysqli_query($conn, $query);
                        
					while ($product = mysqli_fetch_assoc($ret)) {
				  ?>
					<tr>
						<td><?php echo $product['order_id']?></td>
						<td><?php echo $product['name']?></td>
						<td><?php echo $product['order_date']?></td>
						<td><?php echo $product['product_name']?></td>
						<td><?php echo $product['size']?></td>
						<td><?php echo $product['qty']?></td>
						<td><?php echo $product['order_amount']?></td>
						<td><?php echo $product['order_status']?></td>
						<td><button class="btn btn-warning" onclick="refundOrder(<?php echo $product['order_id']?>)">Cancel Order</button></td>
                    </tr>
					<?php 
					}
					?>
				  </tbody>
				</table>
			</div>
		</div>
        
	</div>
	<script>
		function refundOrder(orderid)
		{
			console.log(orderid)
			let log=jQuery.ajax({
				type: 'post',
				url: 'status_process.php',
				data: "refundID=" + orderid,
				success: function(result)
				{
					console.log(result);
					alert(result)
					window.location.href = "cancelrequested.php";
				}
			});
			console.log(log);
		}

	</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>