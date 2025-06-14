<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <meta http-equiv="refresh" content="3;url=indeks.php">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d4edda;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .logout-message {
            background-color: #e9f7ef;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #81c784;
            width: 300px;
            text-align: center;
        }

        .logout-message h2 {
            color: #2e7d32;
        }

        .logout-message p {
            color: #444;
        }

        .logout-message a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="logout-message">
        <h2>Logout Berhasil</h2>
        <p>Kamu akan diarahkan ke halaman login dalam 3 detik...</p>
        <p><a href="indeks.php">Klik di sini jika tidak diarahkan otomatis</a></p>
    </div>
</body>
</html>
