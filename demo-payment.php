<?php
$amount = isset($_GET['amount']) ? number_format((float)$_GET['amount'], 2) : "0.00";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Welcome to GoGalse (Demo)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f9f9f9; font-family: Arial, sans-serif; padding-top: 50px; }
        .success-container { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0px 4px 12px rgba(0,0,0,0.1); text-align: center; }
        .success-icon { font-size: 80px; color: green; }
        .amount { font-size: 24px; margin: 15px 0; }
        .btn-home { background-color: #003366; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; }
        .btn-home:hover { background-color: #002244; }
    </style>
</head>
<body>

<div class="success-container">
    <div class="success-icon">✅</div>
    <h2>Payment Successful (Demo)</h2>
    <p class="amount">₹<?php echo $amount; ?> paid to <strong>Welcome to GoGalse</strong></p>
    <p>Transaction ID: DEMO-<?php echo rand(100000,999999); ?></p>
    <p>This is a simulated transaction for demonstration purposes only.</p>
    <a href="index.php" class="btn-home">Return to Home</a>
</div>

</body>
</html>
