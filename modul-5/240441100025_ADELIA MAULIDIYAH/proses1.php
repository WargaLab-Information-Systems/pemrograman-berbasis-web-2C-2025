<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Profil Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #f8f9fa);
            color: #333;
            padding: 30px;
            margin: 0;
        }

        h2 {
            color: #0d47a1;
        }

        p {
            background-color: #ffffff;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        em {
            color: #1565c0;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            margin-right: 10px;
        }

        button {
            background-color: #0d47a1;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1565c0;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            button {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

<?php
// Validasi input
if (
    empty($_POST['bahasa'][0]) ||
    empty($_POST['pengalaman']) ||
    empty($_POST['software']) ||
    empty($_POST['os']) ||
    empty($_POST['tingkat'])
) {
    echo "<script>alert('Semua input wajib diisi!'); window.history.back();</script>";
    exit;
}

$bahasa = array_filter($_POST['bahasa']); // Hilangkan input kosong
$pengalaman = htmlspecialchars($_POST['pengalaman']);
$software = $_POST['software'];
$os = $_POST['os'];
$tingkat = $_POST['tingkat'];

// Tampilkan hasil
echo "<h2>Hasil Profil Mahasiswa</h2>";
echo "<p><strong>Bahasa Pemrograman:</strong> " . implode(", ", $bahasa) . "</p>";
echo "<p><strong>Pengalaman Proyek:</strong> $pengalaman</p>";
echo "<p><strong>Software yang Digunakan:</strong> " . implode(", ", $software) . "</p>";
echo "<p><strong>Sistem Operasi:</strong> $os</p>";
echo "<p><strong>Tingkat Penguasaan PHP:</strong> $tingkat</p>";

// Bonus
if (count($bahasa) > 2) {
    echo "<p><em>Anda cukup berpengalaman dalam pemrograman!</em></p>";
}
?>

<a href="Soal1.php"><button>Profil Interaktif</button></a>
<a href="Soal2.php"><button>Timeline Pengalaman Kuliah</button></a>
<a href="Soal3.php"><button>Blog Reflektif</button></a>

</body>
</html>
