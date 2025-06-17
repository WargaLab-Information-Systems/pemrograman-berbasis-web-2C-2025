<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Timeline Pengalaman Kuliah</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    .timeline {
      border-left: 3px solid #333;
      margin-left: 20px;
      padding-left: 20px;
    }
    .event {
      margin-bottom: 20px;
      position: relative;
    }
    .event::before {
      content: "";
      position: absolute;
      left: -31px;
      top: 0;
      width: 20px;
      height: 20px;
      background: #333;
      border-radius: 50%;
    }
    .event h3 {
      margin: 0;
    }
  </style>
</head>
<body>

<h1>Timeline Pengalaman Kuliah</h1>

<div class="timeline">
<?php
$pengalaman = [
  ["tahun" => "2021", "kegiatan" => "Mulai kuliah dan mengenal HTML/CSS"],
  ["tahun" => "2022", "kegiatan" => "Mengerjakan proyek pertama dengan PHP"],
  ["tahun" => "2023", "kegiatan" => "Magang di perusahaan software lokal"],
  ["tahun" => "2024", "kegiatan" => "Menyelesaikan proyek skripsi dengan Laravel"]
];

foreach ($pengalaman as $item) {
  echo "<div class='event'>";
  echo "<h3>{$item['tahun']}</h3>";
  echo "<p>{$item['kegiatan']}</p>";
  echo "</div>";
}
?>
</div>

<br>
<a href="profil_mahasiswa.php">← Kembali ke Profil</a> |
<a href="blog.php">Menuju Blog →</a>

</body>
</html>
