<?php
include('navigation.php');
$conn = mysqli_connect('localhost','root','','project');
$uploadedFileName = '';
$_SESSION['productid']=$_GET['id'];
$userid=$_SESSION['user_id'] ?? '';
// Handle design upload
// if (isset($_POST['upload']) && isset($_FILES['design_file'])) {
//     $id = $_GET['id'];
//     $fileName = $_FILES['design_file']['name'];
//     $fileTmp = $_FILES['design_file']['tmp_name'];

//     $uploadPath = "Admin/product/uploads/" . basename($fileName);
//     move_uploaded_file($fileTmp, $uploadPath);
//     $uploadedFileName = $fileName;
//     echo "<script>alert('Design uploaded successfully!'); window.location.href='product-details.php?id=$id';</script>";
// }

// Fetch product
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ret = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'");
    $product = mysqli_fetch_assoc($ret);
    if (!$product) {
        echo "<script>alert('Product not found.'); window.location.href = 'index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'index.php';</script>";
    exit;
}
?>
  <style>
    body {
      background: linear-gradient(to right, #f0f2f5, #e3e9f1);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-img {
      max-width: 100%;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      transition: all 0.4s ease-in-out;
    }

    .product-img:hover {
      transform: scale(1.07);
      filter: brightness(1.1);
    }

    .card-style {
      background: #ffffff;
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h1 {
      color: #34495e;
    }

    h2 {
      font-weight: bold;
      color: #2c3e50;
    }

    .alert-info {
      background: #dfefff;
      border-left: 5px solid #3498db;
    }

    .btn-secondary {
      background-color: #6c757d;
      border: none;
      transition: 0.3s;
    }

    .btn-secondary:hover {
      background-color: #495057;
    }

    .text-success {
      color: #27ae60 !important;
    }

    .price-tag {
      font-size: 1.8rem;
      font-weight: bold;
    }

    .product-label {
      font-weight: 600;
      color: #555;
    }

    .btn-upload {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      border-radius: 25px;
      font-weight: 600;
      cursor: pointer;
      border: none;
      box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
    }

    .btn-upload:hover {
      background-color: #2980b9;
    }

    .uploaded-design {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 30%;
        max-height: 30%;
        object-fit: contain;
        z-index: 1;
      }
  </style>
<!-- </head>
<body> -->

<div class="container mt-5">
  <h1 class="text-center mb-5 fw-bold">🎨 Customize Your Product</h1>

  <div class="row justify-content-center">
    <div class="col-md-10 card-style">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0 position-relative text-center">
          <div style="position: relative; display: inline-block;">
            <img src="admin/product/<?php echo $product['file']; ?>" class="product-img img-fluid" alt="Product Image" style="width: 100%; background-color: #f8f8f8;"/>
            <img id="uploadedDesign" class="uploaded-design" style="display:none;" alt="Uploaded Design">

            <!-- Upload Button -->
            <form method="POST" enctype="multipart/form-data" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;"  onsubmit="return false;">
              <input type="file" name="design_file" id="design_file" class="d-none" accept=".jpg,.jpeg,.png,.svg" required>
              <label for="design_file" class="btn btn-upload">📤 Upload Design</label>
              <button  name="upload" class="d-none" id="uploadBtn"></button>
            </form>
          </div>
        </div>

        <div class="col-md-6">
          <h3 class="mb-3"><?php echo $product['product_name']; ?></h3>
          <p class="mb-2 product-label">📂 Category: <span class="text-dark"><?php echo $product['product_category']; ?></span></p>
          <p class="mb-2 product-label">📝 Description: <span class="text-dark"><?php echo $product['product_description']; ?></span></p>
          <p class="mb-4 product-label">💰 Price: <span class="text-success price-tag"><?php echo $product['amount']; ?></span></p>

          <!-- Login check before preview -->
          <?php if (isset($_SESSION['user_id']))
          { ?>
            <form action="cardAdd.php" method="POST" id="addToCartForm">
              <!-- Hidden input to store uploaded filename -->
              <input type="hidden" name="uploaded_image" id="uploaded_image_input">
              <!-- <input type="hidden" name="productID" id="productID" value="<?php echo $productid; ?>"> -->
              <!-- <input type="hidden" name="userID" id="userID" value="<?php echo $userid; ?>"> -->
              <button type="submit" class="btn btn-secondary mt-3">Add To Cart</button>
            </form>
            <?php } else { ?>
              <a href="login.php" onclick="return alert('Please login first');" class="btn btn-secondary mt-3">Add To Cart</a>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="text-center mt-4 p-3 bg-light">
  <p>&copy; 2025 Your E-Commerce Website</p>
</footer>

<!-- Scripts -->
<script>

document.getElementById('design_file').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const formData = new FormData();
  formData.append('design_file', file);
  formData.append('Amount',<?php echo json_encode($product['amount']); ?>);
  // Send file to upload.php
  let log=fetch('upload.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(filename => {
    // Show uploaded image preview
    const uploadedImage = document.getElementById('uploadedDesign');
    uploadedImage.src = 'Admin/product/uploads/' + filename;
    uploadedImage.style.display = 'block';

    // Set hidden input with filename
    console.log(filename);
    document.getElementById('uploaded_image_input').value = filename;

    // Hide upload button
    document.querySelector('label[for="design_file"]').style.display = 'none';
  });
  console.log(log)
});


  const fileInput = document.getElementById('design_file');
  const uploadBtn = document.getElementById('uploadBtn');

  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      uploadBtn.click();
    }
  });

  function alertLogin() {
    alert("Please login first to preview your design.");
    return true;
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
