<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard - Print On Demand</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f4f6f8;
      padding: 20px;
    }

    .dashboard {
      display: grid;
      gap: 20px;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    }

    .card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .card h3 {
      font-size: 16px;
      color: #666;
    }

    .card .value {
      font-size: 24px;
      font-weight: bold;
      margin-top: 8px;
      color: #333;
    }

    .chart {
      grid-column: span 2;
    }

    .chart-placeholder {
      width: 100%;
      height: 250px;
      background: repeating-linear-gradient(
        45deg,
        #e0e0e0,
        #e0e0e0 10px,
        #f8f8f8 10px,
        #f8f8f8 20px
      );
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #aaa;
      font-size: 18px;
    }

    .actions button {
      display: block;
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: none;
      border-radius: 6px;
      background: #4f46e5;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    .actions button:hover {
      background: #3730a3;
    }

    .actions button.secondary {
      background: #e5e7eb;
      color: #111;
    }

    .actions button.secondary:hover {
      background: #d1d5db;
    }

    @media (max-width: 768px) {
      .chart {
        grid-column: span 1;
      }
    }
  </style>
</head>
<body>
  <h1 style="margin-bottom: 20px;">Admin Dashboard</h1>
  <div class="dashboard">
    <!-- Summary Cards -->
    <div class="card">
      <h3>Monthly Revenue</h3>
      <div class="value">$12,345</div>
    </div>
    <div class="card">
      <h3>Total Orders</h3>
      <div class="value">278</div>
    </div>
    <div class="card">
      <h3>Pending Shipments</h3>
      <div class="value">32</div>
    </div>
    <div class="card">
      <h3>Top Product</h3>
      <div class="value">Custom Hoodie</div>
    </div>

    <!-- Sales Chart -->
    <div class="card chart">
      <h3>Sales Overview</h3>
      <div class="chart-placeholder">[ Sales Chart Placeholder ]</div>
    </div>

    <!-- Quick Actions -->
    <div class="card actions">
      <h3>Quick Actions</h3>
      <button>Add New Product</button>
      <button class="secondary">View Orders</button>
      <button class="secondary">Manage Inventory</button>
    </div>
  </div>
</body>
</html>
