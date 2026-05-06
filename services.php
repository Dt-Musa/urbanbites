<?php
session_start();
$sessionActive = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu | Urban Bites</title>
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
      <a href="services.php" class="active">Menu</a>
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
    <div class="page-hero-bg" style="background-image: url('Images/services background.jpg');"></div>
    <div class="page-hero-content">
      <span class="section-label">Explore</span>
      <h1>Our Signature Menu</h1>
    </div>
  </div>

  <!-- FEATURED CARDS -->
  <section class="menu-section">
    <div class="container">
      <div class="section-head">
        <span class="section-label">Signature Dishes</span>
        <h2 class="section-title">Most <em>Loved</em> Items</h2>
      </div>

      <div class="menu-tabs">
        <button class="menu-tab active" data-cat="all">All</button>
        <button class="menu-tab" data-cat="mains">Mains</button>
        <button class="menu-tab" data-cat="breakfast">Breakfast</button>
        <button class="menu-tab" data-cat="drinks">Drinks</button>
        <button class="menu-tab" data-cat="desserts">Desserts</button>
      </div>

      <div class="menu-grid">
        <div class="menu-card" data-cat="mains">
          <div class="menu-card-img">
            <img src="Images/burger.jpg" alt="Burger">
            <span class="menu-card-badge hot">Popular</span>
          </div>
          <div class="menu-card-body">
            <h3>Urban Signature Burger</h3>
            <p>Two beef patties,vegetable patty, cheese &amp; crispy lettuce served on a toasted bun.</p>
            <div class="menu-card-footer">
              <span class="price">UGX 18,000</span>
              <a href="order.php" class="add-btn">+</a>
            </div>
          </div>
        </div>

        <div class="menu-card" data-cat="mains">
          <div class="menu-card-img">
            <img src="Images/grilled chicken.jpg" alt="Chicken">
            <span class="menu-card-badge new">New</span>
          </div>
          <div class="menu-card-body">
            <h3>Flame-Grilled Chicken</h3>
            <p>Rich smoky flavor you’ll love. Tender on the inside, perfectly charred on the outside.</p>
            <div class="menu-card-footer">
              <span class="price">UGX 25,000</span>
              <a href="order.php" class="add-btn">+</a>
            </div>
          </div>
        </div>

        <div class="menu-card" data-cat="mains">
          <div class="menu-card-img">
            <img src="Images/pizza.jpg" alt="Hot Pizza">
          </div>
          <div class="menu-card-body">
            <h3>Hot Pizza</h3>
            <p>Your favorite toppings. Crispy on the outside, soft on the inside.</p>
            <div class="menu-card-footer">
              <span class="price">UGX 12,000</span>
              <a href="order.php" class="add-btn">+</a>
            </div>
          </div>
        </div>

        <div class="menu-card" data-cat="breakfast">
          <div class="menu-card-img">
            <img src="Images/rolex.webp" alt="Rolex">
          </div>
          <div class="menu-card-body">
            <h3>Rolex Special</h3>
            <p>A true taste of the Uganda streets! Simple, filling, and full of flavor.</p>
            <div class="menu-card-footer">
              <span class="price">UGX 8,000</span>
              <a href="order.php" class="add-btn">+</a>
            </div>
          </div>
        </div>

        <div class="menu-card" data-cat="drinks">
          <div class="menu-card-img">
            <img src="Images/drinks.jpg" alt="Juice">
          </div>
          <div class="menu-card-body">
            <h3>Cocktail Juice</h3>
            <p>A refreshing blend of vibrant fruits and premium spirits, our cocktail juice is crafted to awaken your taste buds with every sip.</p>
            <div class="menu-card-footer">
              <span class="price">UGX 6,000</span>
              <a href="order.php" class="add-btn">+</a>
            </div>
          </div>
        </div>

        <div class="menu-card" data-cat="desserts">
          <div class="menu-card-img">
            <img src="Images/dessert.jpg" alt="Dessert">
            <span class="menu-card-badge new">New</span>
          </div>
          <div class="menu-card-body">
            <h3>Cherry cream cheese dessert</h3>
            <p>Sweet cherries layered over rich cream cheese for a simple yet irresistibly delicious treat.</p>
            <div class="menu-card-footer">
              <span class="price">UGX 14,000</span>
              <a href="order.php" class="add-btn">+</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FULL MENU TABLE -->
  <section class="menu-table-section">
    <div class="container">
      <div class="section-head">
        <span class="section-label">Full Menu</span>
        <h2 class="section-title">Complete <em>Price List</em></h2>
      </div>
      <table class="menu-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price (UGX)</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Urban Signature Burger</td><td>Mains</td><td> beef, cheese, vegetable patty, lettuce, toasted bun</td><td>18,000</td></tr>
          <tr><td>Flame-Grilled </td><td>Mains</td><td>Half chicken, 24hr marinated</td><td>25,000</td></tr>
          <tr><td>Hot pizza</td><td>Mains</td><td>Chicken, cheese, flour</td><td>12,000</td></tr>
          <tr><td>Rolex Special</td><td>Breakfast</td><td>Eggs, veggies, chapati</td><td>8,000</td></tr>
          <tr><td>Cocktail Juice</td><td>Drinks</td><td>Cold-pressed, mint &amp; strawberry</td><td>6,000</td></tr>
          <tr><td>Cherry cream cheese dessert</td><td>Desserts</td><td>Cream,chocolate, cherries</td><td>14,000</td></tr>
          <tr><td>Matoke &amp; Groundnut Stew</td><td>Mains</td><td>Traditional Ugandan classic</td><td>15,000</td></tr>
          <tr><td>Masala Chai</td><td>Drinks</td><td>Spiced milk tea</td><td>4,500</td></tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- SUBSCRIBE -->
  <div class="subscribe-strip">
    <div class="subscribe-text">
      <h3>Never Miss a New Dish</h3>
      <p>Subscribe for weekly menu updates and exclusive member offers.</p>
    </div>
    <div class="subscribe-form">
      <input type="email" placeholder="Your email address">
      <button type="button">Subscribe</button>
    </div>
  </div>

  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="index.php" class="logo">Urban<span>Bites</span></a>
        <p>Crafting unforgettable dining experiences in the heart of Kampala since 2024.</p>
        <div class="social-links" style="margin-top:24px;">
          <a href="#" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="about.php">About</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p><i class="fa-solid fa-location-dot"></i> Kampala, Uganda</p>
        <p style="margin-top:8px;"><i class="fa-brands fa-whatsapp"></i> +256 700 123456</p>
        <p style="margin-top:8px;"><i class="fa-regular fa-envelope"></i> <a style="color: rgb(169, 169, 166);" href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a></p>
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
// Menu Category Filter
// This script filters menu items when clicking category tabs

