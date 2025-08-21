<?php
// Start session and include DB connection
session_start();
require_once 'db.php'; // Make sure this file contains a working PDO $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $mnumber = $_POST['mnumber'];
    $gmail = $_POST['gmail'];
    $address = $_POST['address'];
    $left_lens = $_POST['left_lens'];
    $right_lens = $_POST['right_lens'];
    $frame_option = $_POST['frame_option'];
    $notes = $_POST['notes'];
    $total_price = $_POST['total_price'];

    // Handle image upload if frame_option is upload_frame
    $frame_image = null;
    if ($frame_option === "upload_frame" && isset($_FILES["frame_image"]) && $_FILES["frame_image"]["error"] === 0) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $frame_image = $upload_dir . basename($_FILES["frame_image"]["name"]);
        move_uploaded_file($_FILES["frame_image"]["tmp_name"], $frame_image);
    }

    try {
        $sql = "INSERT INTO prescription_orders 
                (username, mnumber, gmail, address, left_lens, right_lens, frame_option, frame_image, notes, total_price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $username, $mnumber, $gmail, $address, $left_lens, $right_lens, $frame_option,
            $frame_image, $notes, $total_price
        ]);
        echo "<script>alert('✅ Prescription submitted successfully.');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('❌ Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prescription Lens Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container { max-width: 800px; margin-top: 40px; }
        .form-section { background: #f9f9f9; padding: 25px; border-radius: 10px; }
    </style>
</head>
<body>
    <?php include "head.php"; ?>
<div class="container">
    <h2 class="text-center mb-4" style="color: #f9f9f9;">Prescription Lens Upload</h2>

    <form method="POST" enctype="multipart/form-data" class="form-section">
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mobile Number</label>
            <input type="text" name="mnumber" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="gmail" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Left Lens Power</label>
                <input type="text" name="left_lens" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Right Lens Power</label>
                <input type="text" name="right_lens" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Frame Option</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="frame_option" value="shop_frame" checked onchange="handleFrameOption(this.value)">
                <label class="form-check-label">Shop Frame (₹1500)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="frame_option" value="upload_frame" onchange="handleFrameOption(this.value)">
                <label class="form-check-label">Upload Frame (Free)</label>
            </div>
        </div>

        <div class="mb-3" id="frameUploadSection" style="display: none;">
            <label>Upload Frame Image</label>
            <input type="file" name="frame_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Additional Notes</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Total Price (₹)</label>
            <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success w-100">Submit Prescription</button>
    </form>
</div>

<script>
    const framePrice = 1500;
    const lensPrice = 0; // Assuming lenses are included in shop frame, adjust if needed

    function handleFrameOption(option) {
        const uploadSection = document.getElementById('frameUploadSection');
        const totalPriceField = document.getElementById('total_price');

        if (option === 'upload_frame') {
            uploadSection.style.display = 'block';
            totalPriceField.value = 0;
            alert("ℹ️ You're uploading your own frame. No frame cost will be added.");
        } else {
            uploadSection.style.display = 'none';
            totalPriceField.value = framePrice;
        }
    }

    window.onload = () => {
        handleFrameOption(document.querySelector('input[name="frame_option"]:checked').value);
    };
</script>
<?php include "footar.php"; ?>
</body>
</html>
