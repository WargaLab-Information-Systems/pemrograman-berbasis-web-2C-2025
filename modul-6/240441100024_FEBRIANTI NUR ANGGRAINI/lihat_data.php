<?php
session_start();
if (!isset($_SESSION['login'])) header('Location: index.php');
include 'db.php';
$result = $conn->query("SELECT * FROM karyawan_absensi");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Data Karyawan</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

    body {
        background: #f4eee1;
        font-family: 'Playfair Display', serif;
        color: #5b3a29;
        margin: 0;
        padding: 50px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        box-sizing: border-box;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #6e4b28;
        text-shadow: 1px 1px 0 #c9b99a;
    }

    .btn-container {
        margin-bottom: 30px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn {
        background-color: #a67c52;
        color: #fff8f0;
        border: 2px solid #5b3a29;
        border-radius: 8px;
        padding: 8px 18px;
        text-decoration: none;
        font-weight: bold;
        font-family: 'Playfair Display', serif;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        background-color: #d7c0a3;
        color: #5b3a29;
        box-shadow: 3px 4px 10px rgba(91, 58, 41, 0.3);
    }

    .table-container {
        background-color: #fff8f0;
        border: 3px solid #a67c52;
        border-radius: 16px;
        box-shadow: 5px 6px 14px rgba(166,124,82,0.3);
        overflow-x: auto;
        width: 100%;
        max-width: 1000px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #d7c0a3;
    }

    th {
        background-color: #d7c0a3;
        color: #5b3a29;
        font-size: 18px;
    }

    tr:nth-child(even) {
        background-color: #f4eee1;
    }

    tr:hover {
        background-color: #e8d8c3;
    }

    .aksi-btn {
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        margin-right: 5px;
        display: inline-block;
        transition: all 0.3s ease;
        border: 1px solid #5b3a29;
        font-family: 'Playfair Display', serif;
    }

    .edit-btn {
        background-color: #a67c52;
        color: #fff8f0;
    }

    .edit-btn:hover {
        background-color: #c19a6b;
        color: #5b3a29;
    }

    .hapus-btn {
        background-color: #c94c4c;
        color: #fff8f0;
    }

    .hapus-btn:hover {
        background-color: #a93f3f;
        color: #f4eee1;
    }
</style>
</head>
<body>

<h1>Data Karyawan</h1>

<div class="btn-container">
    <a href="absensi.php" class="btn">Tambah Data</a>
    <a href="logout.php" class="btn">Logout</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nip']); ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['umur']); ?></td>
                <td>
                    <a href="edit_karyawan.php?id=<?= $row['id'] ?>" class="aksi-btn edit-btn">Edit</a>
                    <a href="delete_karyawan.php?id=<?= $row['id'] ?>" class="aksi-btn hapus-btn" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
