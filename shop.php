
<?php
require_once "db.php"; // Make sure db.php has $host, $dbname, $user, $password

// Establishing database connection with timeout handling
try {
    // Set the timeout to 30 seconds (adjust as needed)
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 3 // 30 seconds timeout
    ]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle Add to Cart
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Fetch product details
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Insert into cart table (you must create the 'cart' table if it doesn't exist)
        $cartStmt = $conn->prepare("INSERT INTO cart (product_id, name, price, image) VALUES (:id, :name, :price, :image)");
        $cartStmt->execute([
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image']
        ]);
    }

    // Redirect to avoid form resubmission
    header("Location: shop.php?type=" . urlencode($_GET['type'] ?? '') . "&company=" . urlencode($_GET['company'] ?? ''));
    exit;
}

// Filters
$type = $_GET['type'] ?? '';
$company = $_GET['company'] ?? '';

// Build Query for filtering products
$query = "SELECT * FROM products WHERE 1=1";
$params = [];

if ($type) {
    $query .= " AND type = :type";
    $params['type'] = $type;
}

if ($company) {
    $query .= " AND company = :company";
    $params['company'] = $company;
}

$stmt = $conn->prepare($query);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get filter values for Types and Companies
$types = $conn->query("SELECT DISTINCT type FROM products")->fetchAll(PDO::FETCH_COLUMN);
$companies = $conn->query("SELECT DISTINCT company FROM products")->fetchAll(PDO::FETCH_COLUMN);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SAVANT EYEWEAR - All Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Savant Custom Styles -->
    <link href="css/savant-style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<?php include "head.php"; ?>

<!-- Hero Section -->
<section class="hero" style="padding: 100px 0 60px;">
    <div class="container text-center">
        <h1>ALL PRODUCTS</h1>
        <p class="lead">Featuring our iconic frames, this collection draws inspiration from the unique mix of downtown living. The frames are designed to be excellent that are synonymous with urban life, while also offering the comfort and functionality.</p>
    </div>
</section>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="filter-sidebar" style="background: var(--white); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow); position: sticky; top: 120px;">
                <h5 class="mb-4" style="color: var(--text-dark); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                    <i class="fas fa-filter me-2" style="color: var(--primary-gold);"></i>FILTERS
                </h5>
                
                <form method="GET">
                    <!-- Type Filter -->
                    <div class="filter-section mb-4">
                        <h6 class="filter-title" style="color: var(--text-dark); font-weight: 600; margin-bottom: 1rem; text-transform: uppercase; font-size: 0.9rem;">EYEGLASSES</h6>
                        <?php foreach ($types as $typeOption): ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="type" value="<?= htmlspecialchars($typeOption) ?>" <?= $type == $typeOption ? 'checked' : '' ?> onchange="this.form.submit()" style="border-color: var(--primary-gold);">
                                <label class="form-check-label" style="color: var(--text-light); font-size: 0.9rem;"><?= htmlspecialchars($typeOption) ?></label>
                            </div>
                        <?php endforeach; ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="type" value="" <?= $type == '' ? 'checked' : '' ?> onchange="this.form.submit()" style="border-color: var(--primary-gold);">
                            <label class="form-check-label" style="color: var(--text-light); font-size: 0.9rem;">All Types</label>
                        </div>
                    </div>
                    
                    <hr style="border-color: var(--border-light);">
                    
                    <!-- Company Filter -->
                    <div class="filter-section">
                        <h6 class="filter-title" style="color: var(--text-dark); font-weight: 600; margin-bottom: 1rem; text-transform: uppercase; font-size: 0.9rem;">SUNGLASSES</h6>
                        <?php foreach ($companies as $companyOption): ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="company" value="<?= htmlspecialchars($companyOption) ?>" <?= $company == $companyOption ? 'checked' : '' ?> onchange="this.form.submit()" style="border-color: var(--primary-gold);">
                                <label class="form-check-label" style="color: var(--text-light); font-size: 0.9rem;"><?= htmlspecialchars($companyOption) ?></label>
                            </div>
                        <?php endforeach; ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="company" value="" <?= $company == '' ? 'checked' : '' ?> onchange="this.form.submit()" style="border-color: var(--primary-gold);">
                            <label class="form-check-label" style="color: var(--text-light); font-size: 0.9rem;">All Brands</label>
                        </div>
                    </div>
                </form>
                
                <!-- Sort Dropdown -->
                <div class="mt-4">
                    <label class="form-label" style="color: var(--text-dark); font-weight: 600; text-transform: uppercase; font-size: 0.9rem;">SORT BY</label>
                    <select class="form-select" style="border-color: var(--primary-gold);">
                        <option>Most Recommended</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest First</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9 col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 style="color: var(--text-dark); margin: 0;">
                    <?php if ($type || $company): ?>
                        Filtered Results
                    <?php else: ?>
                        All Products
                    <?php endif ?>
                    <small class="text-muted">(<?= count($products) ?> items)</small>
                </h4>
            </div>
            
            <div class="row g-4">
                <?php if ($products): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-card">
                                <div class="product-image-container" style="position: relative; overflow: hidden;">
                                    <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>" style="height: 250px; object-fit: cover;">
                                    <div class="product-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(244, 185, 66, 0.9); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: center; justify-content: center;">
                                        <button class="btn btn-light" style="border-radius: 50px; padding: 0.5rem 1.5rem; font-weight: 600;">Quick View</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;"><?= htmlspecialchars($product['name']) ?></h5>
                                    <p class="card-text text-muted" style="font-size: 0.9rem; margin-bottom: 1rem;"><?= htmlspecialchars($product['description']) ?></p>
                                    <div class="price" style="font-size: 1.3rem; font-weight: 700; color: var(--primary-gold); margin-bottom: 1rem;">$<?= number_format($product['price'], 2) ?></div>
                                    <div class="rating mb-2">
                                        <span class="text-warning">★★★★★</span>
                                        <small class="text-muted">(<?= rand(50, 200) ?> reviews)</small>
                                    </div>
                                    <form method="POST" class="d-grid">
                                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                        <button type="submit" class="btn" style="background: var(--primary-gold); border: none; color: var(--dark-bg); font-weight: 600; padding: 0.75rem; border-radius: 8px; transition: all 0.3s ease;">
                                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center" style="padding: 4rem 0;">
                        <i class="fas fa-search" style="font-size: 4rem; color: var(--primary-gold); margin-bottom: 1rem;"></i>
                        <h4 style="color: var(--text-dark); margin-bottom: 1rem;">No Products Found</h4>
                        <p class="text-muted">Try adjusting your filters or browse all products.</p>
                        <a href="shop.php" class="btn btn-primary">View All Products</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.product-card:hover .product-overlay {
    opacity: 1;
}

.form-check-input:checked {
    background-color: var(--primary-gold);
    border-color: var(--primary-gold);
}

.form-select:focus {
    border-color: var(--primary-gold);
    box-shadow: 0 0 0 0.2rem rgba(244, 185, 66, 0.25);
}
</style>

<!-- Footer -->
<?php include "footar.php"; ?>

<!-- Scroll to Top Button -->
<button class="scroll-top" id="scrollTop">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
// Scroll to Top Functionality
const scrollTopBtn = document.getElementById('scrollTop');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollTopBtn.classList.add('show');
    } else {
        scrollTopBtn.classList.remove('show');
    }
});

scrollTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Navbar Scroll Effect
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Add fade-in animation to product cards
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
        }
    });
}, observerOptions);

document.querySelectorAll('.product-card').forEach(el => {
    observer.observe(el);
});
</script>
</body>
</html>
