<?php
session_start();
if (!isset($_SESSION['login'])) header("Location: ../login.php");
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $tanggal = $_POST['tanggal'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    $sql = "INSERT INTO absensi (nip, tanggal, jam_masuk, jam_pulang) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nip, $tanggal, $jam_masuk, $jam_pulang);
    $stmt->execute();
    header("Location: ../index.php");
    exit;
}
?>

<html>
<head>
  <title>Input Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<?php include '../navbar.php'; ?>
<div class="container">
  <h3>Input Absensi</h3>
  <form method="post">
    <input name="nip" class="form-control mb-2" placeholder="NIP" required>
    <input name="tanggal" type="date" class="form-control mb-2" required>
    <input name="jam_masuk" type="time" class="form-control mb-2" required>
    <input name="jam_pulang" type="time" class="form-control mb-2" required>
    <button class="btn btn-success">Simpan</button>
  </form>
</div>
</body>
</html>
