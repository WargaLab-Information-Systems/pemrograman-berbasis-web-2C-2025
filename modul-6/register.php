<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Cek apakah username sudah digunakan
  $cek = $conn->query("SELECT * FROM users WHERE username = '$username'");
  if ($cek->num_rows > 0) {
    $error = "Username sudah digunakan.";
  } else {
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header("Location: login.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5 col-md-6">
    <h2 class="mb-4 text-center">Form Registrasi</h2>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100">Daftar</button>
    </form>

    <p class="mt-3 text-center">Sudah punya akun? <a href="login.php">Login</a></p>
  </div>
</body>
</html>
