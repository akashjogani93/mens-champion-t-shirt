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
						<th>id</th>
						<th>name</th>
						<th>category</th>
						<th>description</th>
                        <th>amount</th>
                        <th>file</th>
                        <th>Action</th>

					</tr>
				  </thead>
				  <tbody>
				  <?php 
					$read = mysqli_query($conn, "select * from product");
					
					while($res = mysqli_fetch_array($read)){
				  ?>
					<tr>
						<td><?php echo $res['product_id']?></td>
						<td><?php echo $res['product_name']?></td>
						<td><?php echo $res['product_category']?></td>
						<td><?php echo $res['product_description']?></td>
                        <td><?php echo $res['amount']?></td>
                        <td><img style = "height:100px;" src="<?php echo $res['file']?>"></td>
                        <td><a href="edit.php?id=<?php echo $res['product_id'] ?>" class="btn btn-success">Edit</a>|| 
                        <a href="delate.php?id=<?php echo $res['product_id']?>" class="btn btn-danger">Delete</a> || 
						</td>
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