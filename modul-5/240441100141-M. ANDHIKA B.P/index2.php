<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Pengalaman Kuliah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-primary px-3 mb-3">
        <div class="container-fluid">
            <h4 class="navbar-brand text-white">Pengalaman Kuliah</h4>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item"><a class="nav-link text-white" href="index1.php">Profile Mahasiswa</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="index3.php">Blog</a></li>
            </ul>
        </div>
    </nav>
    <div class="container py-5">
        <h2 class="text-center mb-4"><i class="bi-clock-history"></i> Timeline Pengalaman Kuliah</h2>

        <div class="position-relative d-flex flex-column align-items-center">
            <div class="position-absolute top-0 start-50 translate-middle-x bg-primary" style="width: 4px; height: 100%;"></div>

            <?php
            $pengalamanKuliah = [
                ["tahun" => "2024 - Agustus", "judul" => "Orientasi Mahasiswa", "deskripsi" => "Mengikuti orientasi kampus (ospek) dan mengenal lingkungan kampus"],
                ["tahun" => "2024 - September", "judul" => "Mulai perkuliahan", "deskripsi" => "Memulai kegiatan perkuliahan serta beradaptasi dengan sistem baru."],
                ["tahun" => "2024 - Desember", "judul" => "Akhir dari Semester 1", "deskripsi" => "Manajemen waktu secara efisien untuk mengerjakan UAS secara efisien dan tepat waktu"],
                ["tahun" => "2024 - Februari", "judul" => "Memasuki Semester 2", "deskripsi" => "Kembali belajar hal hal yang semestinya ada di semester genap, untuk merefresh kembali pikiran setelah liburan"],
                ["tahun" => "2024 - April", "judul" => "Perkuliahan semester 2", "deskripsi" => "Mengulik kembali mata pelajaran yang ada atau belum terlalu paham agar merasa lebih mengerti lagi."]
            ];

            $position = "text-end";

            foreach ($pengalamanKuliah as $pengalaman) {
                echo "<div class='row mb-4'>";
                echo "<div class='col-md-6 " . ($position === 'text-end' ? 'offset-md-6' : '') . "'>";
                echo "<div class='card shadow-sm'>";
                echo "<div class='card-body'>";
                echo "<h5 class='text-primary'><i class='bi-calendar'></i> {$pengalaman['tahun']}</h5>";
                echo "<h5 class='text-primary'>{$pengalaman['judul']}</h5>";
                echo "<p>{$pengalaman['deskripsi']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $position = ($position === 'text-end') ? 'text-start' : 'text-end';
            }
            ?>
        </div>
    </div>
</body>
</html>