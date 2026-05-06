<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/includes/db.php';

$userId = (int) $_SESSION['user_id'];
$error = '';
$success = '';

$stmt = mysqli_prepare($conn, 'SELECT id, username, email FROM users WHERE id = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    header('Location: logout.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($username === '' || $email === '') {
        $error = 'Username and email are required.';
    } else {
        $checkStmt = mysqli_prepare($conn, 'SELECT id FROM users WHERE (email = ? OR username = ?) AND id <> ? LIMIT 1');
        mysqli_stmt_bind_param($checkStmt, 'ssi', $email, $username, $userId);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);

        if (mysqli_fetch_assoc($checkResult)) {
            $error = 'Username or email already in use.';
        } else {
            $updateStmt = mysqli_prepare($conn, 'UPDATE users SET username = ?, email = ? WHERE id = ?');
            mysqli_stmt_bind_param($updateStmt, 'ssi', $username, $email, $userId);

            if (mysqli_stmt_execute($updateStmt)) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $success = 'Profile updated successfully.';
                $user['username'] = $username;
                $user['email'] = $email;
            } else {
                $error = 'Unable to update profile.';
            }

            mysqli_stmt_close($updateStmt);
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
  <title>Edit Profile | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    .edit-page { min-height: calc(100vh - var(--header-h)); background: var(--cream); padding: 120px 5% 80px; }
    .edit-card { max-width: 720px; margin: 0 auto; background: var(--white); border-radius: var(--radius-lg); padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid rgba(200,151,58,0.1); }
    .edit-card h1 { font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; color: var(--dark); margin-bottom: 12px; }
    .edit-note { color: var(--text-muted); margin-bottom: 24px; }
    .edit-message { margin-bottom: 20px; padding: 14px 16px; border-radius: 10px; font-size: 0.92rem; }
    .edit-message.error { background: rgba(198, 52, 52, 0.08); color: #a21d1d; }
    .edit-message.success { background: rgba(40, 167, 69, 0.1); color: #155724; }
    .edit-form { display: grid; gap: 20px; }
    .edit-form label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--dark); letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 10px; }
    .edit-form input { width: 100%; padding: 14px 16px; border: 1.5px solid rgba(0,0,0,0.08); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: 0.95rem; color: var(--text); background: var(--cream); transition: var(--transition); }
    .edit-form input:focus { outline: none; border-color: var(--gold); background: var(--white); box-shadow: 0 0 0 4px rgba(200,151,58,0.15); }
    .edit-actions { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 8px; }
    @media (max-width: 768px) { .edit-card { padding: 24px; } .nav-cta { display: none; } }
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
      <a href="users.php">Users</a>
      <a href="contact.php">Contact</a>
      <a href="dashboard.php">Profile</a>
    </nav>
    <a href="logout.php" class="btn btn-gold btn-sm nav-cta">Logout</a>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu"><span></span><span></span><span></span></button>
  </div>
</header>

<main class="edit-page">
  <section class="edit-card">
    <span class="section-label">Account Settings</span>
    <h1>Edit Profile</h1>
    <p class="edit-note">Update your username or email address.</p>

    <?php if ($error !== ''): ?>
      <div class="edit-message error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

    <?php if ($success !== ''): ?>
      <div class="edit-message success"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

    <form class="edit-form" method="post" action="edit_user.php">
      <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>" required>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
      </div>
      <div class="edit-actions">
        <button type="submit" class="btn btn-gold">Update Profile</button>
        <a href="users.php" class="btn btn-dark">Back to Users</a>
      </div>
    </form>
  </section>
</main>

<script src="main.js"></script>
</body>
</html>