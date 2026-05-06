<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($username === '' || $email === '' || $password === '' || $confirmPassword === '') {
        $error = 'Please complete all registration fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        $checkStmt = mysqli_prepare($conn, 'SELECT id FROM users WHERE email = ? OR username = ? LIMIT 1');
        mysqli_stmt_bind_param($checkStmt, 'ss', $email, $username);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);

        if (mysqli_fetch_assoc($checkResult)) {
            $error = 'Username or email already exists.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = mysqli_prepare($conn, 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
            mysqli_stmt_bind_param($insertStmt, 'sss', $username, $email, $hashedPassword);

            if (mysqli_stmt_execute($insertStmt)) {
                header('Location: login.php');
                exit;
            }

            $error = 'Registration failed. Please try again.';
            mysqli_stmt_close($insertStmt);
        }

        mysqli_stmt_close($checkStmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    .auth-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 5%; padding-top: calc(var(--header-h) + 40px); position: relative; overflow: hidden; }
    .auth-page::before { content: ''; position: absolute; inset: 0; background-image: url("Images/home page background.jpg"); background-size: cover; background-position: center; filter: blur(6px) brightness(0.55); transform: scale(1.03); z-index: -2; }
    .auth-page::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(250,247,242,0.25), rgba(15,15,15,0.18)); z-index: -1; }
    .auth-container { width: 100%; max-width: 460px; }
    .auth-card { background: #ffffff; border-radius: 16px; padding: 40px 32px; box-shadow: 0 18px 40px rgba(10,10,10,0.12); border: 1px solid rgba(0,0,0,0.04); backdrop-filter: blur(4px); }
    .auth-header { text-align: center; margin-bottom: 28px; }
    .card-logo { display:inline-block; font-family: 'Cormorant Garamond', serif; font-size:1.6rem; color:var(--dark); text-decoration:none; margin-bottom:8px; }
    .card-logo span { color: var(--gold); }
    .auth-header h1 { font-size: 1.4rem; color: var(--dark); margin: 6px 0 6px; }
    .auth-header p { color: var(--text-muted); font-size: 0.92rem; margin:0; }
    .auth-error { margin-bottom: 20px; padding: 14px 16px; border-radius: 10px; background: rgba(198, 52, 52, 0.08); color: #a21d1d; font-size: 0.92rem; }
    .auth-form .form-group { margin-bottom: 24px; }
    .auth-form .form-group label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--dark); letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 10px; }
    .auth-form input { width: 100%; padding: 14px 16px; border: 1.5px solid rgba(0,0,0,0.08); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: 0.95rem; color: var(--text); background: var(--cream); transition: var(--transition); }
    .auth-form input:hover { border-color: rgba(200,151,58,0.4); background: rgba(248,246,242,0.8); }
    .auth-form input:focus { outline: none; border-color: var(--gold); background: var(--white); box-shadow: 0 0 0 4px rgba(200,151,58,0.15); }
    .password-field { position: relative; }
    .password-field input { padding-right: 52px; }
    .password-toggle {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      border: none;
      background: transparent;
      color: var(--text-muted);
      cursor: pointer;
      padding: 0;
      width: 24px;
      height: 24px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    .password-toggle:hover { color: var(--gold); }
    .auth-submit { margin-top: 32px; }
    .auth-submit .btn { width: 100%; justify-content: center; font-size: 1rem; padding: 14px 28px; font-weight: 700; letter-spacing: 0.05em; border-radius: 999px; }
    .auth-submit .btn:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(200,151,58,0.3); }
    .auth-footer { text-align: center; margin-top: 24px; font-size: 0.9rem; color: var(--text-muted); }
    .auth-footer a { color: var(--gold); text-decoration: none; font-weight: 600; transition: var(--transition); }
    .auth-footer a:hover { color: var(--gold-light); }

    @media (max-width: 768px) {
      .auth-page { padding: 16px 4%; padding-top: calc(var(--header-h) + 20px); align-items: flex-start; }
      .auth-container { max-width: 100%; }
      .auth-card { padding: 24px 18px; width: 100%; box-shadow: 0 8px 24px rgba(0,0,0,0.12); }
      .auth-header h1 { font-size: 1.25rem; }
    }
    /* Hide full header links on auth pages to show logo only */
    .site-header .main-nav, .site-header .nav-cta, .site-header .hamburger { display: none; }
    .mobile-menu { display: none !important; }
    .site-footer { display: none; }
  </style>
</head>
<body>

<header class="site-header" id="siteHeader">
  <div class="header-inner">
    <a href="index.php" class="logo">Urban<span>Bites</span></a>
  </div>
</header>

<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a>
  <a href="order.php">Order</a>
  <a href="contact.php">Contact</a>
  <a href="order.php" class="btn btn-gold">Order Now</a>
</div>

<div class="auth-page">
  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-header">
        <a class="card-logo" href="index.php">Urban<span>Bites</span></a>
        <h1>Register</h1>
        <p>Create your Urban Bites account</p>
      </div>

      <?php if ($error !== ''): ?>
        <div class="auth-error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
      <?php endif; ?>

      <form class="auth-form" method="post" action="register.php">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Choose a username" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <div class="password-field">
            <input type="password" id="password" name="password" placeholder="Create a password" required>
            <button type="button" class="password-toggle" data-target="password" aria-label="Show password">
              <i class="fa-regular fa-eye"></i>
            </button>
          </div>
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <div class="password-field">
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
            <button type="button" class="password-toggle" data-target="confirm-password" aria-label="Show password">
              <i class="fa-regular fa-eye"></i>
            </button>
          </div>
        </div>
        <div class="auth-submit">
          <button type="submit" class="btn btn-gold">Register</button>
        </div>
      </form>

      <div class="auth-footer">
        Already have an account? <a href="login.php">Login</a>
      </div>
    </div>
  </div>
</div>

<footer class="site-footer">
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
      <h4>Contact</h4>
      <p>📍 Kampala, Uganda</p>
      <p>📞 +256 123 456 789</p>
      <p>✉️ info@urbanbites.ug</p>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2026 Urban Bites. All rights reserved.</p>
    <div class="footer-bottom-links">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
    </div>
  </div>
</footer>

<script src="main.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.password-toggle').forEach(function(button) {
    button.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      const input = document.getElementById(targetId);
      const icon = this.querySelector('i');
      const isPassword = input.type === 'password';

      input.type = isPassword ? 'text' : 'password';
      icon.className = isPassword ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye';
      this.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
    });
  });
});
</script>
</body>
</html>