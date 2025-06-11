<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
require 'koneksi.php';

// Ambil data karyawan dan absensi dari database
$sql = "SELECT * FROM karyawan_absensi ORDER BY nama ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Karyawan & Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h3>Data Karyawan & Absensi</h3>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="dashboard.php" class="btn btn-secondary mb-3">Dashboard</a>
    <a href="logout.php" class="btn btn-danger mb-3 float-end">Logout</a>

    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
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
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
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
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="11" class="text-center">Tidak ada data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>




