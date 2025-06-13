<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
include 'config.php';

$result = $conn->query("SELECT * FROM karyawan_absensi");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="bg-primary text-white p-3 rounded-2 shadow-sm">
        <h2 class="">Data Karyawan dan Absensi</h2>
    </div>
<br>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>NIP</th><th>Nama</th><th>Umur</th><th>Jenis Kelamin</th><th>Departemen</th><th>Jabatan</th><th>Kota</th>
                <th>Tanggal</th><th>Masuk</th><th>Pulang</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <center>
            <tr>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['umur'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['departemen'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= $row['kota_asal'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['jam_masuk'] ?></td>
                <td><?= $row['jam_pulang'] ?></td>
                <td>
                    <a href="edit.php?nip=<?= $row['nip'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?nip=<?= $row['nip'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            </center>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="py-3">
    <a href="tambah.php" class="btn btn-primary mb-2 py-2 shadow-sm">+ Tambah Data</a>
<a href="logout.php" class="btn btn-danger mb-2 py-2 shadow-sm">Logout</a>    
    </div>
</body>
</html>
