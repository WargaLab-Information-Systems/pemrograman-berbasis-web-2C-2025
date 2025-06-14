<?php 
session_start();
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM karyawan_absensi WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE karyawan_absensi SET nip=?, nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=?, tanggal_absensi=?, jam_masuk=?, jam_pulang=? WHERE id=?");
    $stmt->bind_param("ssisssssssi", $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'], $_POST['tanggal_absensi'], $_POST['jam_masuk'], $_POST['jam_pulang'], $id);
    
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success">✅ Data berhasil disimpan!</div>';
        header("Location: dashboard.php");
        exit;
    } else {
        $msg = '<div class="alert alert-danger">❌ Gagal menyimpan data: ' . $stmt->error . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #d4edda, #a8d5a2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .card {
            background-color: #f0f9f4;
            box-shadow: 0 8px 24px rgba(46, 125, 50, 0.3);
            border-radius: 20px;
            padding: 30px 25px;
            max-width: 600px;
            width: 100%;
        }
        h3 {
            color: #2e7d32;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }
        label {
            font-weight: 600;
            color: #1b5e20;
        }
        .form-control, .form-select {
            border-radius: 12px;
            border: 1.5px solid #81c784;
            padding: 10px;
            font-size: 1rem;
            color: #145214;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4caf50;
            box-shadow: 0 0 6px #4caf50a0;
            outline: none;
        }
        .btn-update {
            background-color: #4caf50;
            color: white;
            font-weight: 600;
            border-radius: 12px;
            padding: 12px;
            transition: background-color 0.3s ease;
            border: none;
            width: 100%;
            font-size: 1.1rem;
        }
        .btn-update:hover {
            background-color: #388e3c;
        }
        .alert {
            text-align: center;
            border-radius: 15px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="card">
    <h3>Edit Data Karyawan</h3>
    <?php if (isset($msg)) echo $msg; ?>
    <form method="post" novalidate>
        <div class="mb-3">
            <label class="form-label" for="nip">NIP</label>
            <input type="text" id="nip" name="nip" class="form-control" value="<?= htmlspecialchars($data['nip']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="umur">Umur</label>
            <input type="number" id="umur" name="umur" class="form-control" value="<?= htmlspecialchars($data['umur']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="departemen">Departemen</label>
            <input type="text" id="departemen" name="departemen" class="form-control" value="<?= htmlspecialchars($data['departemen']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" class="form-control" value="<?= htmlspecialchars($data['jabatan']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="kota_asal">Kota Asal</label>
            <input type="text" id="kota_asal" name="kota_asal" class="form-control" value="<?= htmlspecialchars($data['kota_asal']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="tanggal_absensi">Tanggal Absensi</label>
            <input type="date" id="tanggal_absensi" name="tanggal_absensi" class="form-control" value="<?= htmlspecialchars($data['tanggal_absensi']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="jam_masuk">Jam Masuk</label>
            <input type="time" id="jam_masuk" name="jam_masuk" class="form-control" value="<?= htmlspecialchars($data['jam_masuk']) ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="jam_pulang">Jam Pulang</label>
            <input type="time" id="jam_pulang" name="jam_pulang" class="form-control" value="<?= htmlspecialchars($data['jam_pulang']) ?>" required />
        </div>
        <button type="submit" class="btn-update">Update</button>
    </form>
</div>
</body>
</html>
