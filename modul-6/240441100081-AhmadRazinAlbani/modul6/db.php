<?php
$conn = new mysqli("localhost", "root", "", "manajemen_karyawan");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>