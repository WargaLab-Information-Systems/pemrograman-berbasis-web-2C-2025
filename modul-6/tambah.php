<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
  $nip        = $_POST['nip'];
  $nama       = $_POST['nama'];
  $umur       = $_POST['umur'];
  $jk         = $_POST['jk'];
  $departemen = $_POST['departemen'];
  $jabatan    = $_POST['jabatan'];
  $kota       = $_POST['kota'];
  $tanggal    = $_POST['tanggal'];
  $masuk      = $_POST['masuk'];
  $pulang     = $_POST['pulang'];

  $sql = "INSERT INTO karyawan_absensi 
          (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang)
          VALUES 
          ('$nip', '$nama', '$umur', '$jk', '$departemen', '$jabatan', '$kota', '$tanggal', '$masuk', '$pulang')";



  if ($conn->query($sql)) {
    header("Location: data.php");
    exit();
  } else {
    $error = "Gagal menyimpan data: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3 class="mb-4">Form Tambah Data Karyawan & Absensi</h3>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>NIP</label>
          <input type="text" name="nip" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="col-md-3 mb-3">
          <label>Umur</label>
          <input type="number" name="umur" class="form-control" required>
        </div>
        <div class="col-md-3 mb-3">
          <label>Jenis Kelamin</label>
          <select name="jk" class="form-control" required>
            <option value="">--Pilih--</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label>Departemen</label>
          <input type="text" name="departemen" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Kota Asal</label>
          <input type="text" name="kota" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
          <label>Tanggal Absensi</label>
          <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
          <label>Jam Masuk</label>
          <input type="time" name="masuk" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
          <label>Jam Pulang</label>
          <input type="time" name="pulang" class="form-control" required>
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      <a href="data.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
