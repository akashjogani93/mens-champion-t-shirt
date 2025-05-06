<?php 
  include("nav.php");
  $conn = mysqli_connect('localhost','root','','project');
?>

<style>
  
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

<?php 
$userResult = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM user");
$userRow = mysqli_fetch_assoc($userResult);
$totalUsers = $userRow['total_users'];

$orderResult = mysqli_query($conn, "SELECT COUNT(*) AS total_orders FROM orders WHERE `order_status`='Delevered'");
$orderRow = mysqli_fetch_assoc($orderResult);
$totalOrders = $orderRow['total_orders'];

$revenueResult = mysqli_query($conn, "SELECT SUM(amount) AS total_revenue FROM payment WHERE `status`='completed'");
$revenueRow = mysqli_fetch_assoc($revenueResult);
$totalRevenue = $revenueRow['total_revenue'];
?>
<div class="main-content">
  <header>
    <h1>Dashboard Overview</h1>
  </header>

  <div class="cards">
    <div class="card">
      <h3>Total Users</h3>
      <p id="userCount"><?php echo $totalUsers; ?></p>
    </div>
    <div class="card">
      <h3>Total Orders Completed</h3>
      <p id="orderCount"><?php echo $totalOrders; ?></p>
    </div>
    <div class="card">
      <h3>Revenue</h3>
      <p><?php echo $totalRevenue; ?></p>
    </div>
  </div>
</div>

<script src="dashboard.js"></script>
</body>
</html>
