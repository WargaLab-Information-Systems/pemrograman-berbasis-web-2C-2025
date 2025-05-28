<?php
require '../db.php';

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM absensi WHERE id = $id");
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $tanggal = $_POST['tanggal'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    $conn->query("UPDATE absensi SET nip='$nip', tanggal='$tanggal', jam_masuk='$jam_masuk', jam_pulang='$jam_pulang' WHERE id = $id");

    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h3>Edit Data Absensi</h3>
    <form method="post">
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" value="<?= $data['jam_masuk'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Jam Pulang</label>
            <input type="time" name="jam_pulang" class="form-control" value="<?= $data['jam_pulang'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="../index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
