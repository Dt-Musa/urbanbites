<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/includes/db.php';

$userId = (int) $_SESSION['user_id'];
$success = '';
$error = '';

if (isset($_SESSION['dashboard_success'])) {
  $success = $_SESSION['dashboard_success'];
  unset($_SESSION['dashboard_success']);
}

$stmt = mysqli_prepare($conn, 'SELECT id, username, email FROM users WHERE id = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    session_destroy();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($username === '' || $email === '') {
            $error = 'Username and email are required.';
        } else {
            $checkStmt = mysqli_prepare($conn, 'SELECT id FROM users WHERE (username = ? OR email = ?) AND id <> ? LIMIT 1');
            mysqli_stmt_bind_param($checkStmt, 'ssi', $username, $email, $userId);
            mysqli_stmt_execute($checkStmt);
            $checkResult = mysqli_stmt_get_result($checkStmt);

            if (mysqli_fetch_assoc($checkResult)) {
                $error = 'Username or email already exists.';
            } else {
                $updateStmt = mysqli_prepare($conn, 'UPDATE users SET username = ?, email = ? WHERE id = ?');
                mysqli_stmt_bind_param($updateStmt, 'ssi', $username, $email, $userId);

                if (mysqli_stmt_execute($updateStmt)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                  $_SESSION['dashboard_success'] = 'Profile updated successfully.';

                  mysqli_stmt_close($updateStmt);
                  mysqli_stmt_close($checkStmt);

                  header('Location: dashboard.php');
                  exit;
                } else {
                    $error = 'Unable to update your profile.';
                }

                mysqli_stmt_close($updateStmt);
            }

            mysqli_stmt_close($checkStmt);
        }
    }

    if (isset($_POST['delete_account'])) {
        $deleteStmt = mysqli_prepare($conn, 'DELETE FROM users WHERE id = ?');
        mysqli_stmt_bind_param($deleteStmt, 'i', $userId);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);

        session_unset();
        session_destroy();
        header('Location: register.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    .dashboard-page { min-height: calc(100vh - var(--header-h)); background: var(--cream); padding: 120px 5% 80px; }
    .dashboard-shell { max-width: 1100px; margin: 0 auto; display: grid; gap: 28px; }
    .dashboard-card { background: var(--white); border-radius: var(--radius-lg); padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid rgba(200,151,58,0.1); }
    .dashboard-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
    .dashboard-head h1 { font-family: 'Cormorant Garamond', serif; font-size: clamp(2rem, 3vw, 3rem); color: var(--dark); margin-bottom: 8px; }
    .dashboard-head p { color: var(--text-muted); }
    .dashboard-actions { display: flex; gap: 12px; flex-wrap: wrap; }
    .dashboard-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    .info-panel, .form-panel { background: var(--cream); border-radius: 16px; padding: 28px; }
    .panel-title { font-size: 1.15rem; color: var(--dark); margin-bottom: 16px; }
    .detail-list { display: grid; gap: 14px; }
    .detail-item { display: flex; justify-content: space-between; gap: 16px; padding: 14px 16px; background: var(--white); border-radius: 12px; }
    .detail-item span:first-child { color: var(--text-muted); }
    .detail-item strong { color: var(--dark); }
    .dashboard-message { padding: 14px 16px; border-radius: 10px; margin-bottom: 18px; font-size: 0.92rem; }
    .dashboard-message.success { background: rgba(40, 167, 69, 0.1); color: #155724; }
    .dashboard-message.error { background: rgba(198, 52, 52, 0.08); color: #a21d1d; }
    .dashboard-form label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--dark); letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 10px; }
    .dashboard-form input { width: 100%; padding: 14px 16px; border: 1.5px solid rgba(0,0,0,0.08); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: 0.95rem; color: var(--text); background: var(--white); transition: var(--transition); margin-bottom: 18px; }
    .dashboard-form input:focus { outline: none; border-color: var(--gold); box-shadow: 0 0 0 4px rgba(200,151,58,0.15); }
    .dashboard-form .btn-row { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 8px; }
    .danger-form { margin-top: 18px; }
    .danger-form .btn-danger { background: #b42318; color: var(--white); }
    .danger-form .btn-danger:hover { background: #8f1c13; }
    .logout-link { text-decoration: none; }
    @media (max-width: 900px) {
      .dashboard-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
      .dashboard-card { padding: 24px; }
      .info-panel, .form-panel { padding: 22px; }
      .dashboard-actions { display: none; }
    }
  </style>
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
      <a href="contact.php">Contact</a>
      <a href="dashboard.php" class="active">Profile</a>
    </nav>
    <div class="dashboard-actions">
      <a href="logout.php" class="btn btn-dark btn-sm">Logout</a>
    </div>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu"><span></span><span></span><span></span></button>
  </div>
</header>

<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a>
  <a href="contact.php">Contact</a>
  <a href="dashboard.php">Profile</a>
  <a href="logout.php" class="btn btn-gold">Logout</a>
</div>

<main class="dashboard-page">
  <div class="dashboard-shell">
    <section class="dashboard-card">
      <div class="dashboard-head">
        <div>
          <span class="section-label">User Profile</span>
          <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
          <p>Manage your Urban Bites profile and account details.</p>
        </div>
      </div>
    </section>

    <section class="dashboard-grid">
      <div class="dashboard-card info-panel">
        <div class="panel-title">Current Details</div>
        <div class="detail-list">
          <div class="detail-item">
            <span>Username</span>
            <strong><?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></strong>
          </div>
          <div class="detail-item">
            <span>Email</span>
            <strong><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></strong>
          </div>
        </div>
      </div>

      <div class="dashboard-card form-panel">
        <div class="panel-title">Update Profile</div>

        <?php if ($success !== ''): ?>
          <div class="dashboard-message success"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <?php if ($error !== ''): ?>
          <div class="dashboard-message error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <form class="dashboard-form" method="post" action="dashboard.php">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>" required>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" required>

          <div class="btn-row">
            <button type="submit" name="update_profile" class="btn btn-gold">Update Profile</button>
          </div>
        </form>

        <form class="danger-form" method="post" action="dashboard.php" onsubmit="return confirm('Are you sure?');">
          <button type="submit" name="delete_account" class="btn btn-danger">Delete Account</button>
        </form>
      </div>
    </section>
  </div>
</main>

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
</body>
</html>