<?php
$page = $_GET['page'] ?? 'blog';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Web Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #eef2f3, #dce1e7);
      padding: 30px;
      font-family: 'Segoe UI', sans-serif;
    }
    .timeline {
      border-left: 3px solid #3498db;
      padding-left: 20px;
    }
    .timeline-item {
      margin-bottom: 20px;
    }
    .quote {
      font-style: italic;
      color: #333;
      background-color: #fff3cd;
      padding: 12px 15px;
      border-left: 5px solid #ffc107;
      border-radius: 5px;
      margin-top: 20px;
    }
    .nav-link {
      margin-right: 10px;
    }
    img {
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin-bottom: 15px;
    }
    .card-article {
      background-color: #ffffffd9;
      border-radius: 10px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-article:hover {
      background-color: #e8f4fc;
      transform: translateY(-3px);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
      cursor: pointer;
    }
    .card-article a {
      text-decoration: none;
      color: #2c3e50;
    }
    .card-article a:hover {
      color: #2980b9;
    }
  </style>
</head>
<body>

<!-- Navigasi -->
<nav class="mb-4">
  <a class="btn btn-primary nav-link d-inline-block" href="index.php">Profil</a>
  <a class="btn btn-success nav-link d-inline-block" href="halaman2.php">Timeline</a>
  <a class="btn btn-warning nav-link d-inline-block" href="halaman3.php">Blog</a>
</nav>

<?php
if ($page == 'profil') {
  include 'halaman_profil.php';
}

elseif ($page == 'timeline') {
  include 'halaman_timeline.php';
}

elseif ($page == 'blog') {
  $kutipan = [
    "Kesuksesan dimulai dari langkah kecil yang konsisten.",
    "Belajar dari kegagalan lebih berharga daripada tidak mencoba.",
    "Tetap semangat dan terus berkembang setiap hari.",
    "Teknologi dikuasai oleh mereka yang mau belajar tanpa henti."
  ];

  $artikel = [
    [
      "judul" => "Pengalaman belajar pertama Ngoding",
      "tanggal" => "2024-01-10",
      "refleksi" => "Saat pertama kali belajar ngoding, saya merasa sangat bingung. Tapi setelah mencoba membuat proyek sederhana, saya mulai memahami alurnya.",
      "gambar" => "images/artikel1.png",
      "sumber" => "https://example.com/ngoding"
    ],
    [
      "judul" => "Kerja kelompok di tugas Kampus",
      "tanggal" => "2024-03-05",
      "refleksi" => "Kerjasama kelompok menjadi kunci kesuksesan tugas besar kami. Kami belajar membagi tugas dan menyatukan ide.",
      "gambar" => "images/artikel2.png",
      "sumber" => "https://sumut.idntimes.com/life/education/nurul-azizah-70/tips-efektif-kerja-kelompok-tugas-kampus-dengan-sukses-c1c2"
    ],
    [
      "judul" => "Belajar membuat aplikasi mandiri Lewat YouTube",
      "tanggal" => "2024-04-20",
      "refleksi" => "Saya belajar membuat aplikasi dari tutorial di YouTube dan akhirnya bisa menyelesaikan aplikasi sederhana sendiri.",
      "gambar" => "images/artikel3.png",
      "sumber" => "https://youtube.com/learn-to-code"
    ]
  ];

  if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($artikel[$_GET['id']])) {
    $id = $_GET['id'];
    $a = $artikel[$id];
    $kutip = $kutipan[rand(0, count($kutipan) - 1)];

    echo "<div class='container'>";
    echo "<h2 class='mb-2'>{$a['judul']}</h2>";
    echo "<p class='text-muted mb-3'>{$a['tanggal']}</p>";
    echo "<img src='{$a['gambar']}' alt='gambar artikel'>";
    echo "<p class='mt-3'>{$a['refleksi']}</p>";
    echo "<div class='quote mt-4'>\"$kutip\"</div>";
    if ($a['sumber']) {
      echo "<p class='mt-3'><a href='{$a['sumber']}' target='_blank' class='btn btn-sm btn-outline-info'>Sumber Referensi</a></p>";
    }
    echo "<a class='btn btn-secondary mt-3' href='?page=blog'>← Kembali ke Daftar Artikel</a>";
    echo "</div>";
  } else {
    echo "<h2>Daftar Artikel Blog</h2><div class='row'>";
    foreach ($artikel as $key => $a) {
      echo "
      <div class='col-md-4 mb-4'>
        <div class='card card-article p-3 h-100'>
          <h5><a href='?page=blog&id=$key'>{$a['judul']}</a></h5>
          <p class='text-muted'>{$a['tanggal']}</p>
          <p>" . substr($a['refleksi'], 0, 80) . "...</p>
          <a href='?page=blog&id=$key' class='btn btn-sm btn-outline-primary mt-auto'>Baca Selengkapnya</a>
        </div>
      </div>";
    }
    echo "</div>";
  }
}
?>


