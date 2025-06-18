<?php
session_start();
$conn = new mysqli('localhost', 'root', 'pamekasan2005', 'manajemen_karyawan');

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

$error_message = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error_message = 'Password salah!';
        }
    } else {
        $error_message = 'User  tidak ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .blur-background { 
            background-color: rgba(255, 255, 255, 0.223);
            border: 2px solid rgba(255, 255, 255, 0.204);
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body>
    <div class="grid grid-cols-1 blur-background p-5 text-white mx-md-5 text-center rounded">
        <div class="col-12">
            <i class="fa fa-user-circle fa-6x"></i>
        </div>
        <form action="login.php" class="form" method="POST">
            <div class="mt-4">
                <input type="text" name="username" placeholder="Username" class="form-control form-control-sm col-6 mb-3 rounded border-0 p-2" required>
                <input type="password" name="password" placeholder="Password" class="form-control form-control-sm col-6 rounded border-0 p-2" required>
            </div>
            <div class="my-2">
                <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
            </div>
            <div>
                <p>Don't have an account? <a href="register.php" class="text-decoration-none info-link">Register</a></p>
            </div>
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
