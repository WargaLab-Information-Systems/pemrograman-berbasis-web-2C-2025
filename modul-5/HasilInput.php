<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Profil Mahasiswa</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #eef3f8;
      color: #2c3e50;
      padding: 20px;
      margin: 0;
    }

    h2 {
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
      width: 70%;
      margin: 0 auto 25px auto;
      background-color: #ffffff;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #2575fc;
      color: white;
      width: 30%;
    }

    tr:last-child td {
      border-bottom: none;
    }

    .pengalaman {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 12px;
      width: 70%;
      margin: 0 auto 20px auto;
      box-shadow: 0 0 12px rgba(0,0,0,0.05);
      line-height: 1.6;
    }

    .error {
      color: #e74c3c;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .success {
      color: #27ae60;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .button-container {
      text-align: center;
      margin-top: 30px;
    }

    a {
      display: inline-block;
      margin: 10px 8px;
      text-decoration: none;
      color: white;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      padding: 10px 22px;
      border-radius: 8px;
      transition: background 0.3s ease;
      font-weight: bold;
    }

    a:hover {
      background: linear-gradient(to right, #5e0ec4, #1e63e2);
    }
  </style>
</head>
<body>

<h2>Hasil Input Profil Mahasiswa</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bahasa = array_filter($_POST["bahasa"] ?? []);
  $pengalaman = trim($_POST["pengalaman"] ?? '');
  $software = $_POST["software"] ?? [];
  $os = $_POST["os"] ?? '';
  $tingkat_php = $_POST["tingkat_php"] ?? '';

  if (empty($bahasa) || $pengalaman == "" || empty($software) || $os == "" || $tingkat_php == "") {
    echo "<p class='error'>⚠ Semua input wajib diisi!</p>";
    echo "<div class='button-container'><a href='ProfileInteraktifMahasiswa.php'>← Kembali ke Form</a></div>";
    exit;
  }

  echo "<table>";
  echo "<tr><th>Bahasa Pemrograman</th><td>" . implode(", ", $bahasa) . "</td></tr>";
  echo "<tr><th>Software</th><td>" . implode(", ", $software) . "</td></tr>";
  echo "<tr><th>Sistem Operasi</th><td>$os</td></tr>";
  echo "<tr><th>Tingkat PHP</th><td>$tingkat_php</td></tr>";
  echo "</table>";

  echo "<div class='pengalaman'>";
  echo "<p><strong>Pengalaman:</strong><br>" . nl2br(htmlspecialchars($pengalaman)) . "</p>";
  echo "</div>";

  if (count($bahasa) > 1) {
    echo "<p class='success'>🎉 Anda cukup berpengalaman dalam pemrograman!</p>";
  }

  echo "<div class='button-container'>";
  echo "<a href='TimelinePengalamanKuliah.php'>→ Lihat Timeline Pengalaman Kuliah</a>";
  echo "<a href='ProfileInteraktifMahasiswa.php'>← Kembali ke Profil</a>";
  echo "</div>";

} else {
  echo "<p class='error'>Data tidak ditemukan. Harap isi form terlebih dahulu.</p>";
  echo "<div class='button-container'><a href='ProfileInteraktifMahasiswa.php'>← Kembali ke Form</a></div>";
}
?>

</body>
</html>