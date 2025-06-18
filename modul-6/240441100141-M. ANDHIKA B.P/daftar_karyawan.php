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
    <title>Daftar Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    .hover-text:hover {
        background-color:rgba(248, 249, 250, 0.25);
        border-radius: 5px;
        transition: color 0.2s ease-in-out;
    }
    .aksi-btns {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .aksi-btns a {
        color: inherit;
        text-decoration: none;
    }
    .aksi-btns a:hover {
        color: #0d6efd;
    }
    th.aksi-col, td.aksi-col {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        padding: 0 !important;
    }

    .table-row-aksi {
        position: relative;
    }
    .aksi-btns {
        display: flex;
        gap: 8px;
        align-items: center;
        position: absolute;
        right: -60px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
        background: transparent;
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
        <h4 class="mt-5">Daftar Karyawan</h4>
        <table class='table table-bordered table-hover mt-3 text-center'>
            <thead>
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
                    <th class="aksi-col"></th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="align-middle table-row-aksi">
                    <td><?php echo $row['nip']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['umur']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['departemen']; ?></td>
                    <td><?php echo $row['jabatan']; ?></td>
                    <td><?php echo $row['kota_asal']; ?></td>
                    <td><?php echo $row['tanggal_absensi']; ?></td>
                    <td><?php echo $row['jam_masuk']; ?></td>
                    <td><?php echo $row['jam_pulang']; ?></td>
                    <td class="aksi-col">
                        <span class="aksi-btns">
                            <a href="javascript:void(0);" class="p-0" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>
                            <a href="?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')" class="p-0">
                                <i class="bi bi-trash fs-5"></i>
                            </a>
                        </span>
                    </td>
                </tr>
                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Karyawan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="text" name="nip" value="<?php echo $row['nip']; ?>" required class="form-control mb-2">
                                        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required class="form-control mb-2">
                                        <input type="number" name="umur" value="<?php echo $row['umur']; ?>" required class="form-control mb-2" min="1">
                                        <select name="jenis_kelamin" class="form-control mb-2" required>
                                            <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                        <input type="text" name="departemen" value="<?php echo $row['departemen']; ?>" required class="form-control mb-2">
                                        <input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>" required class="form-control mb-2">
                                        <input type="text" name="kota_asal" value="<?php echo $row['kota_asal']; ?>" required class="form-control mb-2">
                                        <input type="date" name="tanggal_absensi" value="<?php echo $row['tanggal_absensi']; ?>" required class="form-control mb-2">
                                        <input type="time" name="jam_masuk" value="<?php echo $row['jam_masuk']; ?>" required class="form-control mb-2">
                                        <input type="time" name="jam_pulang" value="<?php echo $row['jam_pulang']; ?>" required class="form-control mb-2">
                                        <button type="submit" name="update_karyawan" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        </tbody>
        </table>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
