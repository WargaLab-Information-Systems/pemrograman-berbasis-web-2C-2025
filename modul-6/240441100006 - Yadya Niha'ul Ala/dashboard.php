<!-- dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
require_once 'config/db.php';

// total karyawan per departemen
$departemenCounts = [];
$departemenList = [
    "Produksi",
    "Pemasaran dan Promosi",
    "Kreatif",
    "Penjualan dan Distribusi",
    "Artis dan Pemeranan"
];

foreach ($departemenList as $dept) {
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM karyawan WHERE departemen = ?");
    $stmt->bind_param("s", $dept);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $departemenCounts[$dept] = $row['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="assets/citrus.png">
    <title>Dashboard | Zhizi Agency</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: red;
            
            overflow-x: hidden;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            background-color: #fe552a;
            color: white;
            width: 240px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            z-index: 10;
        }
        .sidebar h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            margin-bottom: 15px;
            display: block;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.1);
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }
        .logout {
            margin-top: auto;
        }
        .main-content {
            margin-left: 240px;
            height: 100vh;
            overflow-y: auto; /* ini yang bikin konten kanan bisa discroll sendiri */
            padding: 40px;
            background-color: #fff;
            box-sizing: border-box;
        }
        .greeting {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2a2d34;
        }
        .summary-box {
            border-left: 5px solid #fe552a;
            background-color: #fbf3f0;
            padding: 20px;
            border-radius: 6px;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .summary-title {
            margin: 0 0 10px 0;
            font-weight: bold;
            color: #2a2d34;
        }
        .summary-count {
            font-size: 20px;
            font-weight: bold;
            color: #fe552a;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                flex-direction: row;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                height: auto;
                overflow-y: visible;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Zhizi Agency</h2>
            <a href="absensi/input-data.php">Kelola Absensi</a>
            <!-- <a href="absensi/karyawan-data.php">Kelola Karyawan</a> -->
            <a href="absensi/karyawan.php">Kelola Karyawan</a>
        </div>
        <div class="logout">
            <a href="auth/logout.php">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="greeting">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>! Ready to eat tangerines today?</div>

        <?php foreach ($departemenCounts as $dept => $count): ?>
            <div class="summary-box">
                <p class="summary-title">Departemen <?= htmlspecialchars($dept) ?></p>
                <div class="summary-count">Total Karyawan: <?= $count ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
