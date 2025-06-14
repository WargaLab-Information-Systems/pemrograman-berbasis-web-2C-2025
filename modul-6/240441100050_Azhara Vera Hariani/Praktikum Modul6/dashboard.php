<?php  
session_start(); 
if (!isset($_SESSION['login'])) header('Location: index.php'); 
include 'db.php'; 

$result = $conn->query("SELECT * FROM karyawan_absensi"); 

?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Dashboard</title> 
    <!-- Bootstrap CDN --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style> 
        body {
            background: linear-gradient(to right, rgb(173, 147, 200), rgb(104, 62, 173));
            min-height: 100vh;
            padding-top: 60px;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(98, 91, 91, 0.2);
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .action-links a {
            margin: 0 5px;
        }
    </style>
</head> 
<body> 

<div class="container col-md-11"> 
    <h2>Data Absensi Karyawan</h2> 
    <div class="mb-3 text-end"> 
        <a href='absensi.php' class="btn btn-success btn-sm">Tambah Data</a> 
        <a href='logout.php' class="btn btn-danger btn-sm">Logout</a> 
    </div> 

    <table class="table table-bordered table-striped"> 
        <thead class="table-dark"> 
            <tr> 
                <th>No</th> 
                <th>NIP</th> 
                <th>Nama</th> 
                <th>Umur</th> 
                <th>Jenis Kelamin</th> 
                <th>Tanggal Absensi</th> 
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Aksi</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php $no = 1; while($row = $result->fetch_assoc()): ?> 
            <tr> 
                <td><?= $no++ ?></td> 
                <td><?= htmlspecialchars($row['nip']) ?></td> 
                <td><?= htmlspecialchars($row['nama']) ?></td> 
                <td><?= htmlspecialchars($row['umur']) ?></td> 
                <td><?= $row['jenis_kelamin'] == 'Laki-laki' ? 'Laki-laki' : 'Perempuan' ?></td>
                
                <td><?= htmlspecialchars($row['tanggal_absensi']) ?></td> 
                <td><?= htmlspecialchars($row['jam_masuk']) ?></td> 
                <td><?= isset($row['jam_pulang']) ? htmlspecialchars($row['jam_pulang']) : '-' ?></td>


                <td class="action-links"> 
                    <a href='edit_karyawan.php?id=<?= $row['id'] ?>' class="btn btn-warning btn-sm">Edit</a> 
                    <a href='delete_karyawan.php?id=<?= $row['id'] ?>' class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a> 
                </td> 
            </tr> 
            <?php endwhile; ?> 
        </tbody> 
    </table> 
</div> 

</body> 
</html>