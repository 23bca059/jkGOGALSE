<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Eye Test Booking | GoGalse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap & Font Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />

  <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    background-color: #000;
    color: #f5e6b3;
    font-family: 'Segoe UI', sans-serif;
  }

  /* Page Title */
  h2 {
    text-align: center;
    margin: 20px 0 10px;
    font-size: 1.8rem;
    color: #f0f0f0;
  }

  /* Booking Form Container */
  .form-container {
    max-width: 700px;
    margin: 0 auto 40px;
    padding: 20px;
    background-color: #121212;
    border: 1px solid #2c2c2c;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
  }

  .form-label {
    color: #f0f0f0;
  }

  .form-control,
  .form-select {
    background-color: #000;
    color: #f5e6b3;
    border: 1px solid #d4af37;
  }

  .form-control::placeholder {
    color: #bfa76f;
  }

  .btn-primary {
    background-color: #d4af37;
    border-color: #d4af37;
    color: #000;
    font-weight: bold;
  }

  .btn-primary:hover {
    background-color: #b8860b;
    border-color: #b8860b;
  }

  /* === Left/Right Sliders === */
  .left-slider,
  .right-slider {
    width: 180px;
    height: 100vh;
    overflow: hidden;
    position: fixed;
    z-index: 1;
  }

  .left-slider {
    top: 0;
    left: 0;
  }

  .right-slider {
    top: 0;
    right: 0;
  }

  .left-slider .icons,
  .right-slider .icons {
    display: flex;
    flex-direction: column;
  }

  .left-slider .icons {
    animation: slideDown 10s linear infinite;
  }

  .right-slider .icons {
    animation: slideUp 10s linear infinite;
  }

  .left-slider img,
  .right-slider img {
    width: 150px;
    height: auto;
    margin: 20px auto;
    display: block;
    object-fit: contain;
  }

  /* === Keyframe Animations === */
  @keyframes slideDown {
    0%   { transform: translateY(-100%); }
    100% { transform: translateY(100%); }
  }

  @keyframes slideUp {
    0%   { transform: translateY(100%); }
    100% { transform: translateY(-100%); }
  }

  /* === Responsive Design === */
  @media (max-width: 767px) {
    h2 {
      font-size: 1.4rem;
      padding: 10px;
    }

    .form-container {
      margin: 20px 10px;
      padding: 15px;
    }

    /* Show sliders but shrink for mobile */
    .left-slider,
    .right-slider {
      width: 100px;
      height: 100vh;
    }

    .left-slider img,
    .right-slider img {
      width: 80px;
      margin: 10px auto;
    }
  }
</style>

</head>

<body>
  <!-- ✅ Responsive Navbar -->
  <?php include "head.php"; ?>

  <!-- ✅ Left Slider (Hidden on Mobile) -->
  <div class="left-slider">
    <div class="icons">
      <img src="images/black.png" alt="Eye" />
      <img src="images/black.png" alt="Glasses" />
      <img src="images/black.png" alt="Doctor" />
      <img src="images/black.png" alt="Store" />
      <img src="images/black.png" alt="Search" />
    </div>
  </div>

  <!-- ✅ Right Slider (Hidden on Mobile) -->
  <div class="right-slider">
    <div class="icons">
      <img src="images/black.png" alt="Glasses" />
      <img src="images/black.png" alt="Sun" />
      <img src="images/black.png" alt="Moon" />
      <img src="images/black.png" alt="Star" />
      <img src="images/black.png" alt="Heart" />
    </div>
  </div>

  <!-- ✅ Page Title -->
  <h2 style="color: #f0f0f0;"><b><u>Book Your Eye Test</u></b></h2>

  <!-- ✅ Booking Form -->
  <div class="form-container">
    <form method="POST" action="your_booking_php.php">
      <div class="mb-3">
        <label class="form-label">Full Name:</label>
        <input type="text" name="name" class="form-control" required placeholder="Enter your full name" />
      </div>
      <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required placeholder="your@example.com" />
      </div>
      <div class="mb-3">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" class="form-control" required placeholder="Enter phone number" />
      </div>
      <div class="mb-3">
        <label class="form-label">Select Nearest City/Store:</label>
        <select name="city" class="form-select" required>
          <option value="">-- Select City --</option>
          <option value="Bardoli">Bardoli</option>
          <option value="Surat">Surat</option>
          <option value="Navsari">Navsari</option>
          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Vadodara">Vadodara</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Preferred Date:</label>
        <input type="date" name="date" class="form-control" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Preferred Time:</label>
        <input type="time" name="time" class="form-control" required />
      </div>
      <button type="submit" class="btn btn-primary w-100">Book Appointment</button>
    </form>
  </div>

  <!-- ✅ Footer -->
  <?php include "footar.php"; ?>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
