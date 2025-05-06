<?php
	include("../nav.php");
	$conn = mysqli_connect('localhost','root','','project');
?>

	<div class="container">
	</br>
	</br>
		<div class="row">
			<div class="col-md-2">
				<a href="reg.php" class="btn btn-warning">Add User</a>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				  <thead class="table-dark">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email ID</th>
						<th>Mobile Number</th>
						<th>Password</th>
						<th>delete</th>
						<!-- <th>edit</th> -->
					</tr>
				  </thead>
				  <tbody>
				  <?php 
					$read = mysqli_query($conn, "select * from user");
					
					while($res = mysqli_fetch_array($read)){
				  ?>
					<tr>
						<td><?php echo $res['user_id']?></td>
						<td><?php echo $res['name']?></td>
						<td><?php echo $res['email']?></td>
						<td><?php echo $res['phone']?></td>
						<td><?php echo $res['password']?></td>
						<!-- <td><a href="edit.php?user_id=<?php echo $res['user_id'] ?>" class="btn btn-success">Edit</a></td> -->
						<td><a href="delete.php?user_id=<?php echo $res['user_id'] ?>" class="btn btn-danger">delete</a></td>
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