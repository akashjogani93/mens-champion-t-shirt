<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="dashboard.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
  }

  .sidebar {
    width: 220px;
    background: linear-gradient(180deg, #2c2c54, #1e1e2f);
    color: white;
    height: 100vh;
    padding: 20px 0;
    box-shadow: 2px 0 5px rgba(0,0,0,0.2);
  }

  .sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
  }

  .sidebar ul {
    list-style-type: none;
    padding-left: 0;
  }

  .sidebar ul li {
    padding: 15px 20px;
  }

  .sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
  }

  .sidebar ul li:hover {
    background-color: #3b3b5f;
    transition: background-color 0.3s ease;
  }

  .sidebar ul li a:hover {
    color: #ffd369;
  }
</style>

<div class="sidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/dashboard.php">Dashboard</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/user/read.php">Users</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/product-category/read.php">Products-Category</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/product/read.php">Products</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/order/read.php">Orders</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/payment/read.php">Payments</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/report.php">Report</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/Admin/contact.php">Contacted Details</a></li>
    <li><a href="/mens-champion-t-shirt/Admin/logout.php">logout</a></li>
  </ul>
</div>