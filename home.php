<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Healet Opticals</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Healet Opticals</a>
  </nav>

  <!-- Latest Products Section -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Latest Products</h2>
    <div class="row text-center">
      <?php
        $products = [
          ["image" => "gogalse/images/i2.jpg", "name" => "Product 1"],
          ["image" => "gogalse/images/i2.jpg", "name" => "Product 2"],
          ["image" => "gogalse/images/i2.jpg", "name" => "Product 3"],
        ];
        foreach ($products as $product) {
          echo '<div class="col-md-4">
                  <img src="'.$product['image'].'" alt="'.$product['name'].'" class="img-fluid">
                  <h5>'.$product['name'].'</h5>
                  <button class="btn btn-primary">View Product</button>
                </div>';
        }
      ?>
    </div>
  </section>

  <!-- About Us Section -->
  <section class="bg-light py-5 text-center">
    <div class="container">
      <h2>About Us</h2>
      <video width="100%" controls>
        <source src="assets/video/how-to-use.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </section>

  <!-- Offers Section -->
  <section class="container my-5 text-center">
    <h2>Special Offers</h2>
    <div class="row">
      <?php
        $offers = [
          "gogalse/images/i2.jpg",
          "gogalse/images/i2.jpg"
        ];
        foreach ($offers as $offer) {
          echo '<div class="col-md-6">
                  <img src="'.$offer.'" class="img-fluid" alt="Offer">
                  <button class="btn btn-warning mt-2">Shop Now</button>
                </div>';
        }
      ?>
    </div>
  </section>

  <!-- Latest From Blog Section -->
  <section class="bg-light py-5">
    <div class="container text-center">
      <h2>Latest From Blog</h2>
      <div class="row">
        <?php
          $blogs = [
            ["img" => "gogalse/images/i2.jpg", "title" => "Blog Title 1", "desc" => "Short description..."],
            ["img" => "gogalse/images/i2.jpg", "title" => "Blog Title 2", "desc" => "Short description..."],
            ["img" => "gogalse/images/i2.jpg", "title" => "Blog Title 3", "desc" => "Short description..."],
          ];
          foreach ($blogs as $blog) {
            echo '<div class="col-md-4">
                    <img src="'.$blog['img'].'" class="img-fluid" alt="'.$blog['title'].'">
                    <h5>'.$blog['title'].'</h5>
                    <p>'.$blog['desc'].'</p>
                  </div>';
          }
        ?>
      </div>
    </div>
  </section>

  <!-- Testimonial Section -->
  <section class="container my-5 text-center">
    <h2>Testimonials</h2>
    <div class="row">
      <?php
        $testimonials = [
          ["img" => "gogalse/images/i2.jpg", "quote" => "Great service!", "name" => "John Doe"],
          ["img" => "gogalse/images/i2.jpg", "quote" => "Excellent products.", "name" => "Jane Smith"],
          ["img" => "gogalse/images/i2.jpg", "quote" => "Highly recommend.", "name" => "Alex Brown"],
        ];
        foreach ($testimonials as $t) {
          echo '<div class="col-md-4">
                  <img src="'.$t['img'].'" class="rounded-circle" width="100" alt="'.$t['name'].'">
                  <p>"'.$t['quote'].'"</p>
                  <h6>- '.$t['name'].'</h6>
                </div>';
        }
      ?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    &copy; <?php echo date("Y"); ?> Healet Opticals. All Rights Reserved.
  </footer>

  <!-- Scripts -->
  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>
