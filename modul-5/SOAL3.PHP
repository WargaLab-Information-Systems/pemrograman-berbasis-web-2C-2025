<?php
$articles = [
    [
        'judul' => 'Belajar PHP untuk Pemula',
        'tanggal' => '2023-03-10',
        'refleksi' => 'PHP adalah bahasa yang sangat berguna untuk pengembangan web.',
        'gambar' => 'img/php-blog.jpg',
        'kutipan' => '“Kerja keras adalah kunci sukses!”',
        'sumber' => 'https://www.php.net/'
    ],
    [
        'judul' => 'Menjadi Developer Web yang Handal',
        'tanggal' => '2023-04-12',
        'refleksi' => 'Kunci utama menjadi developer web handal adalah praktek dan pembelajaran terus-menerus.',
        'gambar' => 'img/web-dev.jpg',
        'kutipan' => '“Jangan takut gagal, takutlah jika tidak mencoba!”',
        'sumber' => 'https://developer.mozilla.org/'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Reflektif</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg max-w-3xl">
        <h1 class="text-3xl font-semibold text-center text-indigo-600 mb-6">📝 Blog Reflektif</h1>

        <?php foreach ($articles as $article): ?>
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-indigo-600"><?= $article['judul']; ?></h2>
                <p class="text-sm text-gray-500"><?= $article['tanggal']; ?></p>
                <img src="<?= $article['gambar']; ?>" alt="Ilustrasi" class="w-full h-auto my-4">
                <p class="text-gray-700"><?= $article['refleksi']; ?></p>
                <blockquote class="border-l-4 border-blue-500 pl-4 italic text-gray-600 mt-4"><?= $article['kutipan']; ?></blockquote>
                <p class="text-blue-600 mt-3"><a href="<?= $article['sumber']; ?>" target="_blank">Sumber</a></p>
            </div>
        <?php endforeach; ?>

        <div class="mt-6">
            <a href="profil.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-md transition duration-300">🔙 Kembali ke Profil</a>
            <a href="timeline.php" class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2 rounded-md transition duration-300 ml-4">📆 Menuju Timeline</a>
        </div>
    </div>
</body>
</html>
