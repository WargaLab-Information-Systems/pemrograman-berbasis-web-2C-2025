<?php
session_start();
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM karyawan_absensi WHERE id=$id");
header("Location: dashboard.php");
?>