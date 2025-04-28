<?php
include 'includes/db.php';

$product_id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE product_id = '$product_id'");
$product = $result->fetch_assoc();
?>
<?php include 'includes/header.php'; ?>

<div class="product-detail">
    <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <h1><?php echo $product['name']; ?></h1>
    <p><?php echo $product['description']; ?></p>
    <p>$<?php echo $product['price']; ?></p>
    <form action="checkout.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <input type="number" name="quantity" min="1" value="1">
        <button type="submit">Add to Cart</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
