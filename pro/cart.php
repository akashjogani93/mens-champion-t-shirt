<?php
session_start();

// Dummy product list (same as in index.php)
$products = [
  1 => ['name' => 'Custom T-Shirt', 'price' => 25],
  2 => ['name' => 'Print Hoodie', 'price' => 40],
  3 => ['name' => 'Mug with Logo', 'price' => 15],
];

// Remove item
if (isset($_GET['remove'])) {
  $id = $_GET['remove'];
  unset($_SESSION['cart'][$id]);
  header('Location: cart.php');
  exit;
}

// Calculate total
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Cart</title>
</head>
<body>
  <h1>Cart</h1>
  <?php if (!empty($_SESSION['cart'])): ?>
    <table border="1" cellpadding="10">
      <tr><th>Product</th><th>Qty</th><th>Price</th><th>Remove</th></tr>
      <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
        <tr>
          <td><?= $products[$id]['name'] ?></td>
          <td><?= $qty ?></td>
          <td>$<?= $qty * $products[$id]['price'] ?></td>
          <td><a href="?remove=<?= $id ?>">Remove</a></td>
        </tr>
        <?php $total += $qty * $products[$id]['price']; ?>
      <?php endforeach; ?>
    </table>
    <p><strong>Total: $<?= $total ?></strong></p>
    <form action="order.php" method="post">
      <input type="text" name="name" placeholder="Your Name" required><br><br>
      <input type="email" name="email" placeholder="Email" required><br><br>
      <input type="submit" value="Place Order">
    </form>
  <?php else: ?>
    <p>Your cart is empty.</p>
  <?php endif; ?>
  <br><a href="index.php">← Continue Shopping</a>
</body>
</html>
