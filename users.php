<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/includes/db.php';

if (isset($_GET['delete_id'])) {
    $deleteId = (int) $_GET['delete_id'];

    $deleteStmt = mysqli_prepare($conn, 'DELETE FROM users WHERE id = ?');
    mysqli_stmt_bind_param($deleteStmt, 'i', $deleteId);
    mysqli_stmt_execute($deleteStmt);
    mysqli_stmt_close($deleteStmt);

    if ($deleteId === (int) $_SESSION['user_id']) {
        session_destroy();
        header('Location: login.php');
        exit;
    }

    header('Location: users.php');
    exit;
}

$result = mysqli_query($conn, 'SELECT id, username, email, created_at FROM users ORDER BY id DESC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users | Urban Bites</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    .users-page { min-height: calc(100vh - var(--header-h)); background: var(--cream); padding: 120px 5% 80px; }
    .users-card { max-width: 1100px; margin: 0 auto; background: var(--white); border-radius: var(--radius-lg); padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid rgba(200,151,58,0.1); }
    .users-head { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 28px; }
    .users-head h1 { font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; color: var(--dark); }
    .users-list { list-style: none; display: grid; gap: 14px; }
    .user-item { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 20px; border-radius: 12px; background: var(--cream); }
    .user-meta { display: flex; flex-direction: column; gap: 4px; }
    .user-meta strong { color: var(--dark); }
    .user-meta span { color: var(--text-muted); font-size: 0.9rem; }
    .user-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .action-link { text-decoration: none; font-size: 0.85rem; font-weight: 600; border-radius: 999px; padding: 10px 14px; transition: var(--transition); }
    .action-edit { background: rgba(200,151,58,0.12); color: var(--gold); }
    .action-delete { background: rgba(198,52,52,0.12); color: #a21d1d; }
    .action-link:hover { transform: translateY(-1px); }
    .empty-state { color: var(--text-muted); }
    @media (max-width: 768px) {
      .users-card { padding: 24px; }
      .users-head { flex-direction: column; align-items: flex-start; }
      .user-item { flex-direction: column; align-items: flex-start; }
      .nav-cta { display: none; }
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
      <a href="users.php" class="active">Users</a>
      <a href="contact.php">Contact</a>
      <a href="dashboard.php">Profile</a>
    </nav>
    <a href="logout.php" class="btn btn-gold btn-sm nav-cta">Logout</a>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu"><span></span><span></span><span></span></button>
  </div>
</header>
<div class="mobile-menu" id="mobileMenu" style="display:none;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="services.php">Menu</a>
  <a href="gallery.php">Gallery</a>
  <a href="users.php">Users</a>
  <a href="dashboard.php">Profile</a>
  <a href="contact.php">Contact</a>
  <a href="logout.php" class="btn btn-gold">Logout</a>
</div>

<main class="users-page">
  <section class="users-card">
    <div class="users-head">
      <div>
        <span class="section-label">Registered Accounts</span>
        <h1>Users</h1>
      </div>
      <a href="edit_user.php" class="btn btn-gold btn-sm">Edit My Profile</a>
    </div>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
      <ul class="users-list">
        <?php while ($user = mysqli_fetch_assoc($result)): ?>
          <li class="user-item">
            <div class="user-meta">
              <strong><?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></strong>
              <span><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="user-actions">
              <?php if ((int) $user['id'] === (int) $_SESSION['user_id']): ?>
                <a class="action-link action-edit" href="edit_user.php">Edit</a>
              <?php endif; ?>
              <a class="action-link action-delete" href="users.php?delete_id=<?php echo (int) $user['id']; ?>" onclick="return confirm('Delete this user?');">Delete</a>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p class="empty-state">No users found.</p>
    <?php endif; ?>
  </section>
</main>

<script src="main.js"></script>
</body>
</html>