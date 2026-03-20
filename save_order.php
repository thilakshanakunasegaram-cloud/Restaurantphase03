<?php
require 'database.php';

// Get JSON data from POST request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $totalAmount = $data['totalAmount'];
    $paymentMethod = $data['paymentMethod'];
    $cashierId = isset($data['cashier_id']) ? $data['cashier_id'] : 'Unknown';
    $cartItems = $data['cartItems'];

    // Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders (payment_method, total_amount, cashier_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $paymentMethod, $totalAmount, $cashierId);

    if ($stmt->execute()) {
        $order_id = $conn->insert_id;

        // Insert into order_items table
        $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, item_name, quantity, item_total) VALUES (?, ?, ?, ?)");

        foreach ($cartItems as $item) {
            $name = $item['name'];
            $qty = $item['qty'];
            $price = $item['price'];
            $item_total = $qty * $price;

            $itemStmt->bind_param("isid", $order_id, $name, $qty, $item_total);
            $itemStmt->execute();
        }

        echo json_encode(['success' => true, 'message' => 'Order saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving order']);
    }

    $stmt->close();
    if (isset($itemStmt)) $itemStmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No data received']);
}

$conn->close();
?>
