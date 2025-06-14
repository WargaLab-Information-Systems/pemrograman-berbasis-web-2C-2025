<?php 
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM karyawan_absensi WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d4edda;
        }
        .card {
            background-color: #e9f7ef;
            box-shadow: 0 0 10px #81c784;
        }
        h4 {
            color: #2e7d32;
        }
        .btn-danger {
            background-color: #4caf50;
            border-color: #4caf50;
            color: white;
        }
        .btn-danger:hover {
            background-color: #388e3c;
            border-color: #388e3c;
            color: white;
        }
        .btn-secondary {
            background-color: #a5d6a7;
            border-color: #81c784;
            color: #2e7d32;
        }
        .btn-secondary:hover {
            background-color: #81c784;
            border-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 rounded text-center">
                <h4>Yakin ingin menghapus data ini?</h4>
                <p><strong><?= htmlspecialchars($data['nama']) ?> (<?= htmlspecialchars($data['nip']) ?>)</strong></p>
                <form method="post" action="delete_karyawan.php">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
