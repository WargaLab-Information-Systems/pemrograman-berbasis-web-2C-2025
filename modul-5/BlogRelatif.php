<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f7fb;
            color: #2c3e50;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #2980b9;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 20px 0;
            background: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Artikel Blog Reflektif</h1>
    <ul>
        <?php foreach ($artikel as $id => $post): ?>
            <li>
                <a href="artikel.php?id=<?= $id ?>">
                    <?= $post['judul'] ?> (<?= $post['tanggal'] ?>)
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>