<?php
$timeline = [
    ['tahun' => '2021', 'judul' => 'Mulai Kuliah di Universitas', 'deskripsi' => 'Masuk ke jurusan Teknik Informatika, Universitas XYZ'],
    ['tahun' => '2022', 'judul' => 'Pengalaman Kerja Magang', 'deskripsi' => 'Magang sebagai pengembang perangkat lunak di perusahaan ABC'],
    ['tahun' => '2023', 'judul' => 'Proyek Akhir', 'deskripsi' => 'Mengerjakan proyek akhir mengenai aplikasi web menggunakan PHP'],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Pengalaman Kuliah</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg max-w-3xl">
        <h1 class="text-3xl font-semibold text-center text-indigo-600 mb-6">📜 Timeline Pengalaman Kuliah</h1>
        <div class="border-l-4 border-indigo-500 pl-6">
            <?php foreach ($timeline as $item): ?>
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-indigo-600"><?= $item['tahun']; ?> - <?= $item['judul']; ?></h3>
                    <p class="text-gray-700"><?= $item['deskripsi']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-6">
            <a href="profil.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-md transition duration-300">🔙 Kembali ke Profil</a>
        </div>
    </div>
</body>
</html>
