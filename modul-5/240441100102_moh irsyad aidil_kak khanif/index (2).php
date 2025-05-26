<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Interaktif Mahasiswa</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e3f2fd, #fce4ec);
      padding: 40px;
    }

    h1, h2, h3 {
      color: #2c3e50;
    }

    .card {
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      border: none;
      border-radius: 10px;
    }

    table {
      border-radius: 8px;
      overflow: hidden;
    }

    th {
      background-color: #f1f1f1;
      color: #333;
    }

    .btn-primary {
      background-color: #3498db;
      border: none;
    }

    .btn-primary:hover {
      background-color: #2980b9;
    }

    .form-check-input:checked {
      background-color: #3498db;
      border-color: #3498db;
    }

    .error {
      background-color: #ffe6e6;
      border-left: 5px solid #e74c3c;
      padding: 10px;
      border-radius: 5px;
      color: #c0392b;
      margin-top: 20px;
    }

    p {
      line-height: 1.6;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1 class="mb-4 text-center">Profil Interaktif Mahasiswa</h1>
    
    <!-- Navigasi -->
    <div class="mt-5 text-center">
      <a href="halaman2.php" class="btn btn-custom me-3">Menuju timeline</a>
      <a href="halaman3.php" class="btn btn-outline-primary">Menuju Blog</a>
    </div>

    <!-- Data Diri -->
    <h2>Data Diri</h2>
    <div class="card p-3 mb-4">
      <table class="table table-bordered mb-0">
        <tr><th>Nama</th><td>irsyad aidil</td></tr>
        <tr><th>NIM</th><td>240441100102</td></tr>
        <tr><th>Tempat, Tanggal Lahir</th><td>lamongan, 29 juni 2006</td></tr>
        <tr><th>Email</th><td>irsyadaidil@mail.com</td></tr>
        <tr><th>Nomor HP</th><td>0812-3456-7890</td></tr>
      </table>
    </div>

    <!-- Form Isian -->
    <h2>Form Isian</h2>
    <div class="card p-4 mb-5">
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Bahasa Pemrograman yang Dikuasai</label>
          <input type="text" name="bahasa[]" class="form-control mb-2" required>
          <input type="text" name="bahasa[]" class="form-control mb-2">
          <input type="text" name="bahasa[]" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Pengalaman Membuat Proyek</label>
          <textarea name="pengalaman" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Software yang Sering Digunakan</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="software[]" value="VS Code">
            <label class="form-check-label">VS Code</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="software[]" value="XAMPP">
            <label class="form-check-label">XAMPP</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="software[]" value="Git">
            <label class="form-check-label">Git</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="software[]" value="Figma">
            <label class="form-check-label">Figma</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Sistem Operasi yang Digunakan</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="os" value="Windows" required>
            <label class="form-check-label">Windows</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="os" value="Linux">
            <label class="form-check-label">Linux</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="os" value="Mac">
            <label class="form-check-label">Mac</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Tingkat Penguasaan PHP</label>
          <select name="tingkat_php" class="form-select" required>
            <option value="">--Pilih Tingkatan--</option>
            <option value="Pemula">Pemula</option>
            <option value="Menengah">Menengah</option>
            <option value="Mahir">Mahir</option>
          </select>
        </div>

        <!-- Kriteria Mahasiswa -->
        <div class="mb-3">
          <label class="form-label">Kriteria Mahasiswa</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="kriteria[]" value="Rajin">
            <label class="form-check-label">Rajin</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="kriteria[]" value="Tepat Waktu">
            <label class="form-check-label">Tepat Waktu</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="kriteria[]" value="Aktif di Kelas">
            <label class="form-check-label">Aktif di Kelas</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="kriteria[]" value="Kreatif">
            <label class="form-check-label">Kreatif</label>
          </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
      </form>
    </div>

    <!-- Hasil Output -->
    <?php
    if (isset($_POST['submit'])) {
      $bahasa = array_filter($_POST['bahasa'], fn($b) => trim($b) !== "");
      $pengalaman = trim($_POST['pengalaman']);
      $software = $_POST['software'] ?? [];
      $os = $_POST['os'] ?? '';
      $tingkat_php = $_POST['tingkat_php'];
      $kriteria = $_POST['kriteria'] ?? [];

      if (empty($bahasa) || empty($pengalaman) || empty($software) || empty($os) || empty($tingkat_php) || empty($kriteria)) {
        echo "<div class='error'>Semua input wajib diisi!</div>";
      } else {
        echo "<h2>Hasil Input</h2>";
        echo "<div class='card p-3 mb-4'>";
        echo "<table class='table table-bordered'>
                <tr><th>Bahasa Pemrograman</th><td>" . implode(', ', $bahasa) . "</td></tr>
                <tr><th>Software</th><td>" . implode(', ', $software) . "</td></tr>
                <tr><th>Sistem Operasi</th><td>$os</td></tr>
                <tr><th>Tingkat PHP</th><td>$tingkat_php</td></tr>
                <tr><th>Kriteria Mahasiswa</th><td>" . implode(', ', $kriteria) . "</td></tr>
              </table>";
        echo "<h3>Pengalaman:</h3><p>$pengalaman</p>";

        if (count($bahasa) > 2) {
          echo "<div class='alert alert-success mt-3'><strong>Anda cukup berpengalaman dalam pemrograman!</strong></div>";
        }
        echo "</div>";
      }
    }
    ?>
  </div>

</body>
</html>
