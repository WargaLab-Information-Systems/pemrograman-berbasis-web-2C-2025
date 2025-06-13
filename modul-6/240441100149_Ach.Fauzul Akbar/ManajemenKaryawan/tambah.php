<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal, jam_masuk, jam_pulang)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssssss",
        $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'],
        $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'],
        $_POST['tanggal'], $_POST['jam_masuk'], $_POST['jam_pulang']);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
    document.querySelector("form").addEventListener("submit", function(e) {
        const umur = document.querySelector("[name='umur']");
        if (umur.value < 18 || umur.value > 65) {
            alert("Umur harus antara 18-65 tahun.");
            umur.focus();
            e.preventDefault();
            }
        });
    </script>

</head>
<body class="container mt-4">
    <div class="bg-success text-white p-3 m-center rounded-2 shadow-sm">
        <h2>Tambah Karyawan & Absensi</h2>
    </div>
    <br>
    <form method="POST">
        <?php $fields = ["nip", "nama", "umur", "jenis_kelamin", "departemen", "jabatan", "kota_asal", "tanggal", "jam_masuk", "jam_pulang"]; foreach ($fields as $f): ?>
        <div class="mb-2">
            <label><?= ucfirst(str_replace('_', ' ', $f)) ?></label>
            <input type="<?= ($f == 'tanggal') ? 'date' : (($f == 'jam_masuk' || $f == 'jam_pulang') ? 'time' : 'text') ?>" name="<?= $f ?>" class="form-control" required>
        </div>
        <?php endforeach; ?>
        <br>
        <button class="btn btn-success shadow-sm">Simpan</button>
        <a href="dashboard.php" class="btn btn-danger shadow-sm">Kembali</a>
    </form>

</body>
</html>
