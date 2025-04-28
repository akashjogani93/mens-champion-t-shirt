
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>
	<div class="row">
		<div class="col-md-4">
			<div style="background:url('img/9.jpg');height:500px;background-size:cover">
				<div class="position-absolute top-50 start-30">
				<button type="button" class="btn btn-outline-info">Add Design</button>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="d-grid gap-2">
			<h5 style="font-family:algerian"> T-shirt </h5>
				   <p>Rs 600</p>
			<label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" onchange="updatePrice()" />
			
			<a href="Card/insert.php">
			<button type="button" class="btn btn-outline-success">Add to Card</button>
			</div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>