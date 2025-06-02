<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Timeline Pengalaman Kuliah</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Timeline Pengalaman Kuliah</h1>
  <div class="timeline">
    <?php
    $pengalaman = [
      ["tahun" => "2021", "deskripsi" => "Masuk kuliah dan mulai belajar dasar pemrograman"],
      ["tahun" => "2022", "deskripsi" => "Membuat proyek pertama dengan HTML/CSS"],
      ["tahun" => "2023", "deskripsi" => "Belajar PHP dan membuat aplikasi dinamis"],
      ["tahun" => "2024", "deskripsi" => "Magang di perusahaan teknologi"],
    ];

    foreach ($pengalaman as $item) {
      echo "<div class='event'><h3>{$item['tahun']}</h3><p>{$item['deskripsi']}</p></div>";
    }
    ?>
  </div>

  <div class="nav">
    <a class="button" href="profil.php">Profil</a>
    <a class="button" href="blog.php">Blog</a>
  </div>
</body>
</html>
