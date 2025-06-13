<?php
include 'config.php';
$nip = $_GET['nip'];
$data = $conn->query("SELECT * FROM karyawan_absensi WHERE nip='$nip'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE karyawan_absensi SET nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=?, tanggal=?, jam_masuk=?, jam_pulang=? WHERE nip=?");
    $stmt->bind_param("sissssssss",
        $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'],
        $_POST['jabatan'], $_POST['kota_asal'], $_POST['tanggal'], $_POST['jam_masuk'],
        $_POST['jam_pulang'], $nip);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="bg-warning p-3 rounded-2 shadow-sm text-white">
        <h2>Edit Data Karyawan</h2>
    </div>
    <br>
    <form method="POST">
        <?php foreach ($data as $key => $value): if ($key == 'nip') continue; ?>
        <div class="mb-2">
            <label><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
            <input type="<?= ($key == 'tanggal') ? 'date' : (($key == 'jam_masuk' || $key == 'jam_pulang') ? 'time' : 'text') ?>" name="<?= $key ?>" value="<?= $value ?>" class="form-control" required>
        </div>
        <?php endforeach; ?>
        <br>
        <button class="btn btn-warning shadow-sm text-white">Update</button>
        <a href="dashboard.php" class="btn btn-danger shadow-sm">Kembali</a>
    </form>
</body>
</html>
