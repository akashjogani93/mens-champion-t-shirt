<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $result = $conn->query("SELECT * FROM products WHERE product_id = '$product_id'");
    $product = $result->fetch_assoc();
    $total_amount = $product['price'] * $quantity;

    // Assume the customer is logged in, fetch customer data
    $customer_id = 1; // Replace with actual customer session

    // Insert into orders table
    $conn->query("INSERT INTO orders (customer_id, total_amount) VALUES ('$customer_id', '$total_amount')");
    $order_id = $conn->insert_id;

    // Insert into order_items table
    $conn->query("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '".$product['price']."')");

    echo "<h2>Order placed successfully!</h2>";
}
?>
