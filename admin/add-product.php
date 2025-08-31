<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../db.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $type = $_POST['type'] ?? '';
    $company = $_POST['company'] ?? '';
    
    // Handle file upload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/';
        $fileName = time() . '_' . $_FILES['image']['name'];
        $uploadPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            $image = 'images/' . $fileName;
        } else {
            $error = 'Failed to upload image.';
        }
    }
    
    if (!$error && $name && $description && $price && $type && $company && $image) {
        try {
            $stmt = $conn->prepare("INSERT INTO products (name, description, price, type, company, image) VALUES (:name, :description, :price, :type, :company, :image)");
            $stmt->execute([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'type' => $type,
                'company' => $company,
                'image' => $image
            ]);
            $success = 'Product added successfully!';
            
            // Clear form data
            $name = $description = $price = $type = $company = '';
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    } elseif (!$error) {
        $error = 'Please fill all fields and upload an image.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - GoGalse Admin</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Admin Custom Styles -->
    <link href="css/admin-style.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <?php include 'includes/topnav.php'; ?>
        
        <!-- Content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">
                        <i class="fas fa-plus-circle me-2"></i>Add New Product
                    </h1>
                    <p class="page-subtitle">Add a new eyewear product to your inventory</p>
                </div>
                
                <!-- Alerts -->
                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= htmlspecialchars($success) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <?= htmlspecialchars($error) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <!-- Add Product Form -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="admin-card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-info-circle me-2"></i>Product Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Product Name *</label>
                                            <input type="text" class="form-control" id="name" name="name" 
                                                   value="<?= htmlspecialchars($name ?? '') ?>" required>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="price" class="form-label">Price ($) *</label>
                                            <input type="number" step="0.01" class="form-control" id="price" name="price" 
                                                   value="<?= htmlspecialchars($price ?? '') ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description *</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" required><?= htmlspecialchars($description ?? '') ?></textarea>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="type" class="form-label">Type *</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="">Select Type</option>
                                                <option value="Eyeglasses" <?= ($type ?? '') === 'Eyeglasses' ? 'selected' : '' ?>>Eyeglasses</option>
                                                <option value="Sunglasses" <?= ($type ?? '') === 'Sunglasses' ? 'selected' : '' ?>>Sunglasses</option>
                                                <option value="Contact Lenses" <?= ($type ?? '') === 'Contact Lenses' ? 'selected' : '' ?>>Contact Lenses</option>
                                                <option value="Blue Light Glasses" <?= ($type ?? '') === 'Blue Light Glasses' ? 'selected' : '' ?>>Blue Light Glasses</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="company" class="form-label">Brand/Company *</label>
                                            <input type="text" class="form-control" id="company" name="company" 
                                                   value="<?= htmlspecialchars($company ?? '') ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Product Image *</label>
                                        <input type="file" class="form-control" id="image" name="image" 
                                               accept="image/*" required>
                                        <small class="text-muted">Upload a high-quality image of the product (JPG, PNG, GIF)</small>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Add Product
                                        </button>
                                        <a href="products.php" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="admin-card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-lightbulb me-2"></i>Tips
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Use high-quality product images
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Write detailed descriptions
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Set competitive prices
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Choose appropriate categories
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Include brand information
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="js/admin.js"></script>
</body>
</html>