<?php 
include 'data.php';

$id = $_GET['id'] ?? 0;
$data = $artikel[$id] ?? null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data ? $data['judul'] : 'Artikel Tidak Ditemukan' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #e3f2fd, #ffffff);
            color: #333;
            padding: 40px;
            margin: 0;
        }

        h2 {
            color: #0d47a1;
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            line-height: 1.6;
            font-size: 16px;
            margin-bottom: 15px;
        }

       img {
    width: 100%;
    max-width: 500px;
    height: auto;
    border-radius: 10px;
    margin: 20px 0;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
    display: block;
}


        blockquote {
            border-left: 5px solid #2196f3;
            background-color: #f1f8ff;
            padding: 10px 20px;
            margin: 20px 0;
            font-style: italic;
            color: #0d47a1;
        }

        a {
            color: #1565c0;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-link {
            margin-top: 30px;
            display: inline-block;
        }

        .not-found {
            background-color: #ffebee;
            border-left: 5px solid #f44336;
            padding: 15px;
            font-weight: bold;
            color: #c62828;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

<?php if ($data): ?>
    <h2><?= $data['judul'] ?></h2>
    <p><strong>Tanggal:</strong> <?= $data['tanggal'] ?></p>
    <img src="img/<?= $data['gambar'] ?>" alt="Ilustrasi <?= $data['judul'] ?>">
    <p><?= $data['refleksi'] ?></p>
    <blockquote><strong>Kutipan:</strong> <?= getKutipan($data['kutipan']) ?></blockquote>
    <?php if ($data['sumber']): ?>
        <p>Sumber Referensi: <a href="<?= $data['sumber'] ?>" target="_blank"><?= $data['sumber'] ?></a></p>
    <?php endif; ?>
<?php else: ?>
    <p class="not-found">Artikel tidak ditemukan.</p>
<?php endif; ?>

<p class="back-link"><a href="Soal3.php">← Kembali ke Daftar Artikel</a></p>

</body>
</html>
