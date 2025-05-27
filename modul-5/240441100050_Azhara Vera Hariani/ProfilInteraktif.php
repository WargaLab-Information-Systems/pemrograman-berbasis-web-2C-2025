<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Profil Interaktif Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg,rgb(226, 240, 241),rgb(226, 236, 238));
      padding: 40px;
      color: #333;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #4a148c;
    }

    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 60%;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    td {
      padding: 12px 16px;
      border: 1px solid #ccc;
    }

    td:first-child {
      font-weight: bold;
      background-color:rgb(232, 230, 221);
      width: 40%;
    }

    form {
      max-width: 600px;
      margin: 40px auto;
      background: #ffffffaa;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }

    label {
      font-weight: 600;
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
    }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 8px;
      border: 1px solid #bbb;
      transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    textarea:focus,
    select:focus {
      border-color: #7b1fa2;
      outline: none;
      box-shadow: 0 0 5px #ce93d8;
    }

    input[type="checkbox"],
    input[type="radio"] {
      margin-right: 8px;
    }

    input[type="submit"] {
      margin-top: 20px;
      background-color: #7b1fa2;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #4a0072;
    }
  </style>
</head>
<body>

  <h1>Profil Interaktif Mahasiswa</h1>

  <!-- Tabel Data Diri -->
  <table>
    <tr><td>Nama</td><td>Azhara Vera Hariani</td></tr>
    <tr><td>NIM</td><td>240441100050</td></tr>
    <tr><td>Tempat, Tanggal Lahir</td><td>Mojokerto, 27 Januari 2006</td></tr>
    <tr><td>Email</td><td>azahrafera96@gmail.com</td></tr>
    <tr><td>Nomor HP</td><td>081234567890</td></tr>
  </table>

  <!-- Form Interaktif -->
  <form action="proses.php" method="post">
    <input type="hidden" name="nama" value="Azhara Vera Hariani">
    <input type="hidden" name="nim" value="240441100050">
    <input type="hidden" name="ttl" value="Mojokerto, 27 Januari 2006">
    <input type="hidden" name="email" value="azahrafera96@gmail.com">
    <input type="hidden" name="hp" value="081234567890">

    <label>Bahasa Pemrograman yang Dikuasai:</label>
    <input type="text" name="bahasa[]">
    <input type="text" name="bahasa[]">
    <input type="text" name="bahasa[]">

    <label>Pengalaman Membuat Proyek:</label>
    <textarea name="pengalaman" rows="4"></textarea>

    <label>Software yang Sering Digunakan:</label>
    <input type="checkbox" name="software[]" value="VS Code">VS Code
    <input type="checkbox" name="software[]" value="XAMPP">XAMPP
    <input type="checkbox" name="software[]" value="Git">Git

    <label>Sistem Operasi yang Digunakan:</label>
    <input type="radio" name="os" value="Windows">Windows
    <input type="radio" name="os" value="Linux">Linux
    <input type="radio" name="os" value="Mac">Mac

    <label>Tingkat Penguasaan PHP:</label>
    <select name="tingkat_php">
      <option value="">-- Pilih --</option>
      <option value="Pemula">Pemula</option>
      <option value="Menengah">Menengah</option>
      <option value="Mahir">Mahir</option>
    </select>

    <input type="submit" value="Kirim" a href="Proses.php"></a>>
  </form>

</body>
</html>


 
