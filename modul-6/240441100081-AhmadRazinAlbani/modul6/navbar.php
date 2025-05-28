<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 mb-4">
  <a class="navbar-brand" href="index.php">Manajemen Karyawan</a>
  <div class="ms-auto">
    <?php if (isset($_SESSION['login'])): ?>
      <span class="text-white me-3">👋 <?= htmlspecialchars($_SESSION['username']) ?></span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    <?php else: ?>
      <a href="login.php" class="btn btn-outline-light btn-sm me-2">Login</a>
      <a href="register.php" class="btn btn-outline-light btn-sm">Register</a>
    <?php endif; ?>
  </div>
</nav>
