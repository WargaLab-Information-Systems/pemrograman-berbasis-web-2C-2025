<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Interaktif Mahasiswa</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #eef3f8;
      color: #2c3e50;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: white;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      padding: 20px;
      margin: -20px -20px 30px -20px;
      border-radius: 0 0 15px 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    table {
      border-collapse: collapse;
      margin: 0 auto 30px auto;
      width: 60%;
      background-color: #ffffff;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #2575fc;
      color: white;
    }

    tr:last-child td {
      border-bottom: none;
    }

    .form-section {
      width: 60%;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 14px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #34495e;
    }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    input[type="checkbox"],
    input[type="radio"] {
      margin-right: 8px;
    }

    input[type="submit"] {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 20px;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background: linear-gradient(to right, #5e0ec4, #1e63e2);
    }
  </style>
</head>
<body>

<h1>Profil Interaktif Mahasiswa</h1>

<table>
  <tr><th>Nama</th><td>Laura Nirmala</td></tr>
  <tr><th>NIM</th><td>240441100046</td></tr>
  <tr><th>Tempat, Tanggal Lahir</th><td>Sampang, 6 agustus 2005</td></tr>
  <tr><th>Email</th><td>nirmalalaura08@gmail.com</td></tr>
  <tr><th>Nomor HP</th><td>082257586570</td></tr>
</table>

<div class="form-section">
  <form method="post" action="HasilInput.php">
    <label>Bahasa Pemrograman:
      <input type="text" name="bahasa[]" placeholder="Contoh: PHP">
      <input type="text" name="bahasa[]" placeholder="Contoh: JavaScript">
      <input type="text" name="bahasa[]" placeholder="Contoh: Python">
    </label>

    <label>Pengalaman Proyek:
      <textarea name="pengalaman" rows="4" placeholder="Contoh: Membuat aplikasi kasir dengan PHP dan MySQL"></textarea>
    </label>

    <label>Software yang Sering Digunakan:</label>
    <label><input type="checkbox" name="software[]" value="VS Code"> VS Code</label>
    <label><input type="checkbox" name="software[]" value="XAMPP"> XAMPP</label>
    <label><input type="checkbox" name="software[]" value="Git"> Git</label>

    <label>Sistem Operasi:</label>
    <label><input type="radio" name="os" value="Windows"> Windows</label>
    <label><input type="radio" name="os" value="Linux"> Linux</label>
    <label><input type="radio" name="os" value="Mac"> Mac</label>

    <label>Tingkat Penguasaan PHP:
      <select name="tingkat_php">
        <option value="">--Pilih--</option>
        <option value="Pemula">Pemula</option>
        <option value="Menengah">Menengah</option>
        <option value="Mahir">Mahir</option>
      </select>
    </label>

    <input type="submit" name="submit" value="Kirim">
  </form>
</div>
</body>
</html>