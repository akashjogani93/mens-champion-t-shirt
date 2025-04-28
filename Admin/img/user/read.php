<?php
	$conn = mysqli_connect('localhost','root','','project');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				  <thead class="table-dark">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email ID</th>
						<th>Mobile Number</th>
						<th>delete</th>
						<th>edit</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
					$read = mysqli_query($conn, "select * from users");
					
					while($res = mysqli_fetch_array($read)){
				  ?>
					<tr>
						<td><?php echo $res['user_id']?></td>
						<td><?php echo $res['username']?></td>
						<td><?php echo $res['email']?></td>
						<td><?php echo $res['mobile_no']?></td>
						<td><a href="edit.php?user_id=<?php echo $res['user_id'] ?>">Edit</a></td>
						<td><a href="delete.php?user_id=<?php echo $res['user_id'] ?>">delete</a></td>
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