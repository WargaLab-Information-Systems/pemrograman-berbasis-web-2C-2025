<?php
$id = $_GET['id'];
$artikel = [
  1 => ["judul" => "Pengalaman Pertama Belajar PHP", "tanggal" => "2025-03-01", "gambar" => "img/artikel1.jpg", "refleksi" => "Belajar PHP pertama kali membuat saya menyadari pentingnya back-end development.", "sumber" => "https://php.net"],
  2 => ["judul" => "Tantangan Mengerjakan Proyek Mandiri", "tanggal" => "2025-04-10", "gambar" => "img/artikel2.jpg", "refleksi" => "Proyek mandiri memberi banyak pengalaman debugging dan problem solving.", "sumber" => ""],
  3 => ["judul" => "Mengapa Belajar Web Itu Penting", "tanggal" => "2025-05-01", "gambar" => "img/artikel3.jpg", "refleksi" => "Belajar web membuka banyak peluang di dunia digital.", "sumber" => "https://developer.mozilla.org"],
];
$kutipan = [
  "Belajar hari ini, sukses esok hari.",
  "Koding adalah seni logika.",
  "Teruslah mencoba, gagal itu wajar.",
];
$acak = $kutipan[rand(0, count($kutipan)-1)];
$data = $artikel[$id];
?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?= $data['judul']; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-white">
  <h1 class="text-2xl font-bold"><?= $data['judul']; ?></h1>
  <p class="text-sm mb-4"><?= $data['tanggal']; ?></p>
  <img src="<?= $data['gambar']; ?>" class="w-1/2 mb-4" alt="gambar artikel">
  <p><?= $data['refleksi']; ?></p>
  <blockquote class="italic my-4 text-blue-600">"<?= $acak; ?>"</blockquote>
  <?php if ($data['sumber']): ?>
    <a href="<?= $data['sumber']; ?>" class="text-blue-500 underline">Sumber Referensi</a>
  <?php endif; ?>
  <br><a href="blog.php" class="text-blue-500 mt-4 inline-block">Kembali ke Blog</a>
</body>
</html>