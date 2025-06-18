<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Reflektif</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-primary px-3 mb-3">
        <div class="container-fluid">
            <h4 class="navbar-brand text-white">Blog</h4>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item"><a class="nav-link text-white" href="index1.php">Profile Mahasiswa</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="index2.php">Pengalaman Kuliah</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Blog Reflektif</h1>
        <div class="row justify-content-center">

        <?php
        include "data3.php";

        foreach ($artikel as $key => $post) {
            echo "
            <div class='col-md-8'>
                <div class='card shadow-sm mb-4'>
                    <img src='{$post['gambar']}' class='card-img-top' alt='img'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$post['judul']}</h5>
                        <p class='text-muted'>{$post['tanggal']}</p>
                        <a href='artikel.php?id=$key' class='btn btn-primary'>Baca Selengkapnya</a>
                    </div>
                </div>
            </div>";
        }
        ?>
        </div>
    </div>
</body>
</html>
