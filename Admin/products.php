<?php
include('navigation.php');
$conn = mysqli_connect('localhost','root','','project');
?>
<header class="bg-dark text-white p-3">
  <h1 class="text-center">Style Sparks</h1>
  <!-- <section id="tshirts" class="pt-4">
  <h2 >T-Shirts</h2>
  <div class="row">
    <?php
    $ret = mysqli_query($conn, "SELECT * FROM product WHERE product_category = 'T-Shirts' ORDER BY product_id DESC");
    while ($row = mysqli_fetch_array($ret)) {
        $imageFile = $row['file'];
        $imagePath = "product/" . $imageFile;

        if (!file_exists($imagePath) || empty($imageFile)) {
            $imagePath = "product/default.jpg";
        }
    ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Product Image">
        <div class="card-body">
          <h4 class="card-title"><?php echo $row['product_name']; ?></h4>
          <p class="card-text"><strong>Category:</strong> <?php echo $row['product_category']; ?></p>
          <p class="card-text"><strong>Description:</strong> <?php echo $row['product_description']; ?></p>
          <p class="card-text"><strong>Price:</strong> $<?php echo $row['amount']; ?></p>
          <a href="product-details.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary mt-3">Design Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section> -->

</header>

<div class="container">
  <div class="row pt-4">
    <?php
    $ret = mysqli_query($conn, "SELECT * FROM product ORDER BY product_id DESC");
    while ($row = mysqli_fetch_array($ret)) {
        $imageFile = $row['file'];
        $imagePath = "Admin/product/" . $imageFile;

        // Fallback if image file is missing or invalid
        if (!file_exists($imagePath) || empty($imageFile)) {
            $imagePath = "product/default.jpg"; // Ensure this default image exists
        }
    ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Product Image" 
        style="height: 250px; width: 100%; object-fit: contain; background-color: #f8f8f8;">
        <div class="card-body">
          <h4 class="card-title"><?php echo $row['product_name']; ?></h4>
          <p class="card-text"><strong>Category:</strong> <?php echo $row['product_category']; ?></p>
          <p class="card-text"><strong>Description:</strong> <?php echo $row['product_description']; ?></p>
          <p class="card-text"><strong>Price:</strong> $<?php echo $row['amount']; ?></p>
          <a href="product-details.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary mt-3 p-2">Design Now</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
      </br>
      </br>
      </br>
      </br>

<footer class="text-center mt-4 p-3 bg-light">
  <p>&copy; 2025 Your E-Commerce Website</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
