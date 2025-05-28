<?php
session_start();
require 'db.php';

// Jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password1 = $_POST['password'];
    $password2 = $_POST['confirm_password'];

    // Validasi
    if ($password1 != $password2) {
        $error = "Password tidak cocok!";
    } else {
        // Cek apakah username sudah ada
        $cek = $conn->prepare("SELECT id FROM users WHERE username=?");
        $cek->bind_param("s", $username);
        $cek->execute();
        $cek->store_result();

        if ($cek->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {
            // Simpan user baru
            $hashed = password_hash($password1, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed);
            $stmt->execute();

            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4" style="width: 25rem;">
        <h4 class="mb-3">Registrasi Akun Baru</h4>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="post">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <input type="password" name="confirm_password" class="form-control mb-3" placeholder="Ulangi Password" required>
            <button class="btn btn-success w-100" type="submit">Daftar</button>
            <p class="text-center mt-3">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </p>
        </form>
    </div>
</body>
</html>
