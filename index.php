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
        <h1>Welcome to GoGalse</h1>
        <p class="lead">Your trusted platform for buying and selling top-quality products.</p>
        <a href="shop.php" class="btn btn-primary btn-lg mt-3">Start Shopping</a>
    </div>
</section>

<!-- About Section -->
    <section class="section " id="about">
        <div class="container mt-5 text-center">
             <h2 class="section-title" style="color:white; ">How to Use This Website</h2>
            <div class="video-box" style="height: 750px;" >  <!-- place css for video -->
                <video style=" width: 1300px;" controls>   <!-- size css for video -->
                    <source src="finalwebdemo.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>

    
<!-- Image carousel -->
<div class="container mt-5 ">
    <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" >
                <img src="images/black.PNG" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="images/numimage.png" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="images/num3.png" class="d-block w-100" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="images/img4.png" class="d-block w-100" alt="Slide 4">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev" >
            <span class="carousel-control-prev-icon" ></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<div style="color: rgb(238, 240, 242);">

 <!-- avalibal Features -->
    <section class="container mt-5 text-center">
    <h2 class="section-title">Available Features</h2>

    <div class="row">
        <!-- Feature 1 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-shipping-fast"></i></div>
            <h5>Fast Delivery</h5>
            <p>Speedy shipping across the country at no extra cost.</p>
        </div>

        <!-- Feature 2 -->
        <div class="col-md-4">
    <div class="feature-icon mb-3">
       <i class="fas fa-calendar-check text-primary"></i>
 <!-- Changed icon -->
    </div>
    <h5>Eye Test Booking</h5> 
    <p>Book your eye test appointment easily and get expert vision care.</p> 
</div>

        <!-- Feature 3 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-prescription"></i></div>
            <h5>Prescription Support</h5>
            <p>Easily upload your prescription for customized lenses.</p>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Feature 4 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-user-check"></i></div>
            <h5>Trusted Sellers</h5>
            <p>All sellers are verified for top-quality products and service.</p>
        </div>

        <!-- Feature 5 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-headset"></i></div>
            <h5>24/7 Support</h5>
            <p>Customer assistance whenever you need it, day or night.</p>
        </div>

        <!-- Feature 6 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-shield-alt"></i></div>
            <h5>Secure Payment</h5>
            <p>Your transactions are encrypted and 100% secure.</p>
        </div>
    </div>
</section>


    <!-- Features -->
   <section class="container mt-5 text-center">
    <h2 class="section-title">Coming Soon Features</h2>
    <div class="row">
        <!-- Feature 1 -->
       <div class="col-md-4">
             <div class="feature-icon mb-3"><i class="fas fa-camera text-primary"></i></div>
             <h5>Virtual Try-On</h5>
             <p>Try glasses on your face using your camera or photo — instantly!</p>
        </div>


        <!-- Feature 2 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-user-circle"></i></div>
            <h5>Face Shape Matching</h5>
            <p>AI-based recommendations to match frames with your face shape.</p>
        </div>

        <!-- Feature 3 -->
        <div class="col-md-4">
            <div class="feature-icon mb-3"><i class="fas fa-sliders-h"></i></div>
            <h5>Custom Lens Options</h5>
            <p>Choose anti-glare, blue-light, or photochromic lenses with ease.</p>
        </div>
    </div>
</section>


    <!-- Categories -->
    <section class="container mt-5 text-center">
    <h2 class="section-title">Top Categories</h2>
    <div class="row">
        <div class="col-md-3 category-card">
            <i class="fas fa-glasses text-primary"></i>
            <h6>Eyeglasses</h6>
        </div>
        <div class="col-md-3 category-card">
            <i class="fas fa-sun text-primary"></i>
            <h6>Sunglasses</h6>
        </div>
        <div class="col-md-3 category-card">
            <i class="fas fa-eye text-primary"></i>
            <h6>Contact Lenses</h6>
        </div>
        <div class="col-md-3 category-card">
    <i class="fas fa-glasses text-primary"></i>
    <h6>Blue Light Glasses</h6>
</div>

    </div>
</section>

    <!-- Testimonials 1-->
     <?php
// Fetch testimonials grouped by type
try {
    // First, get unique user types with testimonials
    $types_stmt = $conn->query("SELECT DISTINCT type FROM testimonials ORDER BY type");
    $types = $types_stmt->fetchAll(PDO::FETCH_COLUMN);

    foreach ($types as $type) {
        // Fetch testimonials for this type
        $stmt = $conn->prepare("SELECT name, comment, rating FROM testimonials WHERE type = :type ORDER BY id DESC");
        $stmt->execute([':type' => $type]);
        $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($testimonials) {
            // Generate a carousel ID unique to the type (no spaces etc.)
            $carouselId = strtolower(str_replace(' ', '', $type)) . 'Carousel';
            ?>

            <section class="container mt-5">
                <h2 class="section-title text-center">What Our <?php echo htmlspecialchars($type); ?>s Say</h2>
                <div id="<?php echo $carouselId; ?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php foreach ($testimonials as $index => $testimonial): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <div class="testimonial">
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

</div>

<!-- Footer -->
<?php require_once  "footar.php"; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
