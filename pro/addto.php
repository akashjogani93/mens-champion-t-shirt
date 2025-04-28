<?php
session_start();

// Dummy product list
$products = [
  1 => ['name' => 'Custom T-Shirt', 'price' => 25],
  2 => ['name' => 'Print Hoodie', 'price' => 40],
  3 => ['name' => 'Mug with Logo', 'price' => 15],
];

// Handle add to cart
if (isset($_GET['add'])) {
  $id = $_GET['add'];
  if (isset($products[$id])) {
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    header('Location: cart.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Print-On-Demand Shop</title>
</head>
<body>
  <h1>Products</h1>
  <ul>
    <?php foreach ($products as $id => $p): ?>
      <li>
        <strong><?= $p['name'] ?></strong> - $<?= $p['price'] ?>
        <a href="?add=<?= $id ?>">Add to Cart</a>
      </li>
    <?php endforeach; ?>
  </ul>
  <a href="cart.php">🛒 View Cart</a>
</body>
</html>
