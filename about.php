<?php
session_start();
$sessionActive = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
 <html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Story | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<header class="site-header" id="siteHeader">
  <div class="header-inner">
    <a href="index.php" class="logo">Urban<span>Bites</span></a>
    <nav class="main-nav">
      <a href="index.php">Home</a>
      <a href="about.php" class="active">About</a>
      <a href="services.php">Menu</a>
      <a href="gallery.php">Gallery</a>
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

  <!-- PAGE HERO -->
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image: url('Images/about backgroung.jpeg');"></div>
    <div class="page-hero-content">
      <span class="section-label">Who We Are</span>
      <h1>Our Story</h1>
      <em style="color: white;">serving delicious meals with passion since 2024</em>
    </div>
  </div>

  <!-- ABOUT SPLIT -->
  <section style="padding: 100px 0;">
    <div class="container">
      <div class="about-split">
        <div class="about-img-wrap">
          <img src="Images/about1.jpeg" alt="Urban Bites Kitchen">
          <div class="about-img-badge">
            <div class="num">2024</div>
            <div class="label">Founded</div>
          </div>
        </div>
        <div class="about-content">
          <span class="section-label">Our Beginning</span>
          <h2 class="section-title">Born in <em>Kampala</em>,<br>Made for Everyone</h2>
          <p style="color: var(--text-muted); margin-bottom: 20px; line-height: 1.8;">Urban Bites began as a small family kitchen with a passion for serving delicious homemade meals.Over the years, We have grown into a beloved restuarant known for combining traditionl recipes with modern culinary creativity.</p>
          <p style="color: var(--text-muted); margin-bottom: 36px; line-height: 1.8;">Our journey has always been guided by one goal_ to create a warm and welcoming place where people can enjoy great food and create unforgottable memories with their loved ones.</p>

          <section class="why-choose-us">
              <h2>Why Choose Us</h2>
              <div class="value-item">
              <h4>🌿 Fresh Daily</h4>
              <p>All ingredients sourced and prepared fresh every morning.</p>
            </div>
            <div class="value-item">
              <h4>⚡ Fast Delivery</h4>
              <p>30-minute delivery guarantee across Kampala.</p>
            </div>
            <div class="value-item">
              <h4>🏆 Quality First</h4>
              <p>Uncompromising standards in every dish we serve.</p>
            </div>
           
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <!-- MISSION & VISION -->
  <section style="padding: 80px 0; background: var(--cream);">
    <div class="container">
      <div class="section-head centered">
        <span class="section-label">Our Purpose</span>
        <h2 class="section-title">Mission & <em>Vision</em></h2>
      </div>
      <div class="menu-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
        <div class="menu-card" style="padding: 0;">
          <div class="menu-card-body" style="padding: 36px;">
            <div style="font-size: 2.5rem; margin-bottom: 16px;">🎯</div>
            <h3 style="margin-bottom: 16px;">Our Mission</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px;">
              <li style="display:flex;gap:10px;align-items:flex-start;"><span style="color:var(--gold);">✓</span> To provide delicious,affordabe, and high-quality meals while
              delivering exceptional customer service in a welcoming atmosphere.</li>
            </ul>
          </div>
        </div>
        <div class="menu-card">
          <div class="menu-card-body" style="padding: 36px;">
            <div style="font-size: 2.5rem; margin-bottom: 16px;">🚀</div>
            <h3 style="margin-bottom: 16px;">Our Vision</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px;">
              <li style="display:flex;gap:10px;align-items:flex-start;"><span style="color:var(--gold);">✓</span> To became the most loved restuarant in the region by consistently
              exceeding customer expectations and promoting local ingredients.</li>
            </ul>
          </div>
        </div>
        <div class="menu-card">
          <div class="menu-card-body" style="padding: 36px;">
            <div style="font-size: 2.5rem; margin-bottom: 16px;">🌍</div>
            <h3 style="margin-bottom: 16px;">Our Values</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px;">
              <li style="display:flex;gap:10px;align-items:flex-start;"><span style="color:var(--gold);">✓</span> We are guided by integrity, committed to quality, and dedicated to putting our customers first.
              We believe in continuous innovation, teamwork, and excellence in everything we do,
            ensuring that we deliver reliable, meaningful, and high-quality experiences that build trust
          and lasting relationships.</li>
          </div>
        </div>
      </div>
    </div>
  </section>


  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="index.php" class="logo">Urban<span>Bites</span></a>
        <p>Crafting unforgettable dining experiences in the heart of Kampala since 2024.</p>
      </div>
      <div class="social-links" style="margin-top:24px;">
          <a href="#" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="services.php">Menu</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p>
            <p><i class="fa-solid fa-location-dot"></i> Kampala, Uganda</p>
        <p style="margin-top:8px;"><i class="fa-brands fa-whatsapp"></i>    +256 700 123456
        </p>
        <p> <a style="margin-top:8px;"><i class="fa-regular fa-envelope"></i> <a style="color: #9a9797;" href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a></p>
      </div>
    </div>
    <div class="footer-bottom" style="border-top:1px solid rgba(255,255,255,0.06);margin-top:60px;padding:24px 5%;">
      <p>© 2024 Urban Bites. All rights reserved.</p>
    </div>
  </footer>
</div>

<script src="main.js"></script>

<!-- JavaScript Added -->
<script>
// "Read More" Toggle Feature
// This script shows/hides extra content when clicking a button

document.addEventListener('DOMContentLoaded', function() {
  const aboutContent = document.querySelector('.about-content');
  
  if (aboutContent) {
    // Create the extra content section (hidden by default)
    const extraContent = document.createElement('div');
    extraContent.id = 'extraContent';
    extraContent.style.display = 'none';
    extraContent.style.marginTop = '20px';
    extraContent.style.padding = '20px';
    extraContent.style.background = 'var(--cream)';
    extraContent.style.borderRadius = '12px';
    extraContent.innerHTML = `
      <h4 style="color: var(--gold); margin-bottom: 10px;">Did You Know?</h4>
      <p style="color: var(--text-muted); line-height: 1.8;">
        Our recipes have been passed down through three generations of chefs. 
        Each dish is prepared with the same love and care that our grandmother 
        used in her kitchen. We source 90% of our ingredients from local Ugandan 
        farmers, supporting over 50 families in the Kampala region.
      </p>
    `;
    
    // Create the toggle button
    const readMoreBtn = document.createElement('button');
    readMoreBtn.textContent = 'Read More ↓';
    readMoreBtn.className = 'btn btn-gold';
    readMoreBtn.style.marginTop = '20px';
    
    // Add click event to toggle content
    readMoreBtn.addEventListener('click', function() {
      if (extraContent.style.display === 'none') {
        extraContent.style.display = 'block';
        readMoreBtn.textContent = 'Read Less ↑';
      } else {
        extraContent.style.display = 'none';
        readMoreBtn.textContent = 'Read More ↓';
      }
    });
    
    // Add button and extra content to the page
    aboutContent.appendChild(readMoreBtn);
    aboutContent.appendChild(extraContent);
  }
});
</script>

</body>
</html>