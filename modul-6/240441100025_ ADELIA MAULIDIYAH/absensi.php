<?php   
session_start();
include 'db.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssssss", $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'], $_POST['tanggal_absensi'], $_POST['jam_masuk'], $_POST['jam_pulang']);
    
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success">✅ Data berhasil disimpan!</div>';
        header("Location: dashboard.php");
        exit;
    } else {
        $msg = '<div class="alert alert-danger">❌ Gagal menyimpan data: ' . htmlspecialchars($stmt->error) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Input Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #d4edda, #a8d5a2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-card {
            background-color: #f0f9f4;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.3);
            padding: 40px 30px;
            max-width: 600px;
            width: 100%;
            color: #1e3d16;
        }
        .form-card h2 {
            color: #2e7d32;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            letter-spacing: 1.2px;
        }
        label {
            font-weight: 600;
            color: #2e7d32;
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #66bb6a;
            padding: 10px 12px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #388e3c;
            box-shadow: 0 0 8px #388e3c55;
            outline: none;
        }
        .btn-primary {
            background-color: #2e7d32;
            border-color: #2e7d32;
            font-weight: 600;
            padding: 10px 30px;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1b5e20;
            border-color: #1b5e20;
        }
        .btn-secondary {
            background-color: #a5d6a7;
            border-color: #a5d6a7;
            color: #1b5e20;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border-radius: 12px;
        }
        .btn-secondary:hover {
            background-color: #81c784;
            border-color: #81c784;
            color: #145214;
        }
        .alert {
            font-weight: 600;
            text-align: center;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div class="form-card shadow-sm">
    <h2>Form Input Absensi</h2>
    <?php echo $msg; ?>
    <form method="post" novalidate>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" id="nip" name="nip" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" required />
            </div>
            <div class="col-md-4">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" id="umur" name="umur" class="form-control" required min="0" />
            </div>
            <div class="col-md-8">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="departemen" class="form-label">Departemen</label>
                <input type="text" id="departemen" name="departemen" class="form-control" />
            </div>
            <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-control" />
            </div>
            <div class="col-md-6">
                <label for="kota_asal" class="form-label">Kota Asal</label>
                <input type="text" id="kota_asal" name="kota_asal" class="form-control" />
            </div>
            <div class="col-md-6">
                <label for="tanggal_absensi" class="form-label">Tanggal Absensi</label>
                <input type="date" id="tanggal_absensi" name="tanggal_absensi" class="form-control" />
            </div>
            <div class="col-md-6">
                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                <input type="time" id="jam_masuk" name="jam_masuk" class="form-control" />
            </div>
            <div class="col-md-6">
                <label for="jam_pulang" class="form-label">Jam Pulang</label>
                <input type="time" id="jam_pulang" name="jam_pulang" class="form-control" />
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="dashboard.php" class="btn btn-secondary px-4">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
