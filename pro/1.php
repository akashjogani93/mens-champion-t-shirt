<?php include 'includes/header.php'; ?>
<div class="product-list">
    <?php
    include 'includes/db1.php';
    $result = $conn->query("SELECT * FROM product");

    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-item">';
        echo '<img src="assets/images/'.$row['image'].'" alt="'.$row['name'].'">';
        echo '<h2>'.$row['name'].'</h2>';
        echo '<p>'.$row['description'].'</p>';
        echo '<p>$'.$row['price'].'</p>';
        echo '<a href="product-detail.php?id='.$row['product_id'].'">View Details</a>';
        echo '</div>';
    }
    ?>
</div>
<?php include 'includes/footer.php'; ?>
