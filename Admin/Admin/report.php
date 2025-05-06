<?php
include("nav.php");
	$conn = mysqli_connect('localhost','root','','project');
?>

    <div class="container">
</br>
</br>
        <form action="report.php">
		<div class="row">
			<div class="col-md-3">
                <label for="">From Date</label>
                <input type="date" id="fdate" name="fdate" class="form-control" required>
			</div>
            <div class="col-md-3">
                <label for="">To Date</label>
                <input type="date" id="tdate" name="tdate" class="form-control" required>
			</div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info"  class="form-control" style="margin-top:20px" name="search">Search</button>
                <a href="report.php" class="btn btn-warning"  class="form-control" style="margin-top:20px">Refresh</a>
            </div>
		</div>
        </form>
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
					</tr>
				  </thead>
				  <tbody>
				  <?php 
                    if(isset($_GET['search']))
                    {
                        $fdate=$_GET['fdate'];
                        $tdate=$_GET['tdate'];
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
                        WHERE orders.order_date BETWEEN '$fdate' AND '$tdate'";
                        $ret = mysqli_query($conn, $query);
                    }else
                    {
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
                            JOIN user ON user.user_id = orders.userid";
                        $ret = mysqli_query($conn, $query);

                    }
                            
                        while ($product = mysqli_fetch_assoc($ret)) 
                    {
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
                    </tr>
					<?php 
					}
					?>
				  </tbody>
				</table>
			</div>
		</div>
                    <script>
                            // alert('working');
                        </script>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>