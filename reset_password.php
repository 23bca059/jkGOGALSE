<?php
session_start();
require 'db.php';

$message = "";

// Only allow access if reset_code was verified
if (!isset($_SESSION['reset_user']) || !isset($_SESSION['code_verified'])) {
    header("Location: forgot_password.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($new_password) || empty($confirm_password)) {
        $message = "<div class='alert alert-warning text-center'>⚠️ All fields are required.</div>";
    } elseif ($new_password !== $confirm_password) {
        $message = "<div class='alert alert-danger text-center'>❌ Passwords do not match.</div>";
    } elseif (strlen($new_password) < 6) {
        $message = "<div class='alert alert-warning text-center'>⚠️ Password must be at least 6 characters.</div>";
    } else {
        // Hash and update
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $username = $_SESSION['reset_user'];

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        if ($stmt->execute([$hashed, $username])) {
            // Clear session
            session_unset();
            session_destroy();

            $message = "<div class='alert alert-success text-center'>✅ Password reset successful. <a href='login.php'>Login here</a></div>";
        } else {
            $message = "<div class='alert alert-danger text-center'>❌ Something went wrong. Try again.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password | JK App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function togglePassword() {
            const fields = document.querySelectorAll("input[type='password']");
            fields.forEach(field => {
                field.type = field.type === 'password' ? 'text' : 'password';
            });
        }
    </script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h4 class="mb-3 text-center text-success">🔐 Reset Your Password</h4>
        <?= $message ?>
        <form method="post">
            <div class="mb-3">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required class="form-control">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" onclick="togglePassword()" class="form-check-input" id="showPass">
                <label class="form-check-label" for="showPass">Show Password</label>
            </div>
            <button class="btn btn-success w-100">Reset Password</button>
        </form>
    </div>
</body>
</html>
