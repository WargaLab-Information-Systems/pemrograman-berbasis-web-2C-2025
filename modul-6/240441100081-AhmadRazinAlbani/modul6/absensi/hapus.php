<?php
require '../db.php';

if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM absensi WHERE id = $id");

header("Location: ../index.php");
exit;
