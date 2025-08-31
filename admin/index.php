<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../db.php';

// Get dashboard statistics
try {
    // Total products
    $stmt = $conn->query("SELECT COUNT(*) as total FROM products");
    $totalProducts = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Total orders (assuming you have an orders table)
    $stmt = $conn->query("SELECT COUNT(*) as total FROM cart");
    $totalOrders = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Total testimonials
    $stmt = $conn->query("SELECT COUNT(*) as total FROM testimonials");
    $totalTestimonials = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Recent products
    $stmt = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT 5");
    $recentProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Recent testimonials
    $stmt = $conn->query("SELECT * FROM testimonials ORDER BY id DESC LIMIT 5");
    $recentTestimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGalse Admin Dashboard</title>
    
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
        
        <!-- Dashboard Content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </h1>
                    <p class="page-subtitle">Welcome back, Admin! Here's what's happening with your store.</p>
                </div>
                
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-glasses"></i>
                            </div>
                            <div class="stat-content">
                                <h3><?= $totalProducts ?></h3>
                                <p>Total Products</p>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 12% from last month
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="stat-icon bg-success">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="stat-content">
                                <h3><?= $totalOrders ?></h3>
                                <p>Total Orders</p>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 8% from last month
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="stat-icon bg-warning">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-content">
                                <h3><?= $totalTestimonials ?></h3>
                                <p>Customer Reviews</p>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 15% from last month
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="stat-icon bg-info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="stat-content">
                                <h3>$12,450</h3>
                                <p>Monthly Revenue</p>
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 23% from last month
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="row">
                    <!-- Recent Products -->
                    <div class="col-lg-8 mb-4">
                        <div class="admin-card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-box me-2"></i>Recent Products
                                </h5>
                                <a href="products.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recentProducts as $product): ?>
                                            <tr>
                                                <td>
                                                    <img src="../<?= htmlspecialchars($product['image']) ?>" 
                                                         alt="<?= htmlspecialchars($product['name']) ?>" 
                                                         class="product-thumb">
                                                </td>
                                                <td><?= htmlspecialchars($product['name']) ?></td>
                                                <td>$<?= number_format($product['price'], 2) ?></td>
                                                <td><span class="badge bg-primary"><?= htmlspecialchars($product['type']) ?></span></td>
                                                <td>
                                                    <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="delete-product.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-outline-danger" 
                                                       onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Reviews -->
                    <div class="col-lg-4 mb-4">
                        <div class="admin-card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fas fa-comments me-2"></i>Recent Reviews
                                </h5>
                                <a href="testimonials.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <?php foreach ($recentTestimonials as $testimonial): ?>
                                <div class="review-item">
                                    <div class="review-header">
                                        <strong><?= htmlspecialchars($testimonial['name']) ?></strong>
                                        <div class="rating">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="fas fa-star <?= $i <= $testimonial['rating'] ? 'text-warning' : 'text-muted' ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <p class="review-text"><?= htmlspecialchars(substr($testimonial['comment'], 0, 100)) ?>...</p>
                                    <small class="text-muted"><?= htmlspecialchars($testimonial['type']) ?></small>
                                </div>
                                <?php endforeach; ?>
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