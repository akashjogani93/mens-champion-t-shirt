<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
$result = mysqli_query($conn, "SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Gallery</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.product {
			border: 1px solid #ddd;
			padding: 15px;
			margin: 10px;
			border-radius: 10px;
			width: 250px;
			text-align: center;
			background-color: #fff;
		}
		.product img {
			width: 100%;
			height: 200px;
			object-fit: cover;
			border-radius: 5px;
		}
		.grid {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
	</style>
</head>
<body>
	<div class="container my-5">
		<h2 class="text-center mb-4">Uploaded Products</h2>
		<div class="grid">
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
				<div class="product">
					<img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
					<h4><?php echo $row['name']; ?></h4>
					<p><?php echo $row['description']; ?></p>
					<p><strong>₹<?php echo $row['amount']; ?></strong></p>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>
