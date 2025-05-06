<?php
include("nav.php");
	$conn = mysqli_connect('localhost','root','','project');
?>

    <div class="container">
</br>
</br>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				  <thead class="table-dark">
					<tr>
						<th>Slno</th>
						<th>Name</th>
						<th>Email</th>
						<th>Message</th>
						<th>Type</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
                        $query = "SELECT * FROM `contact`";
                        $ret = mysqli_query($conn, $query);
                        while ($product = mysqli_fetch_assoc($ret)) 
                    {
				  ?>
					<tr>
						<td><?php echo $product['id']?></td>
						<td><?php echo $product['name']?></td>
						<td><?php echo $product['email']?></td>
						<td><?php echo $product['description']?></td>
						<td><?php echo $product['type']?></td>
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