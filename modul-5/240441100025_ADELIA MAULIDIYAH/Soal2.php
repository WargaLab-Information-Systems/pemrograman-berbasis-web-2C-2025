<?php
// Data pengalaman kuliah dalam array asosiatif PHP
$pengalaman = [
    [
        "tahun" => "2024",
        "judul" => "Masuk Universitas",
        "deskripsi" => "Ospek kampus dan Memulai perkuliahan di program studi Sistem Informasi."
    ],
    [
        "tahun" => "2025",
        "judul" => "Belajar",
        "deskripsi" => "Belajar dasar pemograman IT."
    ],
    [
        "tahun" => "2026",
        "judul" => "Magang",
        "deskripsi" => "Magang di perusahaan IT selama 6 bulan."
    ],
    [
        "tahun" => "2027",
        "judul" => "Mengerjakan Skripsi",
        "deskripsi" => "Mulai mengerjakan tugas akhir sebagai persyaratan kelulusan."
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Timeline Pengalaman Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .timeline {
            position: relative;
            max-width: 600px;
            margin: 0 auto;
            padding-left: 30px;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #2196F3;
            border-radius: 2px;
        }
        .item {
            background-color: white;
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 30px;
            position: relative;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .item::before {
            content: '';
            position: absolute;
            left: -22px;
            top: 20px;
            width: 15px;
            height: 15px;
            background-color: #2196F3;
            border-radius: 50%;
            border: 3px solid white;
        }
        .tahun {
            font-weight: bold;
            color: #2196F3;
            margin-bottom: 5px;
        }
        .judul {
            font-size: 1.1em;
            margin-bottom: 8px;
        }
        .deskripsi {
            color: #555;
        }
        .buttons {
            max-width: 600px;
            margin: 30px auto 0;
            display: flex;
            justify-content: space-between;
        }
        .buttons a {
            background-color: #2196F3;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .buttons a:hover {
            background-color: #0b7dda;
        }
    </style>
</head>
<body>

<h2>Timeline Pengalaman Kuliah</h2>
<form action="Soal3.php" method="post">

<div class="timeline">
    <?php foreach ($pengalaman as $item): ?>
        <div class="item">
            <div class="tahun"><?= htmlspecialchars($item['tahun']) ?></div>
            <div class="judul"><?= htmlspecialchars($item['judul']) ?></div>
            <div class="deskripsi"><?= htmlspecialchars($item['deskripsi']) ?></div>
        </div>
    <?php endforeach; ?>
</div>

<div class="buttons">
    <a href="Soal1.php">Profil Interaktif</a>
    <a href="Soal3.php">Blog Reflektif</a>
</div>

</body>
</html>





