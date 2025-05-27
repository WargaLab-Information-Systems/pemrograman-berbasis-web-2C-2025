<?php include 'data.php'; ?> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background: #f7f9fc;
            color: #333;
            margin: 40px;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 1.1px;
            text-transform: uppercase;
            text-shadow: 1px 1px 2px #bbb;
        }

        ul {
            max-width: 600px;
            margin: 0 auto;
            padding: 0;
            list-style: none;
        }

        li {
            background: white;
            margin-bottom: 15px;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        li:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        a {
            color: #34495e;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.1rem;
            display: block;
        }

        a:hover {
            color: #b9294b;
            text-decoration: underline;
        }

        /* Tanggal artikel di sebelah kanan dengan gaya ringan */
        a::after {
            content: attr(data-tanggal);
            float: right;
            font-weight: 400;
            font-size: 0.9rem;
            color: #999;
        }

        @media (max-width: 480px) {
            body {
                margin: 20px 10px;
            }
            ul {
                max-width: 100%;
            }
            li {
                padding: 12px 15px;
            }
            a {
                font-size: 1rem;
            }
            a::after {
                float: none;
                display: block;
                margin-top: 4px;
                color: #aaa;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Artikel Blog Reflektif</h1>
    <ul>
        <?php foreach ($artikel as $id => $post): ?>
            <li>
                <a href="artikel.php?id=<?= $id ?>" data-tanggal="<?= htmlspecialchars($post['tanggal']) ?>">
                    <?= htmlspecialchars($post['judul']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
