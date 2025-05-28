<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'db.php';
?>

<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h3>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h3>
    <p>Gunakan menu di atas atau navigasi berikut:</p>
    <a href="karyawan/tambah.php" class="btn btn-primary">Tambah Karyawan</a>
    <a href="absensi/tambah.php" class="btn btn-success">Input Absensi</a>

     <h4 class="mt-4">Data Karyawan</h4>
<table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th>NIP</th><th>Nama</th><th>Umur</th><th>Jenis Kelamin</th><th>Departemen</th><th>Jabatan</th><th>Kota Asal</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = $conn->query("SELECT * FROM karyawan");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?= $row['nip'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['umur'] ?></td>
      <td><?= $row['jenis_kelamin'] ?></td>
      <td><?= $row['departemen'] ?></td>
      <td><?= $row['jabatan'] ?></td>
      <td><?= $row['kota_asal'] ?></td>
      <td>
        <a href="karyawan/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="karyawan/hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<h4 class="mt-5">Data Absensi</h4>
<table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th>NIP</th><th>Tanggal</th><th>Jam Masuk</th><th>Jam Pulang</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $absensi = $conn->query("SELECT * FROM absensi");
    while ($row = $absensi->fetch_assoc()):
    ?>
    <tr>
      <td><?= $row['nip'] ?></td>
      <td><?= $row['tanggal'] ?></td>
      <td><?= $row['jam_masuk'] ?></td>
      <td><?= $row['jam_pulang'] ?></td>
      <td>
        <a href="absensi/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="absensi/hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
    
</div>
</body>
</html>
