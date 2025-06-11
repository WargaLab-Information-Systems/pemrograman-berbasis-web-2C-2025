<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
require 'koneksi.php';

if (!isset($_GET['id'])) {
  header("Location: data.php");
  exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM karyawan_absensi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
  echo "Data tidak ditemukan.";
  exit();
}
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $departemen = $_POST['departemen'];
  $jabatan = $_POST['jabatan'];
  $kota_asal = $_POST['kota_asal'];
  $tanggal_absensi = $_POST['tanggal_absensi'];
  $jam_masuk = $_POST['jam_masuk'];
  $jam_pulang = $_POST['jam_pulang'];


  if (empty($nip) || empty($nama) || empty($umur) || empty($jenis_kelamin) || empty($departemen) || empty($jabatan) || empty($kota_asal) || empty($tanggal_absensi) || empty($jam_masuk) || empty($jam_pulang)) {
    $error = "Semua field wajib diisi!";
  } else {
    $update = "UPDATE karyawan_absensi SET nip=?, nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=?, tanggal_absensi=?, jam_masuk=?, jam_pulang=? WHERE id=?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("sissssssssi", $nip, $nama, $umur, $jenis_kelamin, $departemen, $jabatan, $kota_asal, $tanggal_absensi, $jam_masuk, $jam_pulang, $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      header("Location: data.php");
      exit();
    } else {
      $error = "Gagal mengupdate data atau tidak ada perubahan.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Data Karyawan & Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Data Karyawan & Absensi</h3>
    <a href="data.php" class="btn btn-secondary mb-3">Kembali ke Data</a>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" id="nip" name="nip" class="form-control" value="<?= htmlspecialchars($data['nip']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="umur" class="form-label">Umur</label>
        <input type="number" id="umur" name="umur" class="form-control" value="<?= htmlspecialchars($data['umur']) ?>" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label><br />
        <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" <?= $data['jenis_kelamin']=='Laki-laki'?'checked':'' ?> required />
        <label for="laki">Laki-laki</label>
        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" <?= $data['jenis_kelamin']=='Perempuan'?'checked':'' ?> required />
        <label for="perempuan">Perempuan</label>
      </div>
      <div class="mb-3">
        <label for="departemen" class="form-label">Departemen</label>
        <input type="text" id="departemen" name="departemen" class="form-control" value="<?= htmlspecialchars($data['departemen']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" id="jabatan" name="jabatan" class="form-control" value="<?= htmlspecialchars($data['jabatan']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="kota_asal" class="form-label">Kota Asal</label>
        <input type="text" id="kota_asal" name="kota_asal" class="form-control" value="<?= htmlspecialchars($data['kota_asal']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="tanggal_absensi" class="form-label">Tanggal Absensi</label>
        <input type="date" id="tanggal_absensi" name="tanggal_absensi" class="form-control" value="<?= htmlspecialchars($data['tanggal_absensi']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="jam_masuk" class="form-label">Jam Masuk</label>
        <input type="time" id="jam_masuk" name="jam_masuk" class="form-control" value="<?= htmlspecialchars($data['jam_masuk']) ?>" required />
      </div>
      <div class="mb-3">
        <label for="jam_pulang" class="form-label">Jam Pulang</label>
        <input type="time" id="jam_pulang" name="jam_pulang" class="form-control" value="<?= htmlspecialchars($data['jam_pulang']) ?>" required />
      </div>

      <button type="submit" name="submit" class="btn btn-success">Update Data</button>
    </form>
  </div>
</body>
</html>
