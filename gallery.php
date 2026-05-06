<?php
session_start();
$sessionActive = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<header class="site-header" id="siteHeader">
  <div class="header-inner">
    <a href="index.php" class="logo">Urban<span>Bites</span></a>
    <nav class="main-nav">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Menu</a>
      <a href="gallery.php" class="active">Gallery</a>
      <a href="order.php">Order</a>
      <a href="contact.php">Contact</a>
      <?php if ($sessionActive): ?>
        <a href="dashboard.php">Profile</a>
      <?php endif; ?>
    </nav>
    <a href="order.php" class="btn btn-gold btn-sm nav-cta">Order Now</a>
    <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
  </div>
</header>
<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a><a href="about.php">About</a><a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a><a href="order.php">Order</a><a href="contact.php">Contact</a>
  <?php if ($sessionActive): ?><a href="dashboard.php">Profile</a><?php endif; ?>
  <a href="order.php" class="btn btn-gold">Order Now</a>
</div>

<div class="page-body">

  <div class="page-hero">
    <div class="page-hero-bg" style="background-image: url('Images/background-image-gallery.jpg');"></div>
    <div class="page-hero-content">
      <h1>Food Gallery</h1>
    </div>
  </div>

  <section class="gallery-section">
    <div class="container">
      <div class="section-head centered">
        <span class="section-label">UrbanBITES GALLEERY</span>
        <h2 class="section-title">A Feast for the <em>Eyes</em></h2>
        <p class="section-subtitle">Every dish is a work of art. Here's a glimpse into the Urban Bites kitchen.</p>
      </div>
      <div class="gallery-masonry">
        <div class="gallery-item">
          <img src="Images/NUTELLA COOKIE MILKSHAKES.jpg" alt="Nutella Cookie Milkshake">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/images.webp" alt="Burger">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/pizza.jpg" alt="Pizza">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/Chapati and meat.jpg" alt="Chapati and meat">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/grilled chicken.jpg" alt="Chicken">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/Fried Fish.jpg" alt="Fried Fish">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/home-page-superfoods-brand-new.jpg" alt="Drinks">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/Katogo.jpg" alt="Dessert">
          <div class="gallery-item-overlay"></div>
        </div>
        <div class="gallery-item">
          <img src="Images/Chips and chicken.jpg" alt="Chips and Chicken">
          <div class="gallery-item-overlay">🍳</div>
        </div>
      </div>
    </div>
  </section>

  <!-- LIGHTBOX MODAL -->
  <div id="lightbox" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.92);z-index:9999;align-items:center;justify-content:center;">
    <button id="lightboxClose" style="position:absolute;top:24px;right:32px;background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;">&times;</button>
    <img id="lightboxImg" style="max-width:90vw;max-height:85vh;border-radius:12px;object-fit:contain;" alt="Gallery image">
  </div>

  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="index.php" class="logo">Urban<span>Bites</span></a>
        <p>Premium dining experiences in Kampala, Uganda.</p>
        <div class="social-links" style="margin-top:24px;">
          <a href="#" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="services.php">Menu</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p><i class="fa-solid fa-location-dot"></i> Kampala, Uganda</p>
        <p style="margin-top:8px;"><i class="fa-brands fa-whatsapp"></i> +256 700 123456</p>
        <p style="margin-top:8px;"><i class="fa-regular fa-envelope"></i> <a style="color: rgb(134, 136, 138);" href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a></p>
      </div>
    </div>
    <div class="footer-bottom" style="border-top:1px solid rgba(255,255,255,0.06);margin-top:60px;padding:24px 5%;">
      <p>© 2026 Urban Bites. All rights reserved.</p>
    </div>
  </footer>

</div>

<script src="main.js"></script>

<!-- JavaScript Added -->
<script>
// Image Lightbox Feature
// This script shows a larger view when clicking on gallery images

document.addEventListener('DOMContentLoaded', function() {
  const galleryItems = document.querySelectorAll('.gallery-item');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightboxImg');
  const lightboxClose = document.getElementById('lightboxClose');
  
  // When clicking a gallery image, show it in the lightbox
  galleryItems.forEach(function(item) {
    item.addEventListener('click', function() {
      const img = this.querySelector('img');
      lightboxImg.src = img.src;        // Set the lightbox image
      lightboxImg.alt = img.alt;        // Set the alt text
      lightbox.style.display = 'flex';  // Show the lightbox
    });
  });
  
  // Close lightbox when clicking the X button
  lightboxClose.addEventListener('click', function() {
    lightbox.style.display = 'none';
  });
  
  // Close lightbox when clicking outside the image
  lightbox.addEventListener('click', function(e) {
    if (e.target === lightbox) {
      lightbox.style.display = 'none';
    }
  });
  
  // Close lightbox when pressing Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      lightbox.style.display = 'none';
    }
  });
});
</script>

</body>
</html>