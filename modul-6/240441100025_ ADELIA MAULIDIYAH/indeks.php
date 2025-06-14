<?php  
session_start();
include 'db.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $result['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #d4edda, #a8d5a2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .login-box {
            background-color: #f0f9f4;
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(46, 125, 50, 0.3);
            width: 320px;
            text-align: center;
        }
        .login-box h2 {
            color: #2e7d32;
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 1.1px;
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #81c784;
            padding: 10px 12px;
            transition: border-color 0.3s ease;
            color: #145214;
        }
        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 8px #4caf5066;
            outline: none;
        }
        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 12px;
            transition: background-color 0.3s ease;
            color: white;
        }
        .btn-primary:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }
        .error {
            color: #388e3c;
            font-weight: 600;
            margin-bottom: 15px;
            background-color: #d0f0c0;
            border-radius: 8px;
            padding: 8px;
        }
        .register-link {
            margin-top: 15px;
            display: block;
            color: #4caf50;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .register-link:hover {
            color: #388e3c;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box shadow-sm">
        <h2>Form Login</h2>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" novalidate>
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required autofocus />
            <input type="password" name="password" class="form-control mb-4" placeholder="Password" required />
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <a href="register.php" class="register-link">Belum punya akun? Daftar di sini</a>
    </div>
</body>
</html>
