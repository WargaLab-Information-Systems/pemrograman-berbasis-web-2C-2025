<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Interaktif Mahasiswa</title>
    <style>
        body {
            background-color: rgb(52, 52, 57);
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
            text-align: left;
        }
        .container {
            width: 70%;
            margin: auto;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: none;
        }
        h1, h2 {
            text-align: center;
        }
        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .links a {
            text-decoration: none;
            color: white;
        }
        .error {
            color: red;
            text-align: center;
        }
        td.label {
            width: 30%;
        }
        td.value {
            width: 70%;
        }
        p {
            text-align: center;
        }   
        group {
            display: inline-block;
        }

    </style>
</head>
<body>

<?php
// Data tetap
$nama = 'Farhan Alamsyah';
$nim = '240441100150';
$ttl = 'Tulungagung, 24 Mei 2006';
$email = 'farhanalamsyah2505@gmail.com';
$hp = '082384035456';

function tampilkan_profil($nama, $nim, $ttl, $email, $hp) {
    echo "<table>";
    echo "<tr><td class='label'>Nama</td><td>$nama</td></tr>";
    echo "<tr><td>NIM</td><td>$nim</td></tr>";
    echo "<tr><td>Tempat, Tanggal Lahir</td><td>$ttl</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>Nomor HP</td><td>$hp</td></tr>";
    echo "</table>";
}
?>

<div class="container">
    <h1>Profil Interaktif Mahasiswa</h1>
    <?php tampilkan_profil($nama, $nim, $ttl, $email, $hp); ?>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php
        // Ambil inputan form
        $bahasa = $_POST['bahasa'] ?? [];
        $pengalaman = trim($_POST['pengalaman'] ?? '');
        $software = $_POST['software'] ?? [];
        $os = $_POST['os'] ?? '';
        $tingkat = $_POST['tingkat'] ?? '';

        // Validasi
        if (empty($bahasa) || empty($pengalaman) || empty($software) || empty($os) || empty($tingkat)) {
            echo "<p class='error'>Semua input wajib diisi!</p>";
        } else {
            echo "<h2>Hasil Input</h2>";
            echo "<table>";
            echo "<tr><td class='label'>Bahasa Pemrograman</td><td class='value'>" . implode(", ", $bahasa) . "</td></tr>";
            echo "<tr><td>Pengalaman Proyek</td><td>$pengalaman</td></tr>";
            echo "<tr><td>Software</td><td>" . implode(", ", $software) . "</td></tr>";
            echo "<tr><td>Sistem Operasi</td><td>$os</td></tr>";    
            echo "<tr><td>Tingkat Penguasaan PHP</td><td>$tingkat</td></tr>";
            echo "</table>";

            if (count($bahasa) > 2) {
                echo "<p><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
            }
        }
    ?>
    <?php else: ?>
        <h2>Formulir Isian</h2>
        <form method="post">
        <label>Bahasa Pemrograman yang Dikuasai:</label><br>
        <input type="text" name="bahasa[]" placeholder="Bahasa Pemrograman 1">
        <input type="text" name="bahasa[]" placeholder="Bahasa Pemrograman 2">
        <input type="text" name="bahasa[]" placeholder="Bahasa Pemrograman 3">

            <?php echo "<label>Pengalaman Membuat Proyek Pribadi:</label><br><br>" ?>
            <textarea name="pengalaman" placeholder="Ceritakan Pengalamanmu"></textarea><br>

            <label>Software yang Sering Digunakan:</label><br><br>
            <div class="group">
                <input type='checkbox' name='software[]' value="VS Code"><br> VS Code
                <input type='checkbox' name='software[]' value="XAMPP"><br> XAMPP
                <input type='checkbox' name='software[]' value="Git"><br> Git 
            </div>



            <label>Sistem Operasi yang Digunakan:</label><br>
            <input type="radio" name="os" value="Windows"> Windows
            <input type="radio" name="os" value="Linux"> Linux
            <input type="radio" name="os" value="Mac"> Mac<br><br>

            <label>Tingkat Penguasaan PHP:</label><br>
            <select name="tingkat">
                <option value="">-- Pilih --</option>
                <option value="Pemula">Pemula</option>
                <option value="Menengah">Menengah</option>
                <option value="Mahir">Mahir</option>
            </select><br>

            <input type="submit" value="Kirim">
        </form>
    <?php endif; ?>

    <div class="links">
        <a href="pengalaman_kuliah.php">Pengalaman Kuliah</a>
        <a href="blog_reflektif.php">Blog Pribadi</a>
    </div>
</div>
</body>
</html>
