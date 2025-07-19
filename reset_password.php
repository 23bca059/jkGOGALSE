<?php
session_start();
require 'db.php';

$message = "";

// Only allow if reset_code was verified
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
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $username = $_SESSION['reset_user'];

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->execute([$hashed, $username]);

        // Clear session
        unset($_SESSION['reset_code'], $_SESSION['reset_user'], $_SESSION['code_verified']);

        $message = "<div class='alert alert-success text-center'>✅ Password reset successful. <a href='login.php'>Click here to login</a></div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password | JK App</title>
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
        <h4 class="mb-3 text-center">🔒 Reset Your Password</h4>
        <?= $message ?>
        <form method="post">
            <div class="mb-3">
                <label>New Password:</label>
                <input type="password" name="new_password" required class="form-control">
            </div>
            <div class="mb-3">
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" required class="form-control">
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
<?php
session_start();
require 'db.php';

$message = "";

// Check if session data exists
if (!isset($_SESSION['reset_user'], $_SESSION['reset_code'], $_SESSION['reset_expires'])) {
    header("Location: forgot_password.php");
    exit;
}

// Check if code is expired
if (time() > $_SESSION['reset_expires']) {
    $message = "<div class='alert alert-danger text-center'>⏰ Reset code has expired. Please try again.</div>";
    session_unset();
    session_destroy();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_code = trim($_POST['reset_code']);
    $new_password = trim($_POST['new_password']);

    if ($entered_code === strval($_SESSION['reset_code']) && !empty($new_password)) {
        if (strlen($new_password) < 6) {
            $message = "<div class='alert alert-warning text-center'>⚠️ Password must be at least 6 characters.</div>";
        } else {
            $hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $username = $_SESSION['reset_user'];

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->execute([$hashed, $username]);

            session_unset();
            session_destroy();

            $message = "<div class='alert alert-success text-center'>✅ Password reset successful. <a href='login.php'>Login</a></div>";
        }
    } else {
        $message = "<div class='alert alert-danger text-center'>❌ Invalid code or password.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password | JK App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function togglePassword() {
            const field = document.querySelector("input[name='new_password']");
            field.type = field.type === 'password' ? 'text' : 'password';
        }
    </script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h4 class="mb-3 text-center">🔒 Reset Your Password</h4>
        <?= $message ?>
        <?php if (isset($_SESSION['reset_code']) && time() <= $_SESSION['reset_expires']): ?>
        <form method="post">
            <div class="mb-3">
                <label>Enter Reset Code:</label>
                <input type="text" name="reset_code" required class="form-control">
            </div>
            <div class="mb-3">
                <label>New Password:</label>
                <input type="password" name="new_password" required class="form-control">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" onclick="togglePassword()" class="form-check-input" id="showPass">
                <label class="form-check-label" for="showPass">Show Password</label>
            </div>
            <button class="btn btn-success w-100">Reset Password</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>

