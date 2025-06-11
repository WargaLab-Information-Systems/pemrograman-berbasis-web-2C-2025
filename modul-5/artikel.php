<?php
include 'data.php';
$id = $_GET['id'];
if (!isset($artikel[$id])) {
    echo "Artikel tidak ditemukan.";
    exit;
}
$post = $artikel[$id];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $post['judul'] ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f7fb;
            color: #2c3e50;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2980b9;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
            margin: 20px 0;
        }

        blockquote {
            background-color: #eaf6ff;
            border-left: 5px solid #3498db;
            padding: 15px;
            font-style: italic;
            margin: 20px 0;
            color: #34495e;
        }

        a {
            color: #3498db;
        }

        a:hover {
            color: #21618c;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
        }

        .back-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <h2><?= $post['judul'] ?></h2>
    <p><em>Tanggal: <?= $post['tanggal'] ?></em></p>
    <p><?= $post['refleksi'] ?></p>
    <img src="<?= $post['gambar'] ?>" alt="Gambar Artikel">
    <blockquote><strong>Kutipan:</strong> <?= getKutipan($post['kutipan']) ?></blockquote>

    <?php if ($post['sumber']): ?>
        <p>Sumber: <a href="<?= $post['sumber'] ?>" target="_blank"><?= $post['sumber'] ?></a></p>
    <?php endif; ?>

    <a class="back-link" href="BlogRelatif.php">← Kembali ke Daftar Blog</a>
    <a class="back-link" href="ProfileInteraktifMahasiswa.php">← Kembali ke Profil</a>
</div>
</body>
</html>