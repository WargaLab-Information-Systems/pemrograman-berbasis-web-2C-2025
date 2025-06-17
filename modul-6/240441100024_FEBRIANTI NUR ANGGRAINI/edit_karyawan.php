<?php
session_start();
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM karyawan_absensi WHERE id=$id")->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE karyawan_absensi SET nip=?, nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=?, tanggal_absensi=?, jam_masuk=?, jam_pulang=? WHERE id=?");
    $stmt->bind_param("ssisssssssi", $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'], $_POST['tanggal_absensi'], $_POST['jam_masuk'], $_POST['jam_pulang'], $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Karyawan</title></head>
<body>
<h2>Edit Data</h2>
<form method="post">
NIP: <input type="text" name="nip" value="<?= $data['nip'] ?>"><br>
Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
Umur: <input type="number" name="umur" value="<?= $data['umur'] ?>"><br>
Jenis Kelamin: <select name="jenis_kelamin">
<option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
<option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
</select><br>
Departemen: <input type="text" name="departemen" value="<?= $data['departemen'] ?>"><br>
Jabatan: <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>"><br>
Kota Asal: <input type="text" name="kota_asal" value="<?= $data['kota_asal'] ?>"><br>
Tanggal Absensi: <input type="date" name="tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>"><br>
Jam Masuk: <input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>"><br>
Jam Pulang: <input type="time" name="jam_pulang" value="<?= $data['jam_pulang'] ?>"><br>
<input type="submit" value="Update">
</form>
</body>
</html>