<?php
require 'database.php';
$orders = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary - PS Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { background-color: #161C24; color: white; padding: 20px; }
        .summary-container { background: rgba(255, 255, 255, 0.05); border-radius: 12px; padding: 30px; }
        table { color: white !important; }
        th { background-color: #E2c785 !important; color: #161C24 !important; }
    </style>
</head>
<body>
    <div class="container summary-container mt-5">
        <h2 class="mb-4" style="color: #E2c785;">Order Summary Dashboard</h2>
        <a href="main.php" class="btn btn-outline-light mb-4">Back to Menu</a>
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Cashier ID</th>
                    <th>Date & Time</th>
                    <th>Payment Method</th>
                    <th>Total Amount (Rs.)</th>
                    <th>Items Purchased</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orders && $orders->num_rows > 0): ?>
                    <?php while($order = $orders->fetch_assoc()): ?>
                        <tr>
                            <td>#<?php echo $order['id']; ?></td>
                            <td><?php echo htmlspecialchars($order['cashier_id']); ?></td>
                            <td><?php echo date('Y-m-d h:i A', strtotime($order['order_date'])); ?></td>
                            <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
                            <td><?php echo number_format($order['total_amount'], 2); ?></td>
                            <td>
                                <ul style="margin: 0; padding-left: 20px;">
                                <?php
                                $order_id = $order['id'];
                                $items = $conn->query("SELECT * FROM order_items WHERE order_id = $order_id");
                                while ($item = $items->fetch_assoc()) {
                                    echo "<li>" . htmlspecialchars($item['item_name']) . " x" . $item['quantity'] . " (" . number_format($item['item_total'], 2) . ")</li>";
                                }
                                ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
