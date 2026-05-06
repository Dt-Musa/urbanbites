<?php
session_start();
$sessionActive = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

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
      <?php if ($sessionActive): ?>
        <a href="dashboard.php">Profile</a>
      <?php endif; ?>
    </nav>
    <a href="order.php" class="btn btn-gold btn-sm nav-cta">Order Now</a>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a>
  <a href="order.php">Order</a>
  <a href="contact.php">Contact</a>
  <?php if ($sessionActive): ?><a href="dashboard.php">Profile</a><?php endif; ?>
  <a href="order.php" class="btn btn-gold">Order Now</a>
</div>

<div class="page-body">
  <div class="page-hero">
    <div class="page-hero-bg" style="background-image: url('Images/FM7.jpeg');"></div>
    <div class="page-hero-content">
      <span class="section-label">Talk to Us</span>
      <h1>Get In Touch</h1>
    </div>
  </div>

  <section class="contact-section">
    <div class="container">
      <div class="contact-inner">
        <div>
          <span class="section-label">Contact Info</span>
          <h2 class="section-title" style="margin-bottom:12px;">We'd Love to <em>Hear</em> From You</h2>
          <p style="color:var(--text-muted);margin-bottom:36px;font-size:0.92rem;">Whether you have a question about our menu, want to organise a private event, or just want to say hello — we're always here.</p>

          <div class="contact-cards">
            <div class="contact-card">
              <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
              <div class="contact-card-text">
                <h4>Our Location</h4>
                <p>Find us at UMA Show grounds, Kampala, Uganda</p>
                <p style="font-size:0.8rem;margin-top:4px;">We have a dedicated team that delivers your order in minutes</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
              <div class="contact-card-text">
                <h4>Phone</h4>
                <a href="tel:+256700123456">+256 700 123456</a>
                <p style="font-size:0.8rem;margin-top:4px;">Mon–Sun, 7am – 10pm</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-icon"><i class="fa-regular fa-envelope"></i></div>
              <div class="contact-card-text">
                <h4>Email</h4>
                <a href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a>
                <p style="font-size:0.8rem;margin-top:4px;">Our customer care team will reply in a minute</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-icon"><i class="fa-regular fa-clock"></i></div>
              <div class="contact-card-text">
                <h4>Opening Hours</h4>
                <p>Monday – Friday: 7am – 10pm</p>
                <p>Saturday – Sunday: 8am – 11pm</p>
              </div>
            </div>
          </div>

          <div class="social-section">
            <h4>Follow Us</h4>
            <div class="social-links">
              <a href="https://www.facebook.com" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
              <a href="https://www.instagram.com" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://twitter.com" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="https://wa.me/256748994767" class="social-btn" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <div class="order-form-card">
          <h3>Send Us a Message</h3>
          <div id="contactSuccess" style="display:none;background:#d4edda;color:#155724;padding:16px 20px;border-radius:10px;margin-bottom:20px;font-size:0.92rem;border-left:4px solid #28a745;">
            <i class="fa-solid fa-check-circle"></i> Message sent successfully! We will get back to you within 24 hours.
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" id="fname" placeholder="Your name">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" id="lname" placeholder="Your Surname">
            </div>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" id="email" placeholder="example@gmail.com">
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" id="cphone" placeholder="+256 700 123456">
          </div>
          <div class="form-group">
            <label>Subject</label>
            <select id="subject">
              <option value="" disabled selected>Select a topic</option>
              <option>General Enquiry</option>
              <option>Order Issue</option>
              <option>Private Event / Catering</option>
              <option>Feedback</option>
              <option>Partnership</option>
            </select>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea id="message" placeholder="Tell us how we can help…"></textarea>
          </div>
          <div class="form-submit">
            <button class="btn btn-gold" type="button" id="sendMsg" style="width:100%;justify-content:center;">Send Message</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <a href="index.php" class="logo">Urban<span>Bites</span></a>
        <p>Serving excellence in the heart of Kampala, Uganda.</p>
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
          <li><a href="about.php">About</a></li>
          <li><a href="gallery.php">Gallery</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact Us</h4>
        <p><i class="fa-solid fa-location-dot"></i> Kampala, Uganda</p>
        <p style="margin-top:8px;"><i class="fa-brands fa-whatsapp"></i> +256 700 123456</p>
        <p style="margin-top:8px;"><i class="fa-regular fa-envelope"></i> <a style="color: #9a9797;" href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a></p>
        <p style="margin-top:16px; font-size:0.82rem; color:rgba(255,255,255,0.35);">Open Daily: 24 hours</p>
      </div>
    </div>
    <div class="footer-bottom" style="border-top:1px solid rgba(255,255,255,0.06);margin-top:60px;padding:24px 5%;">
      <p>© 2026 Urban Bites. All rights reserved.</p>
    </div>
  </footer>
