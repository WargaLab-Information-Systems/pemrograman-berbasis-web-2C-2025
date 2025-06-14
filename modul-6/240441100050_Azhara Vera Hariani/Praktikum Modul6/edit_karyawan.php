<?php
session_start();
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM karyawan_absensi WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE karyawan_absensi SET nip=?, nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=?, tanggal_absensi=?, jam_masuk=?, jam_pulang=? WHERE id=?");
    $stmt->bind_param("ssisssssssi", $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'], $_POST['tanggal_absensi'], $_POST['jam_masuk'], $_POST['jam_pulang'], $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(213, 186, 218);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h2>Edit Data Karyawan</h2>
<form method="post">
    <label>NIP:</label>
    <input type="text" name="nip" value="<?= $data['nip'] ?>">

    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>">

    <label>Umur:</label>
    <input type="number" name="umur" value="<?= $data['umur'] ?>">

    <label>Jenis Kelamin:</label>
    <select name="jenis_kelamin">
        <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select>


    <label>Departemen:</label>
    <input type="text" name="departemen" value="<?= $data['departemen'] ?>">

    <label>Jabatan:</label>
    <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>">

    <label>Kota Asal:</label>
    <input type="text" name="kota_asal" value="<?= $data['kota_asal'] ?>">

    <label>Tanggal Absensi:</label>
    <input type="date" name="tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>">

    <label>Jam Masuk:</label>
    <input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>">

    <label>Jam Pulang:</label>
    <input type="time" name="jam_pulang" value="<?= $data['jam_pulang'] ?>">


    <input type="submit" value="Update">
</form>
</body>
</html>
