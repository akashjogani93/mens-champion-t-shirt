<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);

  if (empty($_SESSION['cart'])) {
    echo "Cart is empty.";
    exit;
  }

  // Dummy product list (again, should ideally come from DB)
  $products = [
    1 => ['name' => 'Custom T-Shirt', 'price' => 25],
    2 => ['name' => 'Print Hoodie', 'price' => 40],
    3 => ['name' => 'Mug with Logo', 'price' => 15],
  ];

  $total = 0;
  $details = "";
  foreach ($_SESSION['cart'] as $id => $qty) {
    $product = $products[$id];
    $line = "{$product['name']} x{$qty} = $" . ($qty * $product['price']) . "\n";
    $details .= $line;
    $total += $qty * $product['price'];
  }

  // Simulate saving order
  $order_summary = "New Order from $name <$email>\n\n$details\nTotal: $$total";
  file_put_contents("orders.txt", $order_summary . "\n\n", FILE_APPEND);

  // Clear cart
  unset($_SESSION['cart']);

  echo "<h2>Thank you, $name! Your order has been placed.</h2>";
  echo "<pre>$order_summary</pre>";
  echo '<a href="index.php">← Back to Shop</a>';
} else {
  echo "Invalid request.";
}
?>
