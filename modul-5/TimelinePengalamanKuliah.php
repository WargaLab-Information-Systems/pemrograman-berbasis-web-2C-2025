<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Timeline Pengalaman Kuliah</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #e9eef5;
      color: #2c3e50;
      padding: 20px;
      margin: 0;
    }

    h1 {
      text-align: center;
      margin-bottom: 40px;
      color: #2c3e50;
    }

    .timeline {
      max-width: 800px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .event {
      background-color: #ffffff;
      border-left: 6px solid #3498db;
      padding: 20px 25px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
      transition: transform 0.2s;
    }

    .event:hover {
      transform: translateY(-3px);
    }

    .event h3 {
      margin: 0 0 5px;
      font-size: 20px;
      color: #2980b9;
    }

    .event p {
      margin: 0;
      font-size: 16px;
      color: #555;
    }

    .navigation {
      text-align: center;
      margin-top: 50px;
    }

    a {
      text-decoration: none;
      color: white;
      background-color: #3498db;
      padding: 10px 18px;
      border-radius: 6px;
      margin: 0 10px;
      transition: background-color 0.3s ease;
      display: inline-block;
      font-weight: bold;
    }

    a:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

<h1>Timeline Pengalaman Kuliah</h1>

<div class="timeline">
<?php
$pengalaman = [
  ["tahun" => "2024", "kegiatan" => "Mulai kuliah dan mengenal Python"],
  ["tahun" => "2025", "kegiatan" => "Mengerjakan proyek pertama dengan PHP"],
  ["tahun" => "2026", "kegiatan" => "Magang di perusahaan software lokal"],
  ["tahun" => "2027", "kegiatan" => "Menyelesaikan proyek skripsi"]
];

foreach ($pengalaman as $item) {
  echo "<div class='event'>";
  echo "<h3>{$item['tahun']}</h3>";
  echo "<p>{$item['kegiatan']}</p>";
  echo "</div>";
}
?>
</div>

<div class="navigation">
  <a href="ProfileInteraktifMahasiswa.php">← Kembali ke Profil</a>
  <a href="BlogRelatif.php">Menuju Blog →</a>
</div>

</body>
</html>