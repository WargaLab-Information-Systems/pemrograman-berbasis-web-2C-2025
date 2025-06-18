<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel Reflektif</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">

    <?php
    include "data3.php";

    $id = $_GET['id'] ?? null;
    if ($id !== null && isset($artikel[$id])) {
        $post = $artikel[$id];
        $kutipan_random = $kutipan[array_rand($kutipan)];

        echo "
        <div class='card shadow-lg p-5'>
            <img src='{$post['gambar']}' class='card-img-top w-75 mx-auto' alt='Ilustrasi'>
            <div class='card-body'>
                <h1 class='card-title'>{$post['judul']}</h1>
                <p class='text-muted'>{$post['tanggal']}</p>
                <p>{$post['refleksi']}</p>
                <blockquote class='blockquote text-center'>
                    <p class='mb-0'>$kutipan_random</p>
                </blockquote>
                <p>Source : <a href = '{$post['sumber']}'>Click here</a><br>
                <a href='index3.php' class='btn btn-secondary mt-3'>Kembali</a>
            </div>
        </div>";
    } else {
        echo "<p class='alert alert-danger'>Artikel tidak ditemukan.</p>";
    }
    ?>

    </div>
</body>
</html>