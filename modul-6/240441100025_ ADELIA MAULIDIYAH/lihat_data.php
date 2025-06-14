<?php
session_start();
if (!isset($_SESSION['login'])) header('Location: indeks.php');
include 'db.php';
$result = $conn->query("SELECT * FROM karyawan_absensi");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi</title>
    <style>
        body {
            background-color: #fdf6e3;
            font-family: 'Georgia', serif;
            color: #5b4636;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .top-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .top-link a {
            text-decoration: none;
            background-color: #a47149;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .top-link a:hover {
            background-color: #8c5a34;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #d4b48c;
            text-align: center;
        }

        th {
            background-color: #e5c49e;
            color: #3e2e20;
        }

        tr:nth-child(even) {
            background-color: #f5e1c0;
        }

        tr:hover {
            background-color: #f0d5a8;
        }

        a.action-link {
            color: #4b2e1e;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Data Absensi Karyawan</h2>

<div class="top-link">
    <a href="dashboard.php">⬅ Kembali ke Dashboard</a>
</div>

<table>
    <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Jenis Kelamin</th>
        <th>Departemen</th>
        <th>Jabatan</th>
        <th>Kota Asal</th>
        <th>Tanggal Absensi</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['nip']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= $row['umur'] ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= htmlspecialchars($row['departemen']) ?></td>
        <td><?= htmlspecialchars($row['jabatan']) ?></td>
        <td><?= htmlspecialchars($row['kota_asal']) ?></td>
        <td><?= $row['tanggal_absensi'] ?></td>
        <td><?= $row['jam_masuk'] ?></td>
        <td><?= $row['jam_pulang'] ?></td>
        <td>
            <a class="action-link" href="edit_karyawan.php?id=<?= $row['id'] ?>">Edit</a> |
            <a class="action-link" href="delete_karyawan.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>