</div>

<script src="main.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const sendBtn = document.getElementById('sendMsg');
  const successDiv = document.getElementById('contactSuccess');

  sendBtn.addEventListener('click', function() {
    const fname = document.getElementById('fname').value.trim();
    const lname = document.getElementById('lname').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('cphone').value.trim();
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value.trim();

    if (!fname || !lname || !email || !phone || !subject || !message) {
      alert('Please fill in all contact form fields.');
      return;
    }

    successDiv.style.display = 'block';
    successDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

    setTimeout(function() {
      document.getElementById('fname').value = '';
      document.getElementById('lname').value = '';
      document.getElementById('email').value = '';
      document.getElementById('cphone').value = '';
      document.getElementById('subject').value = '';
      document.getElementById('message').value = '';
    }, 1500);

    setTimeout(function() {
      successDiv.style.display = 'none';
    }, 5000);
  });
});
</script>

</body>
</html>


<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Contact Us | Urban Bites</title>

  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">



</head>
<body>

</div>

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

      

    </nav>

    <a href="order.php" class="btn btn-gold btn-sm nav-cta">Order Now</a>

    <button class="hamburger" id="hamburger" aria-label="Toggle menu">

      <span></span><span></span><span></span>

<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a>
  <a href="order.php">Order</a>
  <a href="contact.php">Contact</a>
  <a href="order.php" class="btn btn-gold">Order Now</a>
</div>

    </button>

  </div>

</header>



<div class="page-body">



  <div class="page-hero">

    <div class="page-hero-bg" style="background-image: url('Images/FM7.jpeg');"></div>

    <div class="page-hero-content">

      <span class="section-label">
      

      <h1>Get In Touch</h1>

    </div>

  </div>



  <section class="contact-section">

    <div class="container">

      <div class="contact-inner">

        <div>

          <span class="section-label">Contact Info</span>

          <h2 class="section-title" style="margin-bottom:12px;">We'd Love to <em>Hear</em> From You</h2>

          <p style="color:var(--text-muted);margin-bottom:36px;font-size:0.92rem;">Whether you have a question about our menu, want to organise a private event, or just want to say hello — we're always here.</p>



          <div class="contact-cards">

            <div class="contact-card">

              <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></i>

