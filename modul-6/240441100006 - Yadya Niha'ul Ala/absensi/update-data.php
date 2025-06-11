<!-- absensi/update-data.php -->
<?php
require_once '../config/db.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: input-data.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM karyawan_absensi WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    $stmt = $conn->prepare("UPDATE karyawan_absensi SET tanggal_absensi = ?, jam_masuk = ?, jam_pulang = ? WHERE id = ?");
    $stmt->bind_param("sssi", $tanggal_absensi, $jam_masuk, $jam_pulang, $id);
    $stmt->execute();
    header("Location: input-data.php");
    exit();
}
?>

<?php include '../includes/header.php'; ?>
<h3>Update Data Absensi</h3>
<form method="POST">
    <div class="mb-3"><label>NIP</label><input type="text" value="<?= $data['nip'] ?>" class="form-control" disabled></div>
    <div class="mb-3"><label>Nama</label><input type="text" value="<?= $data['nama'] ?>" class="form-control" disabled></div>
    <div class="mb-3"><label>Tanggal Absensi</label><input type="date" name="tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>" class="form-control" required></div>
    <div class="mb-3"><label>Jam Masuk</label><input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>" class="form-control" required></div>
    <div class="mb-3"><label>Jam Pulang</label><input type="time" name="jam_pulang" value="<?= $data['jam_pulang'] ?>" class="form-control" required></div>

    <div class="mt-4 d-flex gap-2 mb-4">
        <a href="input-data.php" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-accent">Update</button>
    </div>
</form>
<?php include '../includes/footer.php'; ?>