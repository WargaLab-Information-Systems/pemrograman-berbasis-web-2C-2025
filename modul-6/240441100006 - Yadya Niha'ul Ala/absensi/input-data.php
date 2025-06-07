<!-- absensi/input-data.php -->
<?php
require_once '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Ambil data karyawan untuk dropdown
$karyawan_result = $conn->query("SELECT nip, nama FROM karyawan");

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    // Ambil data dari tabel karyawan
    $query = $conn->prepare("SELECT nama, umur, jenis_kelamin, departemen, jabatan, kota_asal FROM karyawan WHERE nip = ?");
    $query->bind_param("s", $nip);
    $query->execute();
    $query->bind_result($nama, $umur, $jenis_kelamin, $departemen, $jabatan, $kota_asal);
    $query->fetch();
    $query->close();

    // Insert ke tabel absensi
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
    <div class="mb-3">
        <label>Pilih Karyawan</label>
        <select name="nip" class="form-control" required>
            <option value="">-- Pilih Karyawan --</option>
            <?php while ($k = $karyawan_result->fetch_assoc()): ?>
                <option value="<?= $k['nip'] ?>"><?= $k['nip'] ?> - <?= $k['nama'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3"><label>Tanggal Absensi</label><input type="date" name="tanggal_absensi" class="form-control" required></div>
    <div class="mb-3"><label>Jam Masuk</label><input type="time" name="jam_masuk" class="form-control" required></div>
    <div class="mb-3"><label>Jam Pulang</label><input type="time" name="jam_pulang" class="form-control" required></div>

    <div class="mt-4 d-flex gap-2">
        <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
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
        $result = $conn->query("SELECT * FROM karyawan_absensi ORDER BY tanggal_absensi DESC");
        while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nip'] ?></td><td><?= $row['nama'] ?></td><td><?= $row['umur'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td><td><?= $row['departemen'] ?></td><td><?= $row['jabatan'] ?></td>
            <td><?= $row['kota_asal'] ?></td><td><?= $row['tanggal_absensi'] ?></td><td><?= $row['jam_masuk'] ?></td><td><?= $row['jam_pulang'] ?></td>
            <td>
                <a href="update-data.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Update</a>
                <a href="input-data.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>
