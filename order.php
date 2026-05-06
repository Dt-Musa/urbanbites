<?php
session_start();
$sessionActive = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Now | Urban Bites</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header" id="siteHeader">
  <div class="header-inner">
    <a href="index.php" class="logo">Urban<span>Bites</span></a>
    <nav class="main-nav">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Menu</a>
      <a href="gallery.php">Gallery</a>
      <a href="order.php" class="active">Order</a>
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
    <div class="page-hero-bg" style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?w=1400&q=80');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
      <span class="section-label">Your Favorite Meals, Delivered</span>
      <h1>Order Premium Food in 30 Minutes</h1>
      <p class="hero-subtitle" style="color: white;">Quality ingredients. Expert preparation. On-time delivery. Every single time.</p>
    </div>
  </div>

  <section class="order-section">
    <div class="container">
      <div class="order-inner">
        <div class="order-info">
          <div class="promise-badge">
            <i class="fa-solid fa-star"></i> UrbanBites Promise
          </div>
          <h2>From Our Kitchen to Your Table, Every Bite Was Made for You</h2>
          <p>Fast. Fresh. Flawless. We serve chef-crafted meals made with premium local ingredients and deliver them on time, every time.</p>
          <div class="trust-metrics">
            <div class="metric">
              <span class="metric-value">15K+</span>
              <span class="metric-label">Happy Customers</span>
            </div>
            <div class="metric">
              <span class="metric-value">98%</span>
              <span class="metric-label">On-Time Delivery</span>
            </div>
            <div class="metric">
              <span class="metric-value">4.9★</span>
              <span class="metric-label">Avg Rating</span>
            </div>
          </div>
          <div class="order-benefits">
            <div class="benefit-item">
              <div class="benefit-icon"><i class="fa-solid fa-bolt"></i></div>
              <div class="benefit-text">
                <h4>30-Min Delivery Guarantee</h4>
                <p>Meals arrive hot and ready with our punctual delivery promise and real-time route monitoring.</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon"><i class="fa-solid fa-leaf"></i></div>
              <div class="benefit-text">
                <h4>Chef-Selected Freshness</h4>
                <p>Locally sourced produce and daily-prepped recipes for flavors that beat every other meal delivery.</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon"><i class="fa-solid fa-trophy"></i></div>
              <div class="benefit-text">
                <h4>Instant Rewards</h4>
                <p>Earn points with every order and unlock free meals, priority delivery, and exclusive promos.</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon"><i class="fa-solid fa-phone"></i></div>
              <div class="benefit-text">
                <h4>Live Order Tracking</h4>
                <p>Stay in control with live delivery updates, SMS alerts, and 24/7 customer support.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="order-form-card">
          <div class="form-header">
            <h3><i class="fa-solid fa-shopping-bag"></i> Order Details</h3>
            <span class="form-badge">Quick & Easy</span>
          </div>
          <div id="successMsg" style="display:none;background:#d4edda;color:#155724;padding:16px 20px;border-radius:10px;margin-bottom:24px;font-size:0.92rem;border-left: 4px solid #28a745;">
            <i class="fa-solid fa-check-circle"></i> Order placed successfully! We'll call you to confirm within 5 minutes.
          </div>
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" id="name" placeholder="e.g. Sarah Nakato" required>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Phone Number</label>
              <input type="tel" id="phone" placeholder="+256 700 123456" required>
            </div>
            <div class="form-group">
              <label>Select Meal</label>
              <select id="meal" required>
                <option value="" disabled selected>Choose a dish</option>
                <option>Urban Signature Burger — UGX 18,000</option>
                <option>Flame-Grilled Chicken — UGX 25,000</option>
                <option>Rolex Special — UGX 8,000</option>
                <option> Hot Pizza— UGX 12,000</option>
                <option>Fresh Passion Juice — UGX 6,000</option>
                <option>Chocolate Lava Cake — UGX 14,000</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" id="qty" placeholder="1" min="1" max="20" value="1">
          </div>
          <div class="form-group">
            <label>Delivery Address</label>
            <textarea id="address" placeholder="Street, area, landmark near your location..." required></textarea>
          </div>
          <div class="form-group">
            <label>Special Instructions (optional)</label>
            <input type="text" id="notes" placeholder="e.g. No onions, extra sauce…">
          </div>
          <div class="form-submit">
            <button class="btn btn-gold" type="button" id="submitOrder" style="width:100%;justify-content:center;">
              <i class="fa-solid fa-cart-shopping"></i> Submit Order
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="index.php" class="logo">Urban<span>Bites</span></a>
        <p>Fresh ingredients, on-time delivery, real customer love. Order now and taste the difference.</p>
        <div class="social-links" style="margin-top:24px;">
          <a href="#" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="services.php">Full Menu</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p> <i class="fa-solid fa-location-dot"></i> Kampala, Uganda</p>
        <p><i class="fa-solid fa-phone"></i> +256 700 123456</p>
        <p style="margin-top:8px;"><i class="fa-regular fa-envelope"></i> <a style="color: #9a9797;" href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a></p>
      </div>
    </div>
    <div class="footer-bottom" style="border-top:1px solid rgba(255,255,255,0.06);margin-top:60px;padding:24px 5%;">
      <p>&copy; 2026 Urban Bites. All rights reserved.</p>
    </div>
  </footer>

</div>

<script src="main.js"></script>

<!-- JavaScript Added -->
<script>
// Order Form Validation & Success Message
// This script checks that all required fields are filled before submitting

document.addEventListener('DOMContentLoaded', function() {
  const submitBtn = document.getElementById('submitOrder');
  const successMsg = document.getElementById('successMsg');
  
  submitBtn.addEventListener('click', function() {
    // Get all form fields
    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const meal = document.getElementById('meal').value;
    const address = document.getElementById('address').value.trim();
    
    // Check if any required field is empty
    if (!name || !phone || !meal || !address) {
      alert('Please fill in all required fields:\n- Full Name\n- Phone Number\n- Select a Meal\n- Delivery Address');
      return; // Stop here - don't submit
    }
    
    // If all fields are filled, show success message
    successMsg.style.display = 'block';
    
    // Scroll to top of form to see the message
    successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
    
    // Clear the form after 2 seconds
    setTimeout(function() {
      document.getElementById('name').value = '';
      document.getElementById('phone').value = '';
      document.getElementById('meal').value = '';
      document.getElementById('address').value = '';
      document.getElementById('qty').value = '1';
      document.getElementById('notes').value = '';
    }, 2000);
    
    // Hide success message after 5 seconds
    setTimeout(function() {
      successMsg.style.display = 'none';
    }, 5000);
  });
});
</script>

</body>
</html>