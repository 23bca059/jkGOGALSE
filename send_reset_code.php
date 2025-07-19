<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Generate a 6-digit random code
        $code = rand(100000, 999999);

        // Store code, email, and expiration (5 minutes)
        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_code'] = $code;
        $_SESSION['code_expires'] = time() + (5 * 60); // 5 minutes from now

        // Email details
        $subject = "Your Password Reset Code";
        $message = "Hi,\n\nYour password reset code is: $code\n\nThis code will expire in 5 minutes.";
        $headers = "From: no-reply@yourdomain.com";

        // Try sending email
        if (mail($email, $subject, $message, $headers)) {
            echo "✅ Reset code sent to your email: <b>$email</b><br><a href='verify_code.php'>Click here to enter code</a>";
        } else {
            echo "❌ Email sending failed. Please try again later or use the code shown below for local testing:<br>";
            echo "<b>Reset Code:</b> $code<br><a href='verify_code.php'>Click here to enter code</a>";
        }

    } else {
        echo "❌ Invalid email address.";
    }
} else {
    // If accessed directly without POST
    header("Location: forgot_password.php");
    exit;
}
?>
