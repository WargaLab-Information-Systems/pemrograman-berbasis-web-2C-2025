<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Interaktif Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Profil Interaktif Mahasiswa</h1>

  <table>
    <tr><td>Nama</td><td>Karina Porto</td></tr>
    <tr><td>NIM</td><td>1234567890</td></tr>
    <tr><td>Tempat, Tanggal Lahir</td><td>Jakarta, 1 Januari 2000</td></tr>
    <tr><td>Email</td><td>karina@email.com</td></tr>
    <tr><td>Nomor HP</td><td>08123456789</td></tr>
  </table>

  <form method="post">
    <label>Bahasa Pemrograman (pisahkan dengan koma):</label>
    <input type="text" name="bahasa">

    <label>Pengalaman Proyek Pribadi:</label>
    <textarea name="pengalaman" rows="4"></textarea>

    <label>Software yang sering digunakan:</label><br>
    <input type="checkbox" name="software[]" value="VS Code"> VS Code
    <input type="checkbox" name="software[]" value="XAMPP"> XAMPP
    <input type="checkbox" name="software[]" value="Git"> Git

    <br><label>Sistem Operasi:</label><br>
    <input type="radio" name="os" value="Windows"> Windows
    <input type="radio" name="os" value="Linux"> Linux
    <input type="radio" name="os" value="Mac"> Mac

    <br><label>Tingkat Penguasaan PHP:</label>
    <select name="tingkat">
      <option value="">--Pilih--</option>
      <option value="Pemula">Pemula</option>
      <option value="Menengah">Menengah</option>
      <option value="Mahir">Mahir</option>
    </select>

    <input type="submit" name="submit" value="Kirim">
  </form>

  <?php
  function cetak_array($arr) {
    return implode(", ", $arr);
  }

  if (isset($_POST['submit'])) {
    $bahasa = explode(",", $_POST['bahasa']);
    $pengalaman = $_POST['pengalaman'];
    $software = $_POST['software'] ?? [];
    $os = $_POST['os'] ?? '';
    $tingkat = $_POST['tingkat'];

    if (empty($_POST['bahasa']) || empty($pengalaman) || empty($software) || empty($os) || empty($tingkat)) {
      echo "<p style='color:red;'>Semua input wajib diisi!</p>";
    } else {
      echo "<h2>Hasil Input:</h2>";
      echo "<table>";
      echo "<tr><td>Bahasa Pemrograman</td><td>" . cetak_array($bahasa) . "</td></tr>";
      echo "<tr><td>Pengalaman</td><td>$pengalaman</td></tr>";
      echo "<tr><td>Software</td><td>" . cetak_array($software) . "</td></tr>";
      echo "<tr><td>Sistem Operasi</td><td>$os</td></tr>";
      echo "<tr><td>Tingkat PHP</td><td>$tingkat</td></tr>";
      echo "</table>";

      echo "<p>Pengalaman Anda: $pengalaman</p>";
      if (count($bahasa) > 2) {
        echo "<p><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
      }
    }
  }
  ?>

  <div class="nav">
    <a class="button" href="timeline.php">Timeline Pengalaman</a>
  </div>
</body>
</html>
