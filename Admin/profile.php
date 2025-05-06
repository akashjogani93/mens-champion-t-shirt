<?php
include('navigation.php');
$conn = mysqli_connect('localhost','root','','project');
$userid=$_SESSION['user_id'] ?? '';
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<header class="bg-dark text-white p-3">
  <h1 class="text-center">Profile</h1>
</header>


    <div class="container mt-5">
        <h1 class="text-center">Order Details</h1>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Total</th>
                                    <th>status</th>
                                    <th>Created</th>
                                    <th>Payment Id</th>
                                    <th>Payment Status</th>
                                    <th>Cancel Order</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php 
                                    $query = "SELECT 
                                    orders.order_date,
                                    orders.order_status,
                                    orders.order_id,
                                    orders.size,
                                    orders.qty,
                                    orders.rate,
                                    payment.amount,
                                    payment.status AS paystatus,
                                    payment.transaction,
                                    product.product_name 
                                  FROM orders
                                  JOIN payment ON payment.orderid = orders.order_id
                                  JOIN product ON product.product_id = orders.productid
                                  WHERE orders.userid = '$userid' AND orders.order_status='Placed' || orders.order_status='Cancel_requested'";
                        
                                $ret = mysqli_query($conn, $query);
                        
                                while ($product = mysqli_fetch_assoc($ret)) {
                                ?>
                                    <tr class="cell-1"> 
                                        <td><?php echo $product['order_id']; ?></td>
                                        <td><?php echo $product['product_name']; ?></td>
                                        <td><?php echo $product['size']; ?></td>
                                        <td><?php echo $product['qty']; ?></td>
                                        <td><?php echo $product['rate']; ?></td>
                                        <td><?php echo $product['amount']; ?></td>
                                        <td><?php echo $product['order_status']; ?></td>
                                        <td><?php echo $product['order_date']; ?></td>
                                        <td><?php echo $product['transaction']; ?></td>
                                        <td><?php echo $product['paystatus']; ?></td>
                                        <td><?php
                                                if($product['order_status']=='Placed')
                                                {
                                            ?>
                                                <button class="btn btn-warning" onclick="cancel_order(<?php echo $product['order_id']?>)">Cancel Order</button></td>
                                            <?php
                                                }else
                                                {
                                                    ?>
                                                        Cancel Requested
                                                    <?php
                                                }
                                            ?>
                                        </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>   
        <br>   
        <br>   
        <h1 class="text-center">Order Delevered</h1>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Total</th>
                                    <th>status</th>
                                    <th>Created</th>
                                    <th>Payment Id</th>
                                    <th>Payment Status</th>
                                    <!-- <th>Cancel Order</th> -->
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php 
                                    $query = "SELECT 
                                    orders.order_date,
                                    orders.order_status,
                                    orders.order_id,
                                    orders.size,
                                    orders.qty,
                                    orders.rate,
                                    payment.amount,
                                    payment.status AS paystatus,
                                    payment.transaction,
                                    product.product_name 
                                  FROM orders
                                  JOIN payment ON payment.orderid = orders.order_id
                                  JOIN product ON product.product_id = orders.productid
                                  WHERE orders.userid = '$userid' AND orders.order_status='Delevered'";
                        
                                $ret = mysqli_query($conn, $query);
                        
                                while ($product = mysqli_fetch_assoc($ret)) {
                                ?>
                                    <tr class="cell-1"> 
                                        <td><?php echo $product['order_id']; ?></td>
                                        <td><?php echo $product['product_name']; ?></td>
                                        <td><?php echo $product['size']; ?></td>
                                        <td><?php echo $product['qty']; ?></td>
                                        <td><?php echo $product['rate']; ?></td>
                                        <td><?php echo $product['amount']; ?></td>
                                        <td><?php echo $product['order_status']; ?></td>
                                        <td><?php echo $product['order_date']; ?></td>
                                        <td><?php echo $product['transaction']; ?></td>
                                        <td><?php echo $product['paystatus']; ?></td>
                                        <!-- <td><?php echo $product['paystatus']; ?></td> -->
                                    </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>   
        <br>   
        <br>   
        <h1 class="text-center">Order Cancelled</h1>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Total</th>
                                    <th>status</th>
                                    <th>Created</th>
                                    <th>Payment Id</th>
                                    <th>Payment Status</th>
                                    <!-- <th>Cancel Order</th> -->
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php 
                                    $query = "SELECT 
                                    orders.order_date,
                                    orders.order_status,
                                    orders.order_id,
                                    orders.size,
                                    orders.qty,
                                    orders.rate,
                                    payment.amount,
                                    payment.status AS paystatus,
                                    payment.transaction,
                                    product.product_name 
                                  FROM orders
                                  JOIN payment ON payment.orderid = orders.order_id
                                  JOIN product ON product.product_id = orders.productid
                                  WHERE orders.userid = '$userid' AND orders.order_status='Cancelled'";
                        
                                $ret = mysqli_query($conn, $query);
                        
                                while ($product = mysqli_fetch_assoc($ret)) {
                                ?>
                                    <tr class="cell-1"> 
                                        <td><?php echo $product['order_id']; ?></td>
                                        <td><?php echo $product['product_name']; ?></td>
                                        <td><?php echo $product['size']; ?></td>
                                        <td><?php echo $product['qty']; ?></td>
                                        <td><?php echo $product['rate']; ?></td>
                                        <td><?php echo $product['amount']; ?></td>
                                        <td><?php echo $product['order_status']; ?></td>
                                        <td><?php echo $product['order_date']; ?></td>
                                        <td><?php echo $product['transaction']; ?></td>
                                        <td><?php echo $product['paystatus']; ?></td>
                                        <!-- <td><?php echo $product['paystatus']; ?></td> -->
                                    </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <script>
    function cancel_order(orderid)
    {
        let log=jQuery.ajax({
            type: 'post',
            url: 'status_process.php',
            data: "orderid=" + orderid,
            success: function(result)
            {
                console.log(result);
                alert(result)
                window.location.href = "profile.php";
            }
        });
        console.log(log);
    }
	</script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
  <!-- Footer Section -->
<footer style="background-color: #333; color: white; padding: 20px 0; text-align: center;">
    <div>
        <p>&copy; 2025 YourPrintStore. All Rights Reserved.</p>
        <p>Follow us on:
            <a href="https://www.facebook.com" target="_blank" style="color: white; text-decoration: none; margin: 0 10px;">Facebook</a>|
            <a href="https://www.instagram.com" target="_blank" style="color: white; text-decoration: none; margin: 0 10px;">Instagram</a>|
            <a href="https://www.twitter.com" target="_blank" style="color: white; text-decoration: none; margin: 0 10px;">Twitter</a>
        </p>
        <p><a href="/terms-of-service" style="color: white; text-decoration: none;">Terms of Service</a> | <a href="/privacy-policy" style="color: white; text-decoration: none;">Privacy Policy</a></p>
    </div>
</footer>
</html>  