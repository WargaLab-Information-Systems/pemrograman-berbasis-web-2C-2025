<?php
session_start();
$conn = new mysqli('localhost', 'root', 'pamekasan2005', 'manajemen_karyawan');
if ($conn->connect_error) die('Koneksi gagal: ' . $conn->connect_error);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy(); 
    header('Location: login.php');
    exit();
}

$error_message = "";
if (isset($_POST['tambah_karyawan'])) {
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

    if ($umur < 1) {
        $error_message = "Umur tidak boleh kurang dari 1.";
    } elseif (!is_numeric($nip) || empty($nip)) {
        $error_message = "Input Tidak Valid!";
    } elseif (empty($nama)) {
        $error_message = "Nama Tidak Boleh Kosong!";
    } elseif ($jam_masuk >= $jam_pulang) {
        $error_message = "Jam pulang harus lebih besar dari jam masuk.";
    } else {
        $checkNip = $conn->query("SELECT * FROM karyawan_absensi WHERE nip='$nip'");
        if ($checkNip->num_rows > 0) {
            $error_message = "NIP sudah terdaftar.";
        } else {
            $conn->query("INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) 
                          VALUES ('$nip', '$nama', '$umur', '$jenis_kelamin', '$departemen', '$jabatan', '$kota_asal', '$tanggal_absensi', '$jam_masuk', '$jam_pulang')");
        }
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM karyawan_absensi WHERE id=$id");
}

if (isset($_POST['update_karyawan'])) {
    $id = $_POST['id'];
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

    if ($umur < 1) {
        $error_message = "Umur tidak boleh kurang dari 1.";
    } elseif (!is_numeric($nip) || empty($nip)) {
        $error_message = "Input Tidak Valid!";
    } elseif (empty($nama)) {
        $error_message = "Nama Tidak Boleh Kosong!";
    } elseif ($jam_masuk >= $jam_pulang) {
        $error_message = "Jam pulang harus lebih besar dari jam masuk.";
    } else {
        $conn->query("UPDATE karyawan_absensi SET 
                      nip='$nip', nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin', 
                      departemen='$departemen', jabatan='$jabatan', kota_asal='$kota_asal', 
                      tanggal_absensi='$tanggal_absensi', jam_masuk='$jam_masuk', jam_pulang='$jam_pulang' 
                      WHERE id=$id");
    }
}

$result = $conn->query("SELECT * FROM karyawan_absensi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .hover-text:hover {
            background-color:rgba(248, 249, 250, 0.25);
            border-radius: 5px;
            transition: color 0.2s ease-in-out;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-semibold" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-white" href="input_data.php">Input Data</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="daftar_karyawan.php">Tampilkan Daftar</a>
                </li>
            </ul>
            <a href="?logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h3 class="mt-3 text-center">Data Karyawan</h3>
    
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
    
        <div class="card my-3 w-50 mx-auto">
            <div class="card-body">
                <form method="POST" id="karyawanForm">
                    <input type="text" name="nip" placeholder="NIP" required class="form-control mb-2" id="nip">
                    <input type="text" name="nama" placeholder="Nama" required class="form-control mb-2" id="nama">
                    <input type="number" name="umur" placeholder="Umur" required class="form-control mb-2" id="umur" min="1">
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" name="departemen" placeholder="Departemen" required class="form-control mb-2" id="departemen">
                    <input type="text" name="jabatan" placeholder="Jabatan" required class="form-control mb-2" id="jabatan">
                    <input type="text" name="kota_asal" placeholder="Kota Asal" required class="form-control mb-2" id="kota_asal">
                    <input type="date" name="tanggal_absensi" required class="form-control mb-2" id="tanggal_absensi">
                    <input type="time" name="jam_masuk" required class="form-control mb-2" id="jam_masuk">
                    <input type="time" name="jam_pulang" required class="form-control mb-2" id="jam_pulang">
                    <button type="submit" name="tambah_karyawan" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
</body>
</html>
