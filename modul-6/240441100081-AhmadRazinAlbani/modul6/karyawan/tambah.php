<?php
session_start();
if (!isset($_SESSION['login'])) header("Location: ../login.php");

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota_asal = $_POST['kota_asal'];

    $sql = "INSERT INTO karyawan (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissss", $nip, $nama, $umur, $jenis_kelamin, $departemen, $jabatan, $kota_asal);
    $stmt->execute();

    header("Location: ../index.php");
    exit;
}
?>

<html>
<head>
  <title>Tambah Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<?php include '../navbar.php'; ?>
<div class="container">
  <h3>Tambah Karyawan</h3>
  <form method="post">
    <input name="nip" class="form-control mb-2" placeholder="NIP" required>
    <input name="nama" class="form-control mb-2" placeholder="Nama" required>
    <input name="umur" type="number" class="form-control mb-2" placeholder="Umur" required>
    <select name="jenis_kelamin" class="form-control mb-2" required>
      <option value="">Pilih Jenis Kelamin</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
    <input name="departemen" class="form-control mb-2" placeholder="Departemen" required>
    <input name="jabatan" class="form-control mb-2" placeholder="Jabatan" required>
    <input name="kota_asal" class="form-control mb-2" placeholder="Kota Asal" required>
    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
</body>
</html>
