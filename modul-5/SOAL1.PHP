<?php
$showForm = true;
$hasError = false;
$bahasa = $software = $os = $tingkat = $pengalaman = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function isFilled($field) {
        return isset($_POST[$field]) && !empty($_POST[$field]);
    }

    if (
        isFilled('bahasa') &&
        isFilled('pengalaman') &&
        isset($_POST['software']) &&
        isset($_POST['os']) &&
        isFilled('php')
    ) {
        $bahasa = $_POST['bahasa'];
        $pengalaman = htmlspecialchars($_POST['pengalaman']);
        $software = implode(", ", $_POST['software']);
        $os = $_POST['os'];
        $tingkat = $_POST['php'];
        $showForm = false;
    } else {
        $hasError = true;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Interaktif Mahasiswa</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-8 bg-white shadow-lg rounded-lg max-w-3xl">
        <h1 class="text-3xl font-semibold text-center text-indigo-600 mb-6">📘 Profil Interaktif Mahasiswa</h1>

        <table class="w-full mb-6 table-auto border border-gray-300 rounded-md">
            <tr><td class="p-3 font-medium bg-gray-100">Nama</td><td class="p-3">Dzati Aura Salsabila</td></tr>
            <tr><td class="p-3 font-medium bg-gray-100">NIM</td><td class="p-3">240441100098</td></tr>
            <tr><td class="p-3 font-medium bg-gray-100">Tempat, Tanggal Lahir</td><td class="p-3">Gresik, 4 April 2006</td></tr>
            <tr><td class="p-3 font-medium bg-gray-100">Email</td><td class="p-3">salsabiladzatiaura@gmail.com</td></tr>
            <tr><td class="p-3 font-medium bg-gray-100">Nomor HP</td><td class="p-3">0882009200962</td></tr>
        </table>

        <?php if ($hasError): ?>
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">⚠️ Semua input wajib diisi!</div>
        <?php endif; ?>

        <?php if (!$showForm): ?>
            <div class="bg-green-50 p-6 rounded-lg border border-green-200 mb-6">
                <h2 class="text-xl font-semibold text-green-700 mb-3">✅ Hasil Input:</h2>
                <table class="w-full table-auto border border-gray-300 mb-4">
                    <tr><td class="p-3 font-medium bg-gray-50">Bahasa Pemrograman</td><td class="p-3"><?= implode(", ", $bahasa); ?></td></tr>
                    <tr><td class="p-3 font-medium bg-gray-50">Software</td><td class="p-3"><?= $software; ?></td></tr>
                    <tr><td class="p-3 font-medium bg-gray-50">Sistem Operasi</td><td class="p-3"><?= $os; ?></td></tr>
                    <tr><td class="p-3 font-medium bg-gray-50">Tingkat PHP</td><td class="p-3"><?= $tingkat; ?></td></tr>
                </table>
                <p><strong>📌 Pengalaman Proyek:</strong> <?= $pengalaman; ?></p>
                <?php if (count($bahasa) > 2): ?>
                    <p class="text-green-600 mt-3 font-semibold">🌟 Anda cukup berpengalaman dalam pemrograman!</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($showForm): ?>
            <form action="profil.php" method="POST" class="space-y-6">
                <div>
                    <label class="block font-medium text-gray-700 mb-2">💡 Bahasa Pemrograman yang Dikuasai:</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" name="bahasa[]" class="p-3 border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: PHP">
                        <input type="text" name="bahasa[]" class="p-3 border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: JavaScript">
                        <input type="text" name="bahasa[]" class="p-3 border rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Python (opsional)">
                    </div>
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-2">📘 Pengalaman Proyek Pribadi:</label>
                    <textarea name="pengalaman" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-indigo-500" rows="4" placeholder="Ceritakan proyekmu..."></textarea>
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-2">🛠️ Software yang Sering Digunakan:</label>
                    <div class="flex flex-wrap gap-6">
                        <label class="inline-flex items-center"><input type="checkbox" name="software[]" value="VS Code" class="mr-2"> VS Code</label>
                        <label class="inline-flex items-center"><input type="checkbox" name="software[]" value="XAMPP" class="mr-2"> XAMPP</label>
                        <label class="inline-flex items-center"><input type="checkbox" name="software[]" value="Git" class="mr-2"> Git</label>
                        <label class="inline-flex items-center"><input type="checkbox" name="software[]" value="Figma" class="mr-2"> Figma</label>
                    </div>
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-2">💻 Sistem Operasi yang Digunakan:</label>
                    <div class="flex gap-6">
                        <label class="inline-flex items-center"><input type="radio" name="os" value="Windows" class="mr-2"> Windows</label>
                        <label class="inline-flex items-center"><input type="radio" name="os" value="Linux" class="mr-2"> Linux</label>
                        <label class="inline-flex items-center"><input type="radio" name="os" value="Mac" class="mr-2"> Mac</label>
                    </div>
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-2">📈 Tingkat Penguasaan PHP:</label>
                    <select name="php" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Pilih --</option>
                        <option value="Pemula">Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Mahir">Mahir</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-md transition duration-300">🚀 Kirim</button>
            </form>
        <?php endif; ?>

        <a href="timeline.php" class="inline-block mt-6 text-blue-600 hover:underline">➡ Menuju Timeline</a>
    </div>
</body>
</html>
