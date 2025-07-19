<?php
session_start();
require 'db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    if (!empty($username) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
        $stmt->execute([$username, $email]);

        if ($stmt->rowCount() > 0) {
            $reset_code = rand(100000, 999999);

            // Save to session
            $_SESSION['reset_user'] = $username;
            $_SESSION['reset_code'] = $reset_code;
            $_SESSION['reset_expires'] = time() + (5 * 60); // 5 minutes

            // Email content
            $subject = "🔐 JK App Password Reset Code";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";
            $headers .= "From: JK App <youremail@gmail.com>\r\n";

            $body = "
                <html>
                <body>
                    <h3>Hello, <strong>$username</strong></h3>
                    <p>Your password reset code is:</p>
                    <h2 style='background:#f0f0f0; padding:10px; text-align:center;'>$reset_code</h2>
                    <p>This code will expire in 5 minutes.</p>
                    <p>— JK App Team</p>
                </body>
                </html>
            ";

            if (mail($email, $subject, $body, $headers)) {
                $message = "<div class='alert alert-success text-center'>✅ Reset code sent to your email.</div>";
            } else {
                // Show code directly for local testing
                $message = "<div class='alert alert-warning text-center'>
                    ⚠️ Mail failed. Use this code: <strong>$reset_code</strong>
                </div>";
            }

            // Optional: redirect to verify_code.php
            // header("Location: verify_code.php"); exit;
        } else {
            $message = "<div class='alert alert-danger text-center'>❌ Username or email not found.</div>";
        }
    } else {
        $message = "<div class='alert alert-warning text-center'>⚠️ Please enter valid inputs.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | JK App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4 w-100" style="max-width: 400px;">
        <h4 class="mb-3 text-center text-primary">🔐 Forgot Password</h4>
        <?= $message ?>
        <form method="post" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">👤 Username</label>
                <input type="text" name="username" id="username" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">📧 Email</label>
                <input type="email" name="email" id="email" required class="form-control">
            </div>
            <button class="btn btn-primary w-100" type="submit">Send Reset Code</button>
        </form>
        <div class="text-center mt-3">
            <a href="login.php" class="text-decoration-none">🔙 Back to Login</a>
        </div>
    </div>
</body>
</html>
