<?php
session_start();
require_once "db.php";

// ✅ Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("
        SELECT id, total_price, created_at, payment_status, payment_proof 
        FROM orders 
        WHERE user_id = :uid 
        ORDER BY created_at DESC
    ");
    $stmt->execute(['uid' => $userId]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 50px; }
        .table thead { background-color: #003366; color: white; }
        .proof-img { width: 60px; height: 60px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">🛍 Your Shopping History</h2>

    <?php if (empty($orders)): ?>
        <div class="alert alert-info">You have no previous orders.</div>
    <?php else: ?>
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total Price (₹)</th>
                    <th>Status</th>
                    <th>Payment Proof</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['id']) ?></td>
                        <td><?= date("d M Y, h:i A", strtotime($order['created_at'])) ?></td>
                        <td><?= number_format($order['total_price'], 2) ?></td>
                        <td>
                            <?php if ($order['payment_status'] === 'Completed'): ?>
                                <span class="badge bg-success">Completed</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!empty($order['payment_proof'])): ?>
                                <a href="<?= htmlspecialchars($order['payment_proof']) ?>" target="_blank">
                                    <img src="<?= htmlspecialchars($order['payment_proof']) ?>" class="proof-img" alt="Payment Proof">
                                </a>
                            <?php else: ?>
                                <span class="badge bg-secondary">No Proof</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($order['payment_status'] !== 'Completed'): ?>
                                <a href="payment.php?order_id=<?= $order['id'] ?>" class="btn btn-sm btn-primary">Upload Proof</a>
                            <?php else: ?>
                                <a href="payment.php?order_id=<?= $order['id'] ?>" class="btn btn-sm btn-outline-success">View</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
