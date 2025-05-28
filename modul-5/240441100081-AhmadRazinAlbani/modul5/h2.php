
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Form</title>
    <style>
        body {
            background-color: lightslategray;
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: lightslategray;
        }

        table {
            border-collapse: collapse;
            margin: auto;
            background-color: rgb(241, 170, 84);
        }

        th, td {
            border: 1px solid;
            padding: 8px 30px;
        }

        .result {
            text-align: center;
            margin-top: 30px;
        }

        p {
            display: flex;
            justify-content: center;
        }
        a {
            text-decoration: none;
            color: black;
            display: block;
            text-align: center;
        }

    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $ttl = $_POST['ttl'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];

    $bahasa = array_filter($_POST['bahasa']);
    $pengalaman = trim($_POST['pengalaman']);
    $software = $_POST['software'] ?? [];
    $os = $_POST['os'] ?? '';
    $tingkat = $_POST['tingkat'] ?? '';

    if (empty($nama) || empty($nim) || empty($ttl) || empty($email) || empty($hp) ||
        empty($bahasa) || empty($pengalaman) || empty($software) || empty($os) || empty($tingkat)) {
        echo "<p style='color:red;'><strong>Semua data wajib diisi!</strong></p>";
        echo "<a href='index.php'>Kembali ke Form</a>";
        exit;
    }
    ?>
    <h2 align="center">Profil Mahasiswa</h2>
    <table>
        <tr><th>Nama</th><td><?= $nama ?></td></tr>
        <tr><th>NIM</th><td><?= $nim ?></td></tr>
        <tr><th>Tempat, Tanggal Lahir</th><td><?= $ttl ?></td></tr>
        <tr><th>Email</th><td><?= $email ?></td></tr>
        <tr><th>Nomor HP</th><td><?= $hp ?></td></tr>
    </table><br>

    <h2 align="center">Ringkasan Skill & Pengalaman</h2>
    <div class="result">
        <table>
            <tr><th>Bahasa Pemrograman</th><td><?= implode(", ", $bahasa) ?></td></tr>
            <tr><th>Pengalaman</th><td><?= $pengalaman ?></td></tr>
            <tr><th>Software</th><td><?= implode(", ", $software) ?></td></tr>
            <tr><th>Sistem Operasi</th><td><?= $os ?></td></tr>
            <tr><th>Tingkat PHP</th><td><?= $tingkat ?></td></tr>
        </table>

        <br>
        <?php if (count($bahasa) > 2): ?>
            <p style="color:green;"><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>
        <?php endif; ?>

        <p><a href="index.php">← Kembali ke Form</a></p>
    </div>
</body>
</html>
<?php
}?>