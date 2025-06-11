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

$sql = "DELETE FROM karyawan_absensi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: data.php");
exit();
