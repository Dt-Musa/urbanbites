<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$sessionActive = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Urban Bites | Premium Dining in Kampala</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body>

<!-- HEADER -->
<header class="site-header" id="siteHeader">
  <div class="header-inner">
    <a href="index.php" class="logo">Urban<span>Bites</span></a>
    <nav class="main-nav">
      <a href="index.php" class="active">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Menu</a>
      <a href="gallery.php">Gallery</a>
      <a href="order.php">Order</a>
      <a href="contact.php">Contact</a>
      <a href="dashboard.php">Profile</a>
    </nav>
    <a href="order.php" class="btn btn-gold btn-sm nav-cta">Order Now</a>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a>
  <a href="order.php">Order</a>
  <a href="contact.php">Contact</a>
  <a href="dashboard.php">Profile</a>
  <a href="order.php" class="btn btn-gold">Order Now</a>
</div>

<div class="page-body">

  <!-- HERO SLIDER -->
  <section class="hero-slider" aria-label="Featured slides">
    <div class="slide active" id="slide-0">
      <div class="slide-bg" style="background-image: url('Images/home page background.jpg');"></div>
      <div class="slide-overlay"></div>
      <div class="slide-content">
        <div class="slide-text">
          <span class="tag">Food made better</span>
          <h2>Welcome to <em style="color: white;">Urban Bites</em></h2>
          <p>Bold flavors, fresh meals, and crafted drinks all in one place. UrbanBites makes great food simple and always within reach.</p>
          <div class="slide-actions">
            <a href="order.php" class="btn btn-gold">Order Now</a>
            <a href="services.php" class="btn btn-outline">View Menu</a>
          </div>
        </div>
      </div>
    </div>
  </section>
    
  <!-- QUICK LINKS -->
  <nav class="quick-links" aria-label="Quick navigation">
    <div class="quick-links-inner">
      <a href="services.php" class="quick-link-item">
        <svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Menu
      </a>
      <a href="#locations" class="quick-link-item">
        <svg viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Locations
      </a>
      <a href="gallery.php" class="quick-link-item">
      
        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
       
        Gallery
      </a>
      <a href="order.php" class="quick-link-item">
        <svg viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        Order
      </a>
      <a href="contact.php" class="quick-link-item">
        <svg viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        Contact
      </a>
    </div>
  </nav>

  <!-- PROMO / FEATURED -->
  <section class="promo-section">
    <div class="container">
      <div class="section-head">
        <span class="section-label">Featured</span>
        <h2 class="section-title">What's <em>Hot!</em></h2>
        <p class="section-subtitle">Every bite is a pure perfection</p>
      </div>
      <div class="promo-grid">
        <a href="services.php" class="promo-card">
          <img src="Images/burger.jpg" alt="Signature Burger">
          <div class="promo-card-overlay">
            <span class="promo-badge">Best Seller</span>
            <h3>The Mighty Burger</h3>
            <p>Two beef patties,vegetable patty, cheese &amp; crispy lettuce served on a toasted bun</p>
          </div>
        </a>
        <a href="services.php" class="promo-card">
          <img src="Images/Chicken.jpg" alt="Chicken">
          <div class="promo-card-overlay">
            <span class="promo-badge">Chef's Pick</span>
            <h3>Flame-Grilled Chicken</h3>
            <p>Rich smoky flavor you’ll love. Tender on the inside, perfectly charred on the outside.</p>
          </div>
        </a>
        <a href="services.php" class="promo-card">
          <img src="Images/rolex.webp" alt="Rolex">
          <div class="promo-card-overlay">
            <span class="promo-badge">STREET WISE</span>
            <h3>Rolex Special</h3>
            <p>A true taste of the Uganda streets! Simple, filling, and full of flavor.</p>
          </div>
        </a>
        <a href="services.php" class="promo-card">
          <img src="Images/pizza 1.jpg" alt="Peri Peri Chicken">
          <div class="promo-card-overlay">
            <span class="promo-badge">pizza planet</span>
            <h3>Hot Pizza</h3>
            <p>Your favorite toppings. Crispy on the outside, soft on the inside</p>
          </div>
        </a>
        <a href="services.php" class="promo-card">
          <img src="Images/Chips and chicken.jpg" alt="Chips andChicken">
          <div class="promo-card-overlay">
            <span class="promo-badge">CRUNCHY</span>
            <h3>Chips & Chicken Combo</h3>
            <p>Crispy golden chips served with juicy, well-seasoned chicken, fried to perfection.</p>
          </div>
        </a>
        <a href="services.php" class="promo-card">
          <img src="Images/Katogo.jpg" alt="Katogo">
          <div class="promo-card-overlay">
            <span class="promo-badge">Taste of home</span>
            <h3>Matooke Katogo</h3>
            <p>Soft, well-cooked matooke mixed with a rich sauce and your choice of beef or offals.</p>
          </div>
        </a>
      </div>
    </div>
    <div style="text-align:center; margin-top: 48px;">
        <a href="services.php" class="btn btn-dark">View Full Menu</a>
      </div>
  </section>

  

  <!-- SUBSCRIBE -->
  <div class="subscribe-strip">
    <div class="subscribe-text">
      <h3>Join Our Mailing List</h3>
      <p>Get exclusive offers, new menu drops & weekly specials.</p>
    </div>
    <div class="subscribe-form">
      <input type="email" placeholder="Enter your email address">
      <button type="button">Subscribe</button>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer" id="locations">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="index.php" class="logo">Urban<span>Bites</span></a>
        <p>Crafting unforgettable dining experiences in the heart of Kampala since 2026. Great food, great coffee, great service.</p>
        <div class="social-links" style="margin-top:24px;">
          <a href="#" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Our Menu</h4>
        <ul>
          <li><a href="services.php">Breakfast</a></li>
          <li><a href="services.php">Mains</a></li>
          <li><a href="services.php">Drinks</a></li>
          <li><a href="services.php">Desserts</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="about.php">About Us</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="order.php">Order Online</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact Us</h4>
        <p><i class="fa-solid fa-location-dot"></i> Kampala, Uganda</p>
        <p style="margin-top:8px;"><i class="fa-brands fa-whatsapp"></i>    +256 700 123456</p>
        <p style="margin-top:8px;"><i class="fa-regular fa-envelope"></i> <a style="color: #9a9797;" href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a></p>
        <p style="margin-top:16px; font-size:0.82rem; color:rgba(255,255,255,0.35);">Open Daily: 24 hours</p>
      </div>
    </div>
    <div class="footer-bottom" style="border-top:1px solid rgba(255,255,255,0.06);margin-top:60px;padding:24px 5%;">
      <p>© 2026 Urban Bites. All rights reserved.</p>
      <div class="footer-bottom-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
      </div>
    </div>
  </footer>

</div><!-- end page-body -->

<script src="main.js"></script>

<!-- JavaScript Added -->
<script>
// Newsletter Subscription Confirmation
// This script shows a thank you message when someone subscribes

document.addEventListener('DOMContentLoaded', function() {
  const subscribeBtn = document.querySelector('.subscribe-form button');
  const emailInput = document.querySelector('.subscribe-form input[type="email"]');
  
  if (subscribeBtn && emailInput) {
    subscribeBtn.addEventListener('click', function() {
      const email = emailInput.value;
      
      // Simple check if email is not empty and has @ symbol
      if (email && email.includes('@')) {
        alert('Thank you for subscribing! 🎉\n\nYou will receive exclusive offers at: ' + email);
        emailInput.value = ''; // Clear the input
      } else {
        alert('Please enter a valid email address.');
      }
    });
  }
});
</script>

</body>
</html>