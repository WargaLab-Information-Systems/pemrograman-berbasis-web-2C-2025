<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Interaktif Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #f8f9fa, #e0f7fa);
      margin: 0;
      padding: 20px;
      color: #333;
    }

    h1, h3 {
      color: #0d47a1;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 600px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
      margin-bottom: 30px;
    }

    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #0d47a1;
      color: white;
      text-align: left;
      width: 40%;
    }

    form {
      background-color: #ffffff;
      padding: 20px;
      max-width: 600px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    input[type="checkbox"],
    input[type="radio"] {
      margin-right: 8px;
    }

    input[type="submit"] {
      background-color: #0d47a1;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #1565c0;
    }

    p {
      margin-bottom: 15px;
    }

    @media (max-width: 600px) {
      table, form {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <h1>Profil Interaktif Mahasiswa</h1>

  <!-- Tabel Data Diri -->
  <table>
    <tr><th>Nama</th><td>Adelia Maulidiyah</td></tr>
    <tr><th>NIM</th><td>240441100025</td></tr>
    <tr><th>Tempat, Tanggal Lahir</th><td>Mojokerto, 26 Februari 2006</td></tr>
    <tr><th>Email</th><td>adeliamldiyah@email.com</td></tr>
    <tr><th>Nomor HP</th><td>085704182026</td></tr>
  </table>

  <!-- Form Isian -->
  <h3>Form Isian Tambahan</h3>
  <form action="proses1.php" method="post">
    <p>
      <label>Bahasa Pemrograman yang Dikuasai:</label><br>
      <input type="text" name="bahasa[]" required>
      <input type="text" name="bahasa[]">
      <input type="text" name="bahasa[]">
    </p>

    <p>
      <label>Pengalaman Proyek:</label><br>
      <textarea name="pengalaman" rows="4" required></textarea>
    </p>

    <p>
      <label>Software yang Sering Digunakan:</label><br>
      <input type="checkbox" name="software[]" value="VS Code">VS Code<br>
      <input type="checkbox" name="software[]" value="XAMPP">XAMPP<br>
      <input type="checkbox" name="software[]" value="Git">Git<br>
      <input type="checkbox" name="software[]" value="Lainnya">Lainnya
    </p>

    <p>
      <label>Sistem Operasi yang Digunakan:</label><br>
      <input type="radio" name="os" value="Windows" required>Windows
      <input type="radio" name="os" value="Linux">Linux
      <input type="radio" name="os" value="Mac">Mac
    </p>

    <p>
      <label>Tingkat Penguasaan PHP:</label><br>
      <select name="tingkat" required>
        <option value="">--Pilih--</option>
        <option value="Pemula">Pemula</option>
        <option value="Menengah">Menengah</option>
        <option value="Mahir">Mahir</option>
      </select>
    </p>

    <input type="submit" value="Kirim">
  </form>

</body>
</html>
