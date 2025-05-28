<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Data Diri</title>
    <style>
        body {
            background-color: lightslategray;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table, tr, th, td {
            border: 1px solid;
            border-collapse: collapse;
            margin: auto;
            padding: 6px 30px;
            text-align: center;
            background-color: rgb(241, 170, 84);
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            justify-content: center;
            align-items: flex-start;
            border: 1px solid;
            border-radius: 20px;
            margin: 30px auto;
            padding: 30px;
            background-color: rgb(241, 170, 84);
            width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        input[type="text"],
        input[type="email"],
        textarea {
            background-color: rgb(179, 189, 198);
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        select {
            padding: 5px;
            width: 40%;
        }
        .checkbox-group,
        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .checkbox-group label,
        .radio-group label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: darkslategray;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: black;
        }
        .button-group {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 8px 9px;
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

    <h2 align="center">Form Data Diri dan Skill Mahasiswa</h2>

    <form method="post" action="h2.php" class="form">
        <label>Nama:</label>
        <input type="text" name="nama">

        <label>NIM:</label>
        <input type="text" name="nim">

        <label>Tempat, Tanggal Lahir:</label>
        <input type="text" name="ttl">

        <label>Email:</label>
        <input type="email" name="email">

        <label>Nomor HP:</label>
        <input type="text" name="hp">

        <label>Bahasa Pemrograman yang Dikuasai:</label>
        <input type="text" name="bahasa[]">
        <input type="text" name="bahasa[]">
        <input type="text" name="bahasa[]">

        <label>Pengalaman Proyek Pribadi:</label>
        <textarea name="pengalaman" rows="4" cols="50"></textarea>

        <label>Software yang Sering Digunakan:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="software[]" value="VS Code">VS Code</label>
            <label><input type="checkbox" name="software[]" value="XAMPP">XAMPP</label>
            <label><input type="checkbox" name="software[]" value="Git">Git</label>
            <label><input type="checkbox" name="software[]" value="Figma">Figma</label>
        </div>

        <label>Sistem Operasi yang Digunakan:</label>
        <div class="radio-group">
            <label><input type="radio" name="os" value="Windows">Windows</label>
            <label><input type="radio" name="os" value="Linux">Linux</label>
            <label><input type="radio" name="os" value="Mac">Mac</label>
        </div>

        <label>Tingkat Penguasaan PHP:</label>
        <select name="tingkat">
            <option value="">-- Pilih --</option>
            <option value="Pemula">Pemula</option>
            <option value="Menengah">Menengah</option>
            <option value="Mahir">Mahir</option>
        </select>

        <input type="submit" value="Kirim">
    </form>
    <div class="button-group">
        <a href="timeline.php" class="btn">Timeline</a>
        <a href="blog.php" class="btn">Blog</a>
    </div><br>
</body>
</html>
