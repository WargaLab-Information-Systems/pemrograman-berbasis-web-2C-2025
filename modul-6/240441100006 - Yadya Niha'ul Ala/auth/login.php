<!-- auth/login.php -->
<?php
session_start();
require '../config/db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ../dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../dashboard.php");
            exit;
        }
    }
    $error = "Invalid username or password!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/citrus-slice.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Zhizi Agency</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fefaf6;
            display: flex;
            height: 100vh;
        }
        .left-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            max-width: 500px;
        }
        .right-panel {
            flex: 1;
            background: url('../assets/art.jpg') no-repeat right;
            background-size: cover;
            height: 100%;
            
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            border: 1px solid #fe552a;
            border-radius: 0;
        }
        .btn-login {
            background-color: #fe552a;
            color: #fff;
            border: none;
            border-radius: 0;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #d8451e;
        }
        .welcome-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fe552a;
        }
        .welcome-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }
        .extra-links {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-top: 10px;
        }
        .signup-link {
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="left-panel">
        <div class="welcome-title">Welcome back!</div>
        <div class="welcome-subtitle">Where the tangerines greet your return.</div>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>  
            <button type="submit" class="btn btn-login mt-4">Log in</button>
            <div class="signup-link">
                Don’t have an account? <a href="register.php">Sign up</a>
            </div>
        </form>
    </div>
    <div class="right-panel">
    </div>
</body>
</html>
