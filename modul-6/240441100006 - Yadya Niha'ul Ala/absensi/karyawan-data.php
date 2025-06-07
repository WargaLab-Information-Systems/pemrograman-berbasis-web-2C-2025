<?php
require_once '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<?php include '../includes/header.php'; ?>
<h3>Data Karyawan</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Jabatan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT DISTINCT nip, nama, departemen, jabatan FROM karyawan_absensi");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['nip'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['departemen'] ?></td>
            <td><?= $row['jabatan'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="mb-3">
    <a href="../dashboard.php" class="btn btn-outline-accent">← Kembali</a>
</div>

<?php include '../includes/footer.php'; ?>