</div>

              <div class="contact-card-text">

                <h4>Our Location</h4>

                <p> Find us at UMA Show grounds, Kampala, Uganda</p>

                <p style="font-size:0.8rem;margin-top:4px;">We have a dedicated/passionate team that delivers your order to your convience just in minutes</p>

              </div>

            </div>

            <div class="contact-card">

              <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>

              <div class="contact-card-text">

                <h4>Phone</h4>

                <a href="tel:+256700123456">+256 700 123456</a>

                <p style="font-size:0.8rem;margin-top:4px;">Mon–Sun, 7am – 10pm</p>

              </div>

            </div>

            <div class="contact-card">

              <div class="contact-icon"><i class="fa-regular fa-envelope"></i></div>

              <div class="contact-card-text">

                <h4>Email</h4>

                <a href="mailto:urbanbitesug@gmail.com">urbanbitesug@gmail.com</a>

                <p style="font-size:0.8rem;margin-top:4px;">Our customer care team will reply in a minute</p>

              </div>

            </div>

            <div class="contact-card">

              <div class="contact-icon"><i class="fa-regular fa-clock"></i></div>

              <div class="contact-card-text">

                <h4>Opening Hours</h4>

                <p>Monday – Friday: 7am – 10pm</p>

                <p>Saturday – Sunday: 8am – 11pm</p>

              </div>

            </div>

          </div>



          <div class="social-section">

            <h4>Follow Us</h4>

            <div class="social-links">

              <a href="https://www.facebook.com" class="social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>

              <a href="https://www.instagram.com" class="social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>

              <a href="https://twitter.com" class="social-btn" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>

              <a href="https://wa.me/256748994767" class="social-btn" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>

            </div>

          </div>

        </div>



        <!-- FEEDBACK FORM -->

        <div class="order-form-card">

          <h3>Send Us a Message</h3>

          

          <div class="form-row">

            <div class="form-group">

              <label>First Name</label>

              <input type="text" id="fname" placeholder="Your name">

            </div>

            <div class="form-group">

              <label>Last Name</label>

              <input type="text" id="lname" placeholder="Your Surname">

            </div>

          </div>

          <div class="form-group">

            <label>Email Address</label>

            <input type="email" id="email" placeholder="example@gmail.com">

          </div>

          <div class="form-group">

            <label>Phone Number</label>

            <input type="tel" id="cphone" placeholder="+256 700 123456">

          </div>

          <div class="form-group">

            <label>Subject</label>

            <select id="subject">

              <option value="" disabled selected>Select a topic</option>

              <option>General Enquiry</option>

              <option>Order Issue</option>

              <option>Private Event / Catering</option>

              <option>Feedback</option>

              <option>Partnership</option>

            </select>

          </div>

          <div class="form-group">

            <label>Message</label>

            <textarea id="message" placeholder="Tell us how we can help…"></textarea>

          </div>

          <div class="form-submit">

            <button class="btn btn-gold" type="button" id="sendMsg" style="width:100%;justify-content:center;">

              Send Message 

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

        <p>Serving excellence in the heart of Kampala, Uganda.</p>

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

          <li><a href="about.php">About</a></li>

          <li><a href="gallery.php">Gallery</a></li>

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

    </div>

  </footer>

</div>

<script src="main.js"></script>



<!-- JavaScript Added -->

<script>

// Contact Form Confirmation

// This script validates the contact form and shows a confirmation message



document.addEventListener('DOMContentLoaded', function() {

  const sendBtn = document.getElementById('sendMsg');

  

  // Create success message element (hidden by default)

  const successDiv = document.createElement('div');

  successDiv.id = 'contactSuccess';

  successDiv.style.display = 'none';

  successDiv.style.background = '#d4edda';

  successDiv.style.color = '#155724';

  successDiv.style.padding = '16px 20px';

  successDiv.style.borderRadius = '10px';

  successDiv.style.marginBottom = '20px';

  successDiv.style.fontSize = '0.92rem';

  successDiv.style.borderLeft = '4px solid #28a745';

  successDiv.innerHTML = '<i class="fa-solid fa-check-circle"></i> Message sent successfully! We will get back to you within 24 hours.';

  

  // Insert success message before the form

  const formCard = document.querySelector('.order-form-card');

  const formHeader = formCard.querySelector('h3');

  formHeader.insertAdjacentElement('afterend', successDiv);

  

  sendBtn.addEventListener('click', function() {

    // Get form values

    const fname = document.getElementById('fname').value.trim();

    const lname = document.getElementById('lname').value.trim();

    const email = document.getElementById('email').value.trim();