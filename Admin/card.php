<?php
$conn = mysqli_connect('localhost','root','','project');

if(isset($_POST['add'])){
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];

    $insert = mysqli_query($conn, "INSERT INTO cart (size, quantity) VALUES('$size', '$quantity')");

    if($insert){
        header("Location: payment.php");
        exit();
    } else {
        echo "<script>alert('Failed to add to cart');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add to Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .form-container {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-container">
            <h3 class="text-center mb-4">Add to Cart</h3>
            <form method="post">
              <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" name="size" class="form-control" id="size" required>
              </div>
              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" name="add" class="btn btn-success">Add to Cart</button>
                <a href="#" class="btn btn-outline-primary">Preview Design</a>
              </div>
            </form>
          </div>
        </div>
      </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
