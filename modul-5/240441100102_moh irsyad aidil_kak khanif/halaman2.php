<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Timeline Pengalaman Kuliah</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e3f2fd, #fce4ec);
      padding: 40px;
    }

    h1, h2 {
      color: #2c3e50;
    }

    .timeline {
      position: relative;
      margin-left: 20px;
      border-left: 3px solid #3498db;
      padding-left: 20px;
    }

    .timeline-item {
      margin-bottom: 30px;
      position: relative;
    }

    .timeline-item::before {
      content: "";
      position: absolute;
      left: -12px;
      top: 0;
      width: 15px;
      height: 15px;
      background-color: #3498db;
      border-radius: 50%;
      border: 3px solid #fff;
      box-shadow: 0 0 0 3px #3498db;
    }

    .timeline-content {
      background-color: #fff;
      padding: 15px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn-custom {
      background-color: #3498db;
      color: white;
      border: none;
    }

    .btn-custom:hover {
      background-color: #2980b9;
    }

  </style>
</head>
<body>

  <div class="container">
    <h1 class="text-center mb-5">Timeline Pengalaman Kuliah</h1>

    <?php
    $pengalaman = [
      [
        "tahun" => "2024",
        "judul" => "Masuk Kuliah",
        "deskripsi" => "Mulai perjalanan sebagai mahasiswa di jurusan sistem informasi. Banyak adaptasi dan pengenalan kampus."
      ],
      [
        "tahun" => "2025",
        "judul" => "masuk smester 2",
        "deskripsi" => "Mengerjakan tugas kelompok membuat sistem informasi perpustakaan menggunakan PHP dan MySQL."
      ],
      [
        "tahun" => "2027",
        "judul" => " rencana Magang",
        "deskripsi" => "ini baru rencana, tapi pengen magang yang enak dan dapat gaji 10 juta ."
      ],
      [
        "tahun" => "2028",
        "judul" => "lulus kuliah",
        "deskripsi" => "dan semoga bisa lulus tepat waktu, karna ucapan adalah doa hehe."
      ],
    ];
    ?>

    <div class="timeline">
      <?php foreach ($pengalaman as $item): ?>
        <div class="timeline-item">
          <div class="timeline-content">
            <h5 class="mb-1 text-primary"><?= $item['tahun'] ?> - <?= $item['judul'] ?></h5>
            <p><?= $item['deskripsi'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-5 text-center">
      <a href="index.php" class="btn btn-custom me-3">Kembali ke Profil</a>
      <a href="halaman3.php" class="btn btn-outline-primary">Menuju Blog</a>
    </div>
  </div>

</body>
</html>
