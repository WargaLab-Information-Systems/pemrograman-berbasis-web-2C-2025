<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Interaktif Mahasiswa</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    table { margin-bottom: 20px; width: 70%; }
    .form-section { margin-top: 30px; }
  </style>
</head>
<body>

<h1>Profil Interaktif Mahasiswa</h1>

<!-- TABEL DATA DIRI -->
<table>
  <tr><th>Nama</th><td>Sumanto</td></tr>
  <tr><th>NIM</th><td>123456789</td></tr>
  <tr><th>Tempat, Tanggal Lahir</th><td>Yogyakarta, 1 Januari 2000</td></tr>
  <tr><th>Email</th><td>sumanto@example.com</td></tr>
  <tr><th>Nomor HP</th><td>081234567890</td></tr>
</table>

<!-- FORMULIR -->
<div class="form-section">
  <form method="post">
    <label>Bahasa Pemrograman:<br>
      <input type="text" name="bahasa[]"><br>
      <input type="text" name="bahasa[]"><br>
      <input type="text" name="bahasa[]"><br>
    </label><br>

    <label>Pengalaman Proyek:<br>
      <textarea name="pengalaman" rows="4" cols="50"></textarea>
    </label><br><br>

    <label>Software yang Sering Digunakan:<br>
      <input type="checkbox" name="software[]" value="VS Code"> VS Code
      <input type="checkbox" name="software[]" value="XAMPP"> XAMPP
      <input type="checkbox" name="software[]" value="Git"> Git
    </label><br><br>

    <label>Sistem Operasi:<br>
      <input type="radio" name="os" value="Windows"> Windows
      <input type="radio" name="os" value="Linux"> Linux
      <input type="radio" name="os" value="Mac"> Mac
    </label><br><br>

    <label>Tingkat Penguasaan PHP:<br>
      <select name="tingkat_php">
        <option value="">--Pilih--</option>
        <option value="Pemula">Pemula</option>
        <option value="Menengah">Menengah</option>
        <option value="Mahir">Mahir</option>
      </select>
    </label><br><br>

    <input type="submit" name="submit" value="Kirim">
  </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bahasa = array_filter($_POST["bahasa"]);
  $pengalaman = trim($_POST["pengalaman"]);
  $software = $_POST["software"] ?? [];
  $os = $_POST["os"] ?? '';
  $tingkat_php = $_POST["tingkat_php"];

  if (empty($bahasa) || $pengalaman == "" || empty($software) || $os == "" || $tingkat_php == "") {
    echo "<p style='color:red;'><strong>Semua input wajib diisi!</strong></p>";
  } else {
    echo "<h2>Hasil Input</h2>";
    echo "<table>";
    echo "<tr><th>Bahasa</th><td>" . implode(", ", $bahasa) . "</td></tr>";
    echo "<tr><th>Software</th><td>" . implode(", ", $software) . "</td></tr>";
    echo "<tr><th>OS</th><td>$os</td></tr>";
    echo "<tr><th>Tingkat PHP</th><td>$tingkat_php</td></tr>";
    echo "</table>";

    echo "<p><strong>Pengalaman:</strong><br>" . nl2br(htmlspecialchars($pengalaman)) . "</p>";

    if (count($bahasa) > 2) {
      echo "<p style='color:green;'>Anda cukup berpengalaman dalam pemrograman!</p>";
    }
  }
}
?>

<br>
<a href="timeline_pengalaman.php">Lihat Timeline Pengalaman Kuliah</a>

</body>
</html>
