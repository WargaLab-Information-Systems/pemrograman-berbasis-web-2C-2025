<?php
session_start();
if (!isset($_SESSION['login'])) header('Location: index.php');
include 'db.php';
$result = $conn->query("SELECT * FROM karyawan_absensi");
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Data Karyawan</h2>
<a href='absensi.php'>Tambah Data</a> | <a href='logout.php'>Logout</a><br><br>
<table border='1'>
<tr><th>No</th><th>NIP</th><th>Nama</th><th>Umur</th><th>Aksi</th></tr>
<?php $no=1; while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nip'] ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['umur'] ?></td>
<td>
<a href='edit_karyawan.php?id=<?= $row['id'] ?>'>Edit</a> | 
<a href='delete_karyawan.php?id=<?= $row['id'] ?>'>Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>