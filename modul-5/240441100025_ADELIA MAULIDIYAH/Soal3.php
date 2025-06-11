<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #e3f2fd, #ffffff);
            color: #333;
            padding: 30px;
            margin: 0;
        }

        h2 {
            color: #0d47a1;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            background-color: #ffffff;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 6px solid #2196f3;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        li:hover {
            transform: translateX(5px);
        }

        a {
            text-decoration: none;
            color: #0d47a1;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #1565c0;
            color: white;
            border: none;
            padding: 10px 18px;
            margin: 20px 10px 0 0;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        button:hover {
            background-color: #0d47a1;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

    <h2>Daftar Artikel Reflektif</h2>
    <ul>
        <?php foreach ($artikel as $id => $item): ?>
            <li>
                <a href="artikel.php?id=<?= $id ?>"><?= $item['judul'] ?> (<?= $item['tanggal'] ?>)</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="Soal1.php"><button>Profil Interaktif</button></a>
    <a href="Soal2.php"><button>Timeline Pengalaman Kuliah</button></a>

</body>
</html>
