<?php 
include 'db.php';

if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "ID tidak ditemukan. Penghapusan dibatalkan.";
    exit;
}

$id = (int)$_POST['id'];

// Ambil data karyawan sebelum hapus, untuk ditampilkan di konfirmasi
$stmt = $conn->prepare("SELECT nama, nip FROM karyawan_absensi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    $query = "DELETE FROM karyawan_absensi WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error menghapus data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #d4edda, #a8d5a2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .card {
            background-color: #f0f9f4;
            box-shadow: 0 8px 24px rgba(46, 125, 50, 0.3);
            border-radius: 20px;
            padding: 30px 25px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        h4 {
            color: #2e7d32; /* hijau gelap */
            margin-bottom: 20px;
            font-weight: 700;
        }
        p strong {
            color: #1b5e20;
            font-size: 1.2rem;
        }
        .btn-danger {
            background-color: #a5d6a7;
            border-color: #a5d6a7;
            color: #1b5e20;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 25px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        .btn-danger:hover {
            background-color: #81c784;
            border-color: #81c784;
            color: #145214;
        }
        .btn-secondary {
            background-color: #dcedc8;
            border-color: #dcedc8;
            color: #558b2f;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 25px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #c5e1a5;
            border-color: #c5e1a5;
            color: #33691e;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <h4>Yakin ingin menghapus data ini?</h4>
        <p><strong><?= htmlspecialchars($data['nama']) ?> (<?= htmlspecialchars($data['nip']) ?>)</strong></p>
        <form method="post" action="delete_karyawan.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <input type="hidden" name="confirm" value="1" />
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="dashboard.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
