<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="dashboard.css" />
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

  .main-content {
    flex-grow: 1;
    padding: 20px;
    background: linear-gradient(to bottom, #f4f4f9, #e6e6f0);
  }

  header h1 {
    font-size: 2rem;
    color: #2c2c54;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
  }

  .cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
  }

  .card {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    flex: 1 1 200px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
  }

  .card h3 {
    margin-top: 0;
    color: #333;
    font-weight: 600;
  }

  .card p {
    font-size: 1.4rem;
    font-weight: bold;
    color: #444;
  }
</style>

<div class="sidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li><a href="#">Dashboard</a></li>
    <li><a href="user/read.php">Users</a></li>
    <li><a href="product/read.php">Products</a></li>
    <li><a href="#">Orders</a></li>
    <li><a href="#">Payments</a></li>
    <li><a href="#">Settings</a></li>
  </ul>
</div>

<div class="main-content">
  <header>
    <h1>Dashboard Overview</h1>
  </header>

  <div class="cards">
    <div class="card">
      <h3>Total Users</h3>
      <p id="userCount">123</p>
    </div>
    <div class="card">
      <h3>Total Orders</h3>
      <p id="orderCount">258</p>
    </div>
    <div class="card">
      <h3>Revenue</h3>
      <p>$15,300</p>
    </div>
  </div>
</div>

<script src="dashboard.js"></script>
</body>
</html>
