<?php
session_start();
require_once "db.php";

// ✅ Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// ✅ Get order_id from GET or SESSION
if (isset($_GET['order_id'])) {
    $order_id = (int) $_GET['order_id'];
} elseif (isset($_SESSION['payment']['order_id'])) {
    $order_id = (int) $_SESSION['payment']['order_id'];
} else {
    die("No order found. Please checkout again.");
}

// ✅ Fetch order info and ensure it belongs to the logged-in user
$stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
$stmt->execute([$order_id, $user_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    die("Order not found or unauthorized access.");
}

// ✅ Handle payment proof upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['payment_proof'])) {
    $uploadDir = "uploads/payment_proofs/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName   = time() . "_" . basename($_FILES["payment_proof"]["name"]);
    $targetFile = $uploadDir . $fileName;
    $fileType   = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileType, $allowedTypes)) {
        die("❌ Only JPG, JPEG, PNG & GIF files are allowed.");
    }

    if (move_uploaded_file($_FILES["payment_proof"]["tmp_name"], $targetFile)) {
        // ✅ Update only THIS order
        $stmt = $conn->prepare("
            UPDATE orders 
            SET payment_proof = ?, payment_status = 'Completed' 
            WHERE id = ? AND user_id = ?
        ");
        $stmt->execute([$targetFile, $order_id, $user_id]);

        $successMsg = "✅ Payment proof uploaded successfully. Your payment is now marked as Completed.";

        // Refresh order details
        $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
        $stmt->execute([$order_id, $user_id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        die("❌ Error uploading file.");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php require_once  "head.php"; ?>

<div class="container my-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center text-primary">Complete Your Payment</h2>

        <?php if (!empty($successMsg)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($successMsg) ?></div>
        <?php endif; ?>

        <p><strong>Order ID:</strong> <?= htmlspecialchars($order['id']) ?></p>
        <p><strong>Total Price:</strong> ₹<?= number_format($order['total_price'], 2) ?></p>
        <p><strong>Payment Status:</strong> 
            <span class="badge <?= $order['payment_status'] === 'Completed' ? 'bg-success' : 'bg-warning' ?>">
                <?= htmlspecialchars($order['payment_status']) ?>
            </span>
        </p>

        <!-- QR Payment Instructions -->
        <div class="mb-4 text-center">
            <h5>Scan to Pay (Demo QR)</h5>
            <img src="demo-qr.png" alt="QR Code" style="width:200px;">
            <p class="text-muted">After payment, upload your screenshot/photo as proof.</p>
        </div>

        <!-- Upload Payment Proof Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Upload Payment Proof (Image)</label>
                <input type="file" name="payment_proof" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Proof</button>
            <a href="shopping-history.php" class="btn btn-secondary">Back to History</a>
        </form>
    </div>
</div>

<?php require_once  "footar.php"; ?>
</body>
</html>
