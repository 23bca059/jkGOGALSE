<?php
// Import database connection
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GoGalse</title>
</head>
<body>
<?php require_once "head.php"; ?>

<!-- Hero section -->
<section class="hero">
    <div class="container">
        <h1 class="fade-in">SAVANT EYEWEAR</h1>
        <p class="lead slide-up">Featuring our iconic frames, this collection draws inspiration from the unique mix of downtown living. The frames are designed to be excellent that are synonymous with urban life, while also offering the comfort and functionality.</p>
        <a href="shop.php" class="btn btn-primary btn-lg mt-4">ALL PRODUCTS</a>
    </div>
</section>
    
<!-- Featured Products Carousel -->
<div class="container mt-5">
    <div class="row">
        <!-- New Sunglasses -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-card">
                <img src="images/black.PNG" alt="Classic Black Frame" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">NEW SUNGLASSES</h5>
                    <p class="text-muted">Classic Black Frame</p>
                    <div class="price">$89.99</div>
                    <div class="rating mb-2">
                        <span class="text-warning">★★★★★</span>
                        <small class="text-muted">(124 reviews)</small>
                    </div>
                    <button class="btn">SHOP NOW</button>
                </div>
            </div>
        </div>
        
        <!-- Clear Frame Glasses -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-card">
                <img src="images/numimage.png" alt="Designer Sunglasses" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">NEW ARRIVAL</h5>
                    <p class="text-muted">Designer Sunglasses</p>
                    <div class="price">$129.99</div>
                    <div class="rating mb-2">
                        <span class="text-warning">★★★★★</span>
                        <small class="text-muted">(89 reviews)</small>
                    </div>
                    <button class="btn">SHOP NOW</button>
                </div>
            </div>
        </div>
        
        <!-- Blue Light Glasses -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-card">
                <img src="images/num3.png" alt="Blue Light Blocker" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">NEW ARRIVAL</h5>
                    <p class="text-muted">Blue Light Blocker</p>
                    <div class="price">$69.99</div>
                    <div class="rating mb-2">
                        <span class="text-warning">★★★★★</span>
                        <small class="text-muted">(156 reviews)</small>
                    </div>
                    <button class="btn">SHOP NOW</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Features -->
<section class="container mt-5" style="background: var(--light-bg); padding: 4rem 2rem; border-radius: 15px;">
    <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-truck feature-icon"></i>
                <h5>Free Shipping</h5>
                <p>On orders over $50</p>
                <small class="text-muted">Hassle-free returns</small>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-undo feature-icon"></i>
                <h5>30-Day Returns</h5>
                <p>Hassle-free returns</p>
                <small class="text-muted">Premium materials only</small>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-award feature-icon"></i>
                <h5>Quality Guarantee</h5>
                <p>Premium materials only</p>
                <small class="text-muted">Professional assistance</small>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-headset feature-icon"></i>
                <h5>Expert Support</h5>
                <p>Professional assistance</p>
                <small class="text-muted">24/7 customer care</small>
            </div>
        </div>
    </div>
</section>


<!-- Coming Soon Features -->
<section class="container mt-5">
    <h2 class="section-title">COMING SOON</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-camera feature-icon"></i>
                <h5>Virtual Try-On</h5>
                <p>Try glasses on your face using your camera or photo — instantly!</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-user-circle feature-icon"></i>
                <h5>Face Shape Matching</h5>
                <p>AI-based recommendations to match frames with your face shape.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="feature-card">
                <i class="fas fa-sliders-h feature-icon"></i>
                <h5>Custom Lens Options</h5>
                <p>Choose anti-glare, blue-light, or photochromic lenses with ease.</p>
            </div>
        </div>
    </div>
</section>


    <!-- Top Categories -->
<section class="container mt-5">
    <h2 class="section-title">TOP CATEGORIES</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="category-card">
                <i class="fas fa-glasses"></i>
                <h6>EYEGLASSES</h6>
                <p class="text-muted">Prescription & Fashion</p>
                <a href="shop.php" class="btn btn-sm btn-outline-primary">Shop Now</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="category-card">
                <i class="fas fa-sun"></i>
                <h6>SUNGLASSES</h6>
                <p class="text-muted">Designer & UV Protection</p>
                <a href="shop.php" class="btn btn-sm btn-outline-primary">Shop Now</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="category-card">
                <i class="fas fa-eye"></i>
                <h6>CONTACT LENSES</h6>
                <p class="text-muted">Daily & Monthly</p>
                <a href="shop.php" class="btn btn-sm btn-outline-primary">Shop Now</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="category-card">
                <i class="fas fa-laptop"></i>
                <h6>BLUE LIGHT GLASSES</h6>
                <p class="text-muted">Digital Eye Strain Relief</p>
                <a href="shop.php" class="btn btn-sm btn-outline-primary">Shop Now</a>
            </div>
        </div>
    </div>
</section>


<!-- About Section -->
<section class="container mt-5" id="about">
    <h2 class="section-title">HOW TO USE THIS WEBSITE</h2>
    <div class="video-box">
        <video controls>
            <source src="finaldemo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

<!-- Testimonials -->
<?php
try {
    // Define only the types you want to show
    $allowedTypes = ['Customer', 'Seller'];

    foreach ($allowedTypes as $type) {
        // Fetch testimonials for this type
        $stmt = $conn->prepare("SELECT name, comment, rating FROM testimonials WHERE type = :type ORDER BY id DESC");
        $stmt->execute([':type' => $type]);
        $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($testimonials) {
            // Unique carousel ID
            $carouselId = strtolower($type) . 'Carousel';
            ?>
            
            <section class="container mt-5">
                <h2 class="section-title text-center">What Our <?php echo htmlspecialchars($type); ?>s Say</h2>
                <div id="<?php echo $carouselId; ?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php foreach ($testimonials as $index => $testimonial): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <div class="testimonial text-center">
                                    <p style="color: black;">
                                        "<?php echo nl2br(htmlspecialchars($testimonial['comment'])); ?>"
                                    </p>
                                    <small style="color: black;">
                                        - <?php echo htmlspecialchars($testimonial['name']) . " (" . htmlspecialchars($type) . ")"; ?>
                                        <br>
                                        <?php echo str_repeat('★', (int)$testimonial['rating']) . str_repeat('☆', 5 - (int)$testimonial['rating']); ?>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carouselId; ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carouselId; ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
                    </button>
                </div>
            </section>

            <?php
        }
    }
} catch (PDOException $e) {
    echo "<div style='color:red;text-align:center;margin:50px;'>❌ Error fetching testimonials: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>


<!-- Footer -->
<?php require_once  "footar.php"; ?>

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

// Add fade-in animation to elements when they come into view
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

// Observe all cards and sections
document.querySelectorAll('.product-card, .feature-card, .category-card, .testimonial').forEach(el => {
    observer.observe(el);
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
</body>
</html>
