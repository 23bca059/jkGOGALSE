<?php
session_start();
require 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

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

            // Send via PHPMailer
            $mail = new PHPMailer(true);
            try {
                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'krushaljoshi9@gmail.com';        // 🔁 Replace
                $mail->Password = 'vcghngifxdfwzhjv';           // 🔁 Replace with App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Sender and recipient
                $mail->setFrom('krushaljoshi9@gmail.com', 'JK App');
                $mail->addAddress($email);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = '🔐 JK App Password Reset Code';
                $mail->Body = "
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

                $mail->send();
                $message = "<div class='alert alert-success text-center'>✅ Reset code sent to your email.</div>";

                // Optional: redirect to code verification page
                // header("Location: verify_code.php"); exit;
            } catch (Exception $e) {
                // Show code directly in local dev environment
                $message = "<div class='alert alert-warning text-center'>
                    ⚠️ Mail failed. Use this code: <strong>$reset_code</strong><br>Error: {$mail->ErrorInfo}
                </div>";
            }

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