document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.menu-tab');
  const menuCards = document.querySelectorAll('.menu-card');
  
  tabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
      // Remove active class from all tabs
      tabs.forEach(function(t) {
        t.classList.remove('active');
      });
      
      // Add active class to clicked tab
      this.classList.add('active');
      
      // Get the category to filter
      const category = this.getAttribute('data-cat');
      
      // Show or hide menu cards
      menuCards.forEach(function(card) {
        const cardCategory = card.getAttribute('data-cat');
        
        if (category === 'all' || cardCategory === category) {
          card.style.display = 'block';  // Show the card
        } else {
          card.style.display = 'none';     // Hide the card
        }
      });
    });
  });
});
</script>

<!-- Email Subscription JavaScript -->
<script>
// Menu Updates Email Subscription
// This script handles the email subscription in the services page

document.addEventListener('DOMContentLoaded', function() {
  const subscribeBtn = document.querySelector('.subscribe-form button');
  const emailInput = document.querySelector('.subscribe-form input[type="email"]');
  
  if (subscribeBtn && emailInput) {
    subscribeBtn.addEventListener('click', function() {
      const email = emailInput.value.trim();
      
      // Check if email is valid (not empty and contains @)
      if (email && email.includes('@')) {
        alert('Welcome to Urban Bites updates! 🍔\n\nYou will receive our weekly menu updates at: ' + email);
        emailInput.value = ''; // Clear the input
      } else {
        alert('Please enter a valid email address to receive menu updates.');
      }
    });
  }
});
</script>

</body>
</html>