<?php
session_start();
require_once "db.php";

// ✅ Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// ✅ CSRF token generation
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ✅ Fetch cart items
$stmt = $conn->query("SELECT * FROM cart");
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ✅ Calculate total price
$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['price']; // If quantity exists: $item['price'] * $item['quantity']
}

// ✅ Proceed to checkout
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['checkout'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token. Please refresh the page and try again.");
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];

    // Insert into orders table
    $stmt = $conn->prepare("
        INSERT INTO orders (name, address, city, zip, phone, total_price, user_id) 
        VALUES (:name, :address, :city, :zip, :phone, :total_price, :user_id)
    ");
    $stmt->execute([
        'name' => $name,
        'address' => $address,
        'city' => $city,
        'zip' => $zip,
        'phone' => $phone,
        'total_price' => $totalPrice,
        'user_id' => $_SESSION['user_id']
    ]);

    $order_id = (int)$conn->lastInsertId();

    // ✅ Prepare items list for history table
    $itemNames = [];
    foreach ($cartItems as $item) {
        $itemNames[] = $item['name'] . " (₹" . $item['price'] . ")";
    }
    $itemsString = implode(", ", $itemNames);

    // ✅ Insert into shopping_history table
    $stmtHistory = $conn->prepare("
        INSERT INTO shopping_history (user_id, items, total_price, payment_status) 
        VALUES (:user_id, :items, :total_price, 'Pending')
    ");
    $stmtHistory->execute([
        'user_id' => $_SESSION['user_id'],
        'items' => $itemsString,
        'total_price' => $totalPrice
    ]);

    // ✅ Store order ID and total in session for payment.php
    $_SESSION['payment'] = [
        'order_id'    => $order_id,
        'total_price' => (float)$totalPrice,
        'created_at'  => time()
    ];

    // Redirect to payment.php
    header("Location: payment.php?order_id=" . $order_id);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGalse Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background-color: #085765; }
        .checkout-item { border-radius: 10px; background-color: #fff; margin-bottom: 15px; padding: 10px; }
        .total-price { font-size: 1.5rem; font-weight: bold; }
    </style>
</head>
<body>
<?php include "head.php"; ?>

<div class="container my-5">
    <div class="card p-4 shadow">
        <h2 class="mb-4 text-center text-primary">Checkout</h2>

        <?php if ($cartItems): ?>
            <div class="list-group mb-4">
                <?php foreach ($cartItems as $item): ?>
                    <div class="list-group-item checkout-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="img-thumbnail" style="width: 80px; height: 80px;">
                            <div class="details ms-3">
                                <h5 class="mb-1"><?= htmlspecialchars($item['name']) ?></h5>
                                <p class="mb-0 text-muted">Price: ₹<?= number_format($item['price'], 2) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mb-4">
                <h3 class="total-price text-end text-success">Total: ₹<?= number_format($totalPrice, 2) ?></h3>
            </div>

            <h4 class="text-primary">Shipping Information</h4>
            <form method="POST" class="mt-3">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="col-md-6">
                        <label for="zip" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" name="checkout" class="btn btn-primary px-4">Proceed to Payment</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                Your cart is empty. Please add items to your cart first.
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
