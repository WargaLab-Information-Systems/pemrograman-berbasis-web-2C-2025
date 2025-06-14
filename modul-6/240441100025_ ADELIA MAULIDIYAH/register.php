<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d4edda; /* hijau pastel */
        }
        .register-form {
            background-color: #e9f7ef; /* hijau sangat terang */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px #81c784; /* shadow hijau */
            width: 100%;
            max-width: 400px;
            margin: auto;
            margin-top: 80px;
        }
        .register-form h2 {
            color: #2e7d32; /* hijau gelap */
        }
        .btn-green {
            background-color: #4caf50; /* hijau medium */
            color: white;
        }
        .btn-green:hover {
            background-color: #388e3c; /* hijau gelap saat hover */
        }
    </style>
</head>
<body>
<div class="register-form">
    <h2 class="text-center mb-4">Form Registrasi</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-green w-100">Register</button>
    </form>
    <?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];

        // Cek apakah username sudah ada
        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            // Username sudah ada
            echo "<div class='alert alert-danger text-center mt-3'>Username sudah digunakan. <a href='register.php'>Kembali</a></div>";
        } else {
            // Lanjut registrasi
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            echo "<div class='alert alert-success text-center mt-3'>Registrasi berhasil. <a href='indeks.php'>Login</a></div>";
        }

        exit();
    }
    ?>
</div>
</body>
</html>
