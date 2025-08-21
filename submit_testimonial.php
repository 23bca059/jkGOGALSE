<?php
include 'db.php'; // this gives you $conn as a PDO object

try {
    // Collect form data
    $type = $_POST['type'];
    $rating = $_POST['rating'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Prepare insert statement
    $sql = "INSERT INTO testimonials (name, type, comment, rating) VALUES (:name, :type, :comment, :rating)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters safely
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':comment', $message);
    $stmt->bindParam(':rating', $rating);
    
    // Execute
    if ($stmt->execute()) {
        echo "<div style='text-align:center;margin-top:50px;'><h3 style='color:green;'>✅ Testimonial submitted successfully!</h3></div>";
    } else {
        echo "<div style='text-align:center;margin-top:50px;'><h3 style='color:red;'>❌ Failed to submit testimonial.</h3></div>";
    }
} catch (PDOException $e) {
    echo "❌ Database error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Testimonial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .input-group-text {
            width: 42px;
            justify-content: center;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Submit a Testimonial</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success">Thank you! Your testimonial has been submitted.</div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="submit_testimonial.php" method="POST" class="mx-auto" style="max-width: 600px;">
        
        <!-- User Type -->
        <div class="mb-3">
            <label class="form-label">User Type <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
                <select class="form-select" name="type" required>
                    <option value="">Select Type</option>
                    <option value="Customer">Customer</option>
                    <option value="Seller">Seller</option>
                    <option value="Whole Seller">Whole Seller</option>
                    <option value="Retail Seller">Retail Seller</option>
                    <option value="Retail Customer">Retail Customer</option>
                    <option value="Offline Customer">Offline Customer</option>
                </select>
            </div>
        </div>

        <!-- Rating -->
        <div class="mb-3">
            <label class="form-label">Rating <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-star"></i></span>
                <select class="form-select" name="rating" required>
                    <option value="">Select Rating</option>
                    <option value="5">★★★★★ - Excellent</option>
                    <option value="4">★★★★☆ - Good</option>
                    <option value="3">★★★☆☆ - Average</option>
                    <option value="2">★★☆☆☆ - Poor</option>
                    <option value="1">★☆☆☆☆ - Bad</option>
                </select>
            </div>
        </div>

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
        </div>

        <!-- Message -->
        <div class="mb-3">
            <label class="form-label">Message <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-comment"></i></span>
                <textarea name="message" rows="4" class="form-control" placeholder="Your testimonial..." required></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-dark px-4 py-2"><i class="fas fa-paper-plane me-2"></i>Submit</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
