<?php
$artikel = [
    ['id' => 1, 'judul' => 'Belajar PHP Dasar', 'tanggal' => '2025-05-20'],
    ['id' => 2, 'judul' => 'Mengenal Array di PHP', 'tanggal' => '2025-05-21'],
    ['id' => 3, 'judul' => 'Fungsi-fungsi Penting dalam PHP', 'tanggal' => '2025-05-22']
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(214, 245, 255);
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .art {
            max-width: 600px;
            margin: 0 auto;
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
            font-size: 16px;
        }

        a {
            text-decoration: none;
            color: #0d47a1;
            transition: color 0.3s;
        }

        a:hover {
            color:rgb(142, 223, 234);
        }
        .button-group {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 8px 9px;
            margin-top: 10px;
            background: #67737b;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .btn:hover {
            background: orange;
        }
    </style>
</head>
<body>
    <h2>Daftar Artikel Blog</h2>
    <div class="art">  
        <ul>
            <?php foreach ($artikel as $a): ?>
                <li>
                    <a href="artikel.php?id=<?= $a['id'] ?>">
                        <?= $a['judul'] ?> (<?= $a['tanggal'] ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="button-group">
        <a href="index.php" class="btn">Profil</a>
        <a href="timeline.php" class="btn">Timeline</a>
    </div>
</body>
</html>
