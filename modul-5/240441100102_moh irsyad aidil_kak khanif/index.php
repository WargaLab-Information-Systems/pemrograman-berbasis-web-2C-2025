<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Interaktif Mahasiswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 8px;
    }
    table {
      margin-bottom: 20px;
      width: 100%;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>

  <h1>Profil Interaktif Mahasiswa</h1>

  <!-- Bagian 1: Data Diri -->
  <h2>Data Diri</h2>
  <table>
    <tr><th>Nama</th><td>Karina Porto</td></tr>
    <tr><th>NIM</th><td>123456789</td></tr>
    <tr><th>Tempat, Tanggal Lahir</th><td>Jakarta, 5 Mei 2002</td></tr>
    <tr><th>Email</th><td>karina@mail.com</td></tr>
    <tr><th>Nomor HP</th><td>0812-3456-7890</td></tr>
  </table>

  <!-- Bagian 2: Form -->
  <h2>Form Isian</h2>
  <form method="POST">
    <label>Bahasa Pemrograman yang Dikuasai:<br>
      <input type="text" name="bahasa[]" required>
      <input type="text" name="bahasa[]">
      <input type="text" name="bahasa[]">
    </label><br><br>

    <label>Pengalaman Membuat Proyek:<br>
      <textarea name="pengalaman" rows="4" cols="50" required></textarea>
    </label><br><br>

    <label>Software yang Sering Digunakan:<br>
      <input type="checkbox" name="software[]" value="VS Code"> VS Code
      <input type="checkbox" name="software[]" value="XAMPP"> XAMPP
      <input type="checkbox" name="software[]" value="Git"> Git
      <input type="checkbox" name="software[]" value="Figma"> Figma
    </label><br><br>

    <label>Sistem Operasi yang Digunakan:<br>
      <input type="radio" name="os" value="Windows" required> Windows
      <input type="radio" name="os" value="Linux"> Linux
      <input type="radio" name="os" value="Mac"> Mac
    </label><br><br>

    <label>Tingkat Penguasaan PHP:<br>
      <select name="tingkat_php" required>
        <option value="">--Pilih Tingkatan--</option>
        <option value="Pemula">Pemula</option>
        <option value="Menengah">Menengah</option>
        <option value="Mahir">Mahir</option>
      </select>
    </label><br><br>

    <button type="submit" name="submit">Kirim</button>
  </form>

  <!-- Bagian 3: Output -->
  <?php
  if (isset($_POST['submit'])) {
    // Ambil dan validasi input
    $bahasa = array_filter($_POST['bahasa'], fn($b) => trim($b) !== "");
    $pengalaman = trim($_POST['pengalaman']);
    $software = $_POST['software'] ?? [];
    $os = $_POST['os'] ?? '';
    $tingkat_php = $_POST['tingkat_php'];

    if (empty($bahasa) || empty($pengalaman) || empty($software) || empty($os) || empty($tingkat_php)) {
      echo "<p class='error'>Semua input wajib diisi!</p>";
    } else {
      echo "<h2>Hasil Input</h2>";

      // Tampilkan dalam bentuk tabel
      echo "<table>
              <tr><th>Bahasa Pemrograman</th><td>" . implode(', ', $bahasa) . "</td></tr>
              <tr><th>Software</th><td>" . implode(', ', $software) . "</td></tr>
              <tr><th>Sistem Operasi</th><td>$os</td></tr>
              <tr><th>Tingkat PHP</th><td>$tingkat_php</td></tr>
            </table>";

      // Tampilkan paragraf pengalaman
      echo "<h3>Pengalaman:</h3><p>$pengalaman</p>";

      // Jika menguasai lebih dari 2 bahasa
      if (count($bahasa) > 2) {
        echo "<p><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
      }
    }
  }
  ?>

</body>
</html>
