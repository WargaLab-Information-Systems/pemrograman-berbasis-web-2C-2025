<!DOCTYPE html> 
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Timeline Pengalaman Kuliah</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', Arial, sans-serif;
      background: linear-gradient(135deg, #f9f7f7, #d1e8e4);
      padding: 40px 20px;
      color: #333;
    }

    h1 {
      text-align: center;
      margin-bottom: 50px;
      font-weight: 700;
      color: #2c3e50;
      letter-spacing: 1.2px;
    }

    .timeline {
      position: relative;
      max-width: 700px;
      margin: 0 auto;
      padding-left: 40px;
      border-left: 4px solid #3498db;
    }

    .timeline-item {
      position: relative;
      margin-bottom: 40px;
      padding-left: 25px;
      transition: transform 0.3s ease;
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      padding: 15px 20px 15px 30px;
    }

    .timeline-item:hover {
      transform: translateX(10px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .timeline-item::before {
      content: "";
      position: absolute;
      left: -30px;
      top: 20px;
      width: 18px;
      height: 18px;
      background: #3498db;
      border-radius: 50%;
      box-shadow: 0 0 10px #3498dbaa;
      transition: background-color 0.3s ease;
    }

    .timeline-item:hover::before {
      background-color: #2980b9;
      box-shadow: 0 0 15px #2980b9cc;
    }

    .timeline-item h3 {
      margin: 0 0 8px 0;
      font-weight: 600;
      color: #34495e;
      font-size: 1.2rem;
      padding-left: 8px;
    }

    .timeline-item p {
      margin: 0;
      line-height: 1.5;
      color: #555;
      font-size: 1rem;
      padding-left: 8px;
    }

    .buttons {
      margin-top: 50px;
      text-align: center;
    }

    .buttons a {
      text-decoration: none;
      color: white;
      background-color: #23436a;
      padding: 12px 30px;
      margin: 0 12px;
      border-radius: 8px;
      font-weight: 600;
      box-shadow: 0 4px 8px rgba(35, 67, 106, 0.4);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      display: inline-block;
    }

    .buttons a:hover {
      background-color: #b9294b;
      box-shadow: 0 6px 15px rgba(185, 41, 75, 0.7);
    }

    @media (max-width: 600px) {
      body {
        padding: 20px 10px;
      }
      .timeline {
        padding-left: 20px;
        border-left-width: 3px;
      }
      .timeline-item::before {
        left: -22px;
        width: 14px;
        height: 14px;
      }
      .buttons a {
        padding: 10px 20px;
        margin: 8px 6px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

<h1>Timeline Pengalaman Kuliah</h1>

<div class="timeline">
  <?php
    $pengalaman = [
      "2024" => "Mulai kuliah dan mengikuti ospek fakultas.",
      "2025" => "Belajar dasar pemrograman dan membuat proyek pertama menggunakan python.",
      "2026" => "Mulai magang.",
      "2027" => "Mengambil topik skripsi."
    ];

    foreach ($pengalaman as $tahun => $deskripsi) {
      echo "<div class='timeline-item'>";
      echo "<h3>$tahun</h3>";
      echo "<p>$deskripsi</p>";
      echo "</div>";
    }
  ?>
</div>

<div class="buttons">
  <a href="ProfilInteraktif.php">Kembali ke Profil</a>
  <a href="Blog.php">Menuju Blog</a>
</div>

</body>
</html>
