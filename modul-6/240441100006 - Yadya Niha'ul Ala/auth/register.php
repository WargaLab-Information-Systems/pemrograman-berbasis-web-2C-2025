<!-- auth/register.php -->
<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../assets/citrus-slice.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Zhizi Agency</title>
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
            height: 100%;
            background: url('../assets/ora.jpg') no-repeat left;
            background-size: cover;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            border: 1px solid #fe552a;
            border-radius: 0;
        }
        .btn-register {
            background-color: #fe552a;
            color: #fff;
            border: none;
            border-radius: 0;
            width: 100%;
        }
        .btn-register:hover {
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
        .login-link {
            font-size: 14px;
            margin-top: 20px;
        } 
    </style>
</head>
<body>
    <div class="left-panel">
        <div class="welcome-title">Join Zhizi!</div>
        <div class="welcome-subtitle">Where the tangerines welcome new stars</div>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-register mt-4">Register</button>
            <div class="login-link">
                Already have an account? <a href="login.php">Log in</a>
            </div>
        </form>
        <div class="blur-overlay"></div>
    </div>
    <div class="right-panel"></div>
</body>
</html>
