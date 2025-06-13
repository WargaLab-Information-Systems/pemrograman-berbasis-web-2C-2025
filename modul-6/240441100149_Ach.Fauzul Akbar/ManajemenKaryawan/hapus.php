<?php
include 'config.php';
$nip = $_GET['nip'];
$conn->query("DELETE FROM karyawan_absensi WHERE nip='$nip'");
header("Location: dashboard.php");
?>
