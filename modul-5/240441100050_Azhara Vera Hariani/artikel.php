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
    <title><?= htmlspecialchars($post['judul']) ?></title>
    <style>
        /* Reset ringan */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            color: #333;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            line-height: 1.6;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 8px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        em {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        p {
            margin: 15px 0;
            font-size: 1.1rem;
        }
        img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 25px 0;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        blockquote {
            background: #eaf2f8;
            border-left: 6px solid #3498db;
            padding: 15px 20px;
            font-style: italic;
            color: #34495e;
            margin: 25px 0;
            border-radius: 5px;
            font-size: 1.1rem;
        }
        a {
            color: #2980b9;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #c0392b;
            text-decoration: underline;
        }
        /* Container sumber */
        p.sumber {
            font-size: 0.95rem;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2><?= htmlspecialchars($post['judul']) ?></h2>
    <p><em>Tanggal: <?= htmlspecialchars($post['tanggal']) ?></em></p>
    <p><?= nl2br(htmlspecialchars($post['refleksi'])) ?></p>
    <img src="<?= htmlspecialchars($post['gambar']) ?>" alt="Gambar Ilustratif">
    <blockquote><strong>Kutipan:</strong> <?= htmlspecialchars(getKutipan($post['kutipan'])) ?></blockquote>
    <?php if ($post['sumber']): ?>
        <p class="sumber">Sumber: <a href="<?= htmlspecialchars($post['sumber']) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($post['sumber']) ?></a></p>
    <?php endif; ?>
    <br>
    <a href="Blog.php">← Kembali ke Daftar Blog</a>
</body>
</html>
