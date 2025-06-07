<!-- absensi/karyawan.php -->
<?php
require_once '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kota_asal = $_POST['kota_asal'];
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];

    $stmt = $conn->prepare("INSERT INTO karyawan (nip, nama, umur, jenis_kelamin, kota_asal, departemen, jabatan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $nip, $nama, $umur, $jenis_kelamin, $kota_asal, $departemen, $jabatan);
    $stmt->execute();
}

// Hapus data
if (isset($_GET['hapus_nip'])) {
    $nip = $_GET['hapus_nip'];
    $stmt = $conn->prepare("DELETE FROM karyawan WHERE nip = ?");
    $stmt->bind_param("s", $nip);
    $stmt->execute();
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h3 class="mb-4">Manajemen Data Karyawan</h3>

    <!-- Form Tambah -->
    <form method="POST" class="mb-4">
    <input type="hidden" name="add" value="1">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                </div>
                <div class="col-md-6">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="col-md-6">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" placeholder="Umur" required>
                </div>
                <div class="col-md-6">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Kota Asal</label>
                    <input type="text" name="kota_asal" class="form-control" placeholder="Kota Asal" required>
                </div>
                <div class="col-md-6">
                    <label>Departemen</label>
                    <select name="departemen" class="form-control" required>
                        <option value="">-- Pilih Departemen --</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Pemasaran dan Promosi">Pemasaran dan Promosi</option>
                        <option value="Kreatif">Kreatif</option>
                        <option value="Penjualan dan Distribusi">Penjualan dan Distribusi</option>
                        <option value="Artis dan Pemeranan">Artis dan Pemeranan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-accent">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>


    <hr>
    <!-- Tabel Data -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Kota Asal</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT id, nip, nama, umur, jenis_kelamin, kota_asal, departemen, jabatan FROM karyawan ORDER BY id DESC";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['umur'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['kota_asal'] ?></td>
                <td><?= $row['departemen'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td>
                    <a href="karyawan.php?hapus_nip=<?= $row['nip'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="mb-3">
        <a href="../dashboard.php" class="btn btn-outline-accent">← Kembali</a>
    </div>

</div>
<?php include '../includes/footer.php'; ?>