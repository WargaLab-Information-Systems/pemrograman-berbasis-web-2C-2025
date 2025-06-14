<?php  
session_start();
if (!isset($_SESSION['login'])) header('Location: indeks.php');
include 'db.php';
$result = $conn->query("SELECT * FROM karyawan_absensi");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #d4edda, #a8d5a2);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px 0;
        }
        .container {
            max-width: 1200px;
        }
        h2.text-dark {
            color: #2e7d32;
            font-weight: 700;
            letter-spacing: 1.1px;
        }
        .table-container {
            background-color: #f0f9f4;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.3);
        }
        .table thead {
            background-color: #81c784;
            color: #1b5e20;
        }
        .table tbody tr:hover {
            background-color: #c8e6c9;
        }
        .btn-success, .btn-warning, .btn-danger {
            font-weight: 600;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #1b5e20;
        }
        .btn-warning:hover {
            background-color: #4caf50;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #81c784;
            color: #145214;
        }
        @media (max-width: 576px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark">Data Karyawan & Absensi</h2>
        <div>
            <a href='absensi.php' class="btn btn-sm btn-success">Tambah Data</a>
            <a href='logout.php' class="btn btn-sm btn-danger">Logout</a>
        </div>
    </div>
    <div class="table-container table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead>
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
            </thead>
            <tbody>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nip']) ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['umur']) ?></td>
                    <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                    <td><?= htmlspecialchars($row['departemen']) ?></td>
                    <td><?= htmlspecialchars($row['jabatan']) ?></td>
                    <td><?= htmlspecialchars($row['kota_asal']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_absensi']) ?></td>
                    <td><?= htmlspecialchars($row['jam_masuk']) ?></td>
                    <td><?= htmlspecialchars($row['jam_pulang']) ?></td>
                    <td>
                        <a href="edit_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="delete_karyawan.php" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
