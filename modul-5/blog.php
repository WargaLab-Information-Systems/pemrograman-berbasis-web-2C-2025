<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Blog Reflektif</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Blog Reflektif</h1>

  <?php
  $kutipan = [
<<<<<<< HEAD
    "Pendidikan adalah senjata untuk mengubah dunia.",
=======
    "Teruslah belajar, karena ilmu tidak akan pernah habis.",
    "Gagal itu biasa, bangkit itu luar biasa.",
>>>>>>> 8c9d936ad2161bcdab20491126d16b792b75ab16
    "Konsistensi adalah kunci sukses.",
  ];

  $artikel = [
<<<<<<< HEAD
    ["id" => 1, "judul" => "Belajar PHP", "tanggal" => "2015-11-19", "refleksi" => "Saya mulai memahami dasar backend development.", "gambar" => "php.png", "sumber" => "https://www.petanikode.com/php-sintak/#google_vignette"],
    ["id" => 2, "judul" => "Pengaruh game terhadap belajar siswa", "tanggal" => "2021-11-13", "refleksi" => "Menurut saya hal tersebut dibutuhkan kedisiplinan orang tua dalam mengawasi anak.", "gambar" => "game.webp", "sumber" => "https://iainutuban.ac.id/2021/11/13/pengaruh-game-terhadap-belajar-siswa/"],
=======
    ["id" => 1, "judul" => "Belajar PHP", "tanggal" => "2024-01-15", "refleksi" => "Saya mulai memahami dasar backend development.", "gambar" => "img/php.jpg", "sumber" => "https://www.php.net"],
    ["id" => 2, "judul" => "Pengalaman Magang", "tanggal" => "2024-08-10", "refleksi" => "Saya belajar kerja tim dan tools industri nyata.", "gambar" => "img/magang.jpg", "sumber" => ""],
>>>>>>> 8c9d936ad2161bcdab20491126d16b792b75ab16
  ];

  function tampilkan_artikel($data, $kutipan) {
    $quote = $kutipan[rand(0, count($kutipan) - 1)];
    echo "<h2>{$data['judul']}</h2>";
    echo "<p><em>{$data['tanggal']}</em></p>";
    echo "<p>{$data['refleksi']}</p>";
    echo "<img src='{$data['gambar']}' alt='gambar'>";
    echo "<blockquote>$quote</blockquote>";
    if ($data['sumber']) {
      echo "<p>Sumber: <a href='{$data['sumber']}' target='_blank'>{$data['sumber']}</a></p>";
    }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($artikel as $a) {
      if ($a['id'] == $id) {
        tampilkan_artikel($a, $kutipan);
        echo "<div class='nav'><a class='button' href='blog.php'>Kembali ke Daftar Artikel</a></div>";
        break;
      }
    }
  } else {
    foreach ($artikel as $a) {
      echo "<p><a href='blog.php?id={$a['id']}'>{$a['judul']}</a></p>";
    }
  }
  ?>

  <div class="nav">
<<<<<<< HEAD
    <a class="button" href="profil.php">Profil</a>
=======
>>>>>>> 8c9d936ad2161bcdab20491126d16b792b75ab16
    <a class="button" href="timeline.php">Timeline Pengalaman</a>
  </div>
</body>
</html>
