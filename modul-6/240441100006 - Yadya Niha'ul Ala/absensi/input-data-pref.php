<?php
require_once '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota_asal = $_POST['kota_asal'];
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    $stmt = $conn->prepare("INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssssss", $nip, $nama, $umur, $jenis_kelamin, $departemen, $jabatan, $kota_asal, $tanggal_absensi, $jam_masuk, $jam_pulang);
    $stmt->execute();
    header("Location: input-data.php");
    exit();
}

// Handle delete
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM karyawan_absensi WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: input-data.php");
    exit();
}
?>
<?php include '../includes/header.php'; ?>
<h3>Input Data Absensi</h3>
<form method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3"><label>NIP</label><input type="text" name="nip" class="form-control" required></div>
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
            <div class="mb-3"><label>Umur</label><input type="number" name="umur" class="form-control" required></div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
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
            <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control" required></div>
            <div class="mb-3"><label>Kota Asal</label><input type="text" name="kota_asal" class="form-control" required></div>
            <div class="mb-3"><label>Tanggal Absensi</label><input type="date" name="tanggal_absensi" class="form-control" required></div>
            <div class="mb-3"><label>Jam Masuk</label><input type="time" name="jam_masuk" class="form-control" required></div>
            <div class="mb-3"><label>Jam Pulang</label><input type="time" name="jam_pulang" class="form-control" required></div>
        </div>
    </div>
    <div class="mt-4 d-flex gap-2">
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
        <button type="reset" class="btn btn-outline-secondary">Refresh</button>
        <button type="submit" class="btn btn-accent">Simpan</button>
    </div>
</form>

<hr>
<h4>Data Absensi</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NIP</th><th>Nama</th><th>Umur</th><th>Gender</th><th>Departemen</th><th>Jabatan</th><th>Kota</th><th>Tgl</th><th>Masuk</th><th>Pulang</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT * FROM karyawan_absensi");
        while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nip'] ?></td><td><?= $row['nama'] ?></td><td><?= $row['umur'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td><td><?= $row['departemen'] ?></td><td><?= $row['jabatan'] ?></td>
            <td><?= $row['kota_asal'] ?></td><td><?= $row['tanggal_absensi'] ?></td><td><?= $row['jam_masuk'] ?></td><td><?= $row['jam_pulang'] ?></td>
            <td>
                <a href="update-data.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Update</a>
                <a href="input-data.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>
