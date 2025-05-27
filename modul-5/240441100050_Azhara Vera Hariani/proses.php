<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Profil Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right,rgb(219, 234, 241),rgb(211, 230, 239));
            padding: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4a148c;
            margin-bottom: 30px;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        p strong {
            color: #6a1b9a;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 16px;
            border: 1px solid #ccc;
            text-align: left;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 18px;
            background-color: #7b1fa2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #4a0072;
        }

        .success {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        .warning {
            color: red;
            font-weight: bold;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffffdd;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Hasil Profil Mahasiswa</h1>

        <?php
        // Validasi input wajib
        if (
            empty($_POST['nama']) || empty($_POST['nim']) || empty($_POST['ttl']) ||
            empty($_POST['email']) || empty($_POST['hp']) || empty($_POST['pengalaman']) ||
            empty($_POST['os']) || empty($_POST['tingkat_php'])
        ) {
            echo "<p class='warning'>Semua input wajib diisi!</p>";
            echo "<a href='index.php'>Kembali ke Form</a>";
            exit;
        }

        // Ambil data
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $ttl = $_POST['ttl'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $bahasa = array_filter($_POST['bahasa']);
        $pengalaman = $_POST['pengalaman'];
        $software = isset($_POST['software']) ? $_POST['software'] : [];
        $os = $_POST['os'];
        $tingkat_php = $_POST['tingkat_php'];
        ?>

        <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
        <p><strong>NIM:</strong> <?= htmlspecialchars($nim) ?></p>
        <p><strong>Tempat, Tanggal Lahir:</strong> <?= htmlspecialchars($ttl) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Nomor HP:</strong> <?= htmlspecialchars($hp) ?></p>

        <p><strong>Bahasa Pemrograman:</strong> <?= implode(", ", $bahasa) ?></p>
        <?php if (count($bahasa) > 2): ?>
            <p class="success">Anda cukup berpengalaman dalam pemrograman!</p>
        <?php endif; ?>

        <p><strong>Pengalaman Proyek:</strong> <?= nl2br(htmlspecialchars($pengalaman)) ?></p>
        <p><strong>Software Sering Digunakan:</strong> <?= !empty($software) ? implode(", ", $software) : "Tidak ada yang dipilih" ?></p>
        <p><strong>Sistem Operasi:</strong> <?= htmlspecialchars($os) ?></p>
        <p><strong>Tingkat Penguasaan PHP:</strong> <?= htmlspecialchars($tingkat_php) ?></p>

        <br>
        <a href="ProfilInteraktif.php">← Kembali ke Form</a>
        <a href="TimelinePengalamanKuliah.php">Timeline Pengalaman Kuliah</a>
    </div>

</body>
</html>
