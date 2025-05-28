<?php
$artikel = [
    1 => [
        'judul' => 'Belajar PHP Dasar',
        'tanggal' => '2025-05-20',
        'refleksi' => 'Belajar PHP adalah langkah awal yang menyenangkan menuju dunia pemrograman web dinamis.',
        'gambar' => 'phpdasar.PNG',
        'referensi' => 'https://www.php.net/manual/en/index.php'
    ],
    2 => [
        'judul' => 'Mengenal Array di PHP',
        'tanggal' => '2025-05-21',
        'refleksi' => 'Array di PHP memudahkan pengelompokan data dan manipulasi informasi dalam jumlah besar.',
        'gambar' => 'Arrayphp.jpg',
        'referensi' => 'https://www.w3schools.com/php/php_arrays.asp'
    ],
    3 => [
        'judul' => 'Fungsi-fungsi Penting dalam PHP',
        'tanggal' => '2025-05-22',
        'refleksi' => 'Fungsi membuat kode lebih terstruktur, mudah dipelihara, dan dapat digunakan kembali.',
        'gambar' => 'fungsi.png',
        'referensi' => ''
    ]
];

$kutipan = [
    "Jangan takut gagal, karena kegagalan adalah awal dari keberhasilan.",
    "Belajar bukan tentang cepat atau lambat, tapi tentang tidak berhenti.",
    "Setiap baris kode adalah langkah menuju solusi.",
    "Terus belajar dan jangan pernah menyerah!"
];

$id = $_GET['id'] ?? 0;

if (!isset($artikel[$id])) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$data = $artikel[$id];
$randomKutipan = $kutipan[rand(0, count($kutipan) - 1)];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $data['judul'] ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
        }

        em {
            color: #555;
        }

        img {
            display: block;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        blockquote {
            font-style: italic;
            text-align: center;
            background-color: #e3f2fd;
            padding: 15px;
            border-left: 5px solid #2196f3;
            margin: 30px auto;
            max-width: 600px;
            border-radius: 6px;
            color: #0d47a1;
        }

        a {
            color: #0d47a1;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .nav-links {
            max-width: 600px;
            margin: 40px auto;
            display: flex;
            justify-content: space-between;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
        }

        p {
            max-width: 700px;
            margin: 0 auto 20px auto;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1><?= $data['judul'] ?></h1>
    <p style="text-align:center;"><em><?= $data['tanggal'] ?></em></p>
    <p><?= $data['refleksi'] ?></p>
    <img src="<?= $data['gambar'] ?>" alt="Ilustrasi" width="400">
    <blockquote>"<?= $randomKutipan ?>"</blockquote>
    
    <?php if ($data['referensi']): ?>
        <p>Sumber: <a href="<?= $data['referensi'] ?>" target="_blank"><?= $data['referensi'] ?></a></p>
    <?php endif; ?>
    
    <div class="nav-links">
        <?php if (isset($artikel[$id - 1])): ?>
            <a href="artikel.php?id=<?= $id - 1 ?>">&larr; Artikel Sebelumnya</a>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

        <?php if (isset($artikel[$id + 1])): ?>
            <a href="artikel.php?id=<?= $id + 1 ?>">Artikel Berikutnya &rarr;</a>
        <?php else: ?>
            <div></div>
        <?php endif; ?>
    </div>

    <p class="back-link"><a href="blog.php">← Kembali ke daftar artikel</a></p>
</body>
</html>
