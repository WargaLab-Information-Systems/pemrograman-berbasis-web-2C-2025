<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssssss", $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'], $_POST['tanggal_absensi'], $_POST['jam_masuk'], $_POST['jam_pulang']);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Absensi</title></head>
<body>
<h2>Input Absensi</h2>
<form method="post">
NIP: <input type="text" name="nip" required><br>
Nama: <input type="text" name="nama" required><br>
Umur: <input type="number" name="umur" required><br>
Jenis Kelamin: <select name="jenis_kelamin"><option value="L">Laki-laki</option><option value="P">Perempuan</option></select><br>
Departemen: <input type="text" name="departemen"><br>
Jabatan: <input type="text" name="jabatan"><br>
Kota Asal: <input type="text" name="kota_asal"><br>
Tanggal Absensi: <input type="date" name="tanggal_absensi"><br>
Jam Masuk: <input type="time" name="jam_masuk"><br>
Jam Pulang: <input type="time" name="jam_pulang"><br>
<input type="submit" value="Simpan">
</form>
</body>
</html>