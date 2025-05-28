<?php
session_start();
if (!isset($_SESSION['login'])) header("Location: ../login.php");
require '../db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM karyawan WHERE id=$id");
header("Location: ../index.php");
exit;
?>
