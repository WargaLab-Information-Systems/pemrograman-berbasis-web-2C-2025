<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Pengalaman Kuliah</title>
    <link rel="stylesheet" href="tl.css">
</head>
<body>

    <div class="container">
        <h2>Timeline Pengalaman Kuliah</h2>
        
        <?php
        $pengalaman = [
            [
                "tahun" => "Agustus 2024 - September 2024",
                "judul" => "Masuk Kuliah",
                "deskripsi" => "Diawali dengan OSPEK Universitas, Fakultas, dan Prodi. Kemudian, melakukan KRS pertama kali dan dapet PLOT 1"
            ],
            [
                "tahun" => "September 2024 - Desember 2024",
                "judul" => "Semester 1",
                "deskripsi" => "Memulai perjalanan kuliah sebagai Mahasiswa Sistem Informasi dengan 1 praktikum yaitu ALPRO"
            ],
            [
                "tahun" => "Januari 2025 - Sekarang",
                "judul" => "Semester 2",
                "deskripsi" => "Berbeda dengan Sebelumnya, disini war KRS dan tidak ada lagi PLOT. disemester ini ada 2 praktikum yaitu PBW dan PBO"
            ],
        ];
        ?>

        <div class="timeline">
            <?php foreach ($pengalaman as $item): ?>
                <div class="timeline-item">
                    <div class="timeline-year"><?= $item["tahun"]; ?></div>
                    <div class="timeline-content">
                        <h3><?= $item["judul"]; ?></h3>
                        <p><?= $item["deskripsi"]; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="button-group">
        <a href="index.php" class="btn">Profil</a>
        <a href="blog.php" class="btn">Blog</a>
    </div>
</body>
</html>
