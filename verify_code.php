<?php
session_start();
$message = "";

// If user tries to access without going through forgot_password.php
if (!isset($_SESSION['reset_code']) || !isset($_SESSION['reset_user'])) {
    header("Location: forgot_password.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_code = trim($_POST['code']);

    if ($entered_code == $_SESSION['reset_code']) {
        // Code is correct, move to reset password
        $_SESSION['code_verified'] = true;
        header("Location: reset_password.php");
        exit();
    } else {
        $message = "<div class='alert alert-danger text-center'>❌ Invalid reset code. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Code | JK App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 w-100" style="max-width: 400px;">
        <h4 class="mb-3 text-center text-primary">🔑 Enter Reset Code</h4>
        <?= $message ?>
        <form method="post">
            <div class="mb-3">
                <label for="code" class="form-label">6-digit Code</label>
                <input type="number" name="code" id="code" required class="form-control" maxlength="6" minlength="6">
            </div>
            <button type="submit" class="btn btn-success w-100">Verify Code</button>
        </form>
        <div class="text-center mt-3">
            <a href="forgot_password.php" class="text-decoration-none">🔁 Resend Code</a>
        </div>
    </div>
</body>
</html>
