<?php include('db.php'); ?>

<?php
// Cards Queries
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$totalOrders = $conn->query("SELECT COUNT(*) AS total FROM `order`")->fetch_assoc()['total'];
$totalRevenue = $conn->query("SELECT SUM(amount) AS total FROM payment")->fetch_assoc()['total'];
$pendingOrders = $conn->query("SELECT COUNT(*) AS total FROM `order` WHERE order_status = 'Pending'")->fetch_assoc()['total'];


$recentOrders = $conn->query("SELECT o.order_id, u.username, FROM_UNIXTIME(o.order_date) AS order_date, o.status, o.total_amount
    FROM orders o
    JOIN users u ON o.user_id = u.user_id
    ORDER BY o.order_date DESC
    LIMIT 5");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f4f4f4; }
        .card { display: inline-block; width: 22%; background: white; padding: 20px; margin: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .card h2 { margin: 0 0 10px 0; font-size: 20px; }
        table { width: 100%; background: white; border-collapse: collapse; margin-top: 30px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #333; color: white; }
    </style>
</head>
<body>

    <h1>Admin Dashboard</h1>
    <div>
        <h2>Total Users</h2>
        <p><?php echo $totalUsers; ?></p>
    </div>

    <div >
        <h2>Total Orders</h2>
        <p><?php echo $totalOrders; ?></p>
    </div>

    <div >
        <h2>Total Revenue</h2>
        <p>$<?php echo number_format($totalRevenue, 2); ?></p>
    </div>

    <div>
        <h2>Pending Orders</h2>
        <p><?php echo $pendingOrders; ?></p>
    </div>

    <h2>Recent Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    <?php while($row = $recentOrders->fetch_assoc()); ?>
    <tr>
        <td><?php echo $row["order_id"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["order_date"]; ?></td>
        <td><?php echo $row["order_status"]; ?></td>
        <td>$<?php echo number_format($row["total_amount"], 2); ?></td>
    </tr>
   <?php ?>
    </table>

</body>
</html>
