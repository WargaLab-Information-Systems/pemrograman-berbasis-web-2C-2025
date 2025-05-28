<?php
session_start();
if (!isset($_SESSION['login'])) header("Location: ../login.php");
require '../db.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM karyawan WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota_asal = $_POST['kota_asal'];

    $conn->query("UPDATE karyawan SET nip='$nip', nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin', departemen='$departemen', jabatan='$jabatan', kota_asal='$kota_asal' WHERE id=$id");
    header("Location: ../index.php");
    exit;
}
?>

<html>
<head>
  <title>Edit Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<?php include '../navbar.php'; ?>
<div class="container">
  <h3>Edit Karyawan</h3>
  <form method="post">
    <input name="nip" class="form-control mb-2" value="<?= $data['nip'] ?>" required>
    <input name="nama" class="form-control mb-2" value="<?= $data['nama'] ?>" required>
    <input name="umur" type="number" class="form-control mb-2" value="<?= $data['umur'] ?>" required>
    <select name="jenis_kelamin" class="form-control mb-2" required>
      <option <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
      <option <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select>
    <input name="departemen" class="form-control mb-2" value="<?= $data['departemen'] ?>" required>
    <input name="jabatan" class="form-control mb-2" value="<?= $data['jabatan'] ?>" required>
    <input name="kota_asal" class="form-control mb-2" value="<?= $data['kota_asal'] ?>" required>
    <button class="btn btn-success">Update</button>
  </form>
</div>
</body>
</html>
