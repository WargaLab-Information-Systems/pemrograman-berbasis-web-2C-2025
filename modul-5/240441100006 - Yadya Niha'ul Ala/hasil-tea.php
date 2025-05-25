<!-- hasil dalam bentuk table -->
<!DOCTYPE html>
<html lang="id">
<head>
  <link rel="shortcut icon" href="img/wmlon.png"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Raleway:wght@400;600;700&family=Quicksand:wght@400;500;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css"/>
  
  <title>Your Tea</title>
</head>
<body style="background-color: #f7b29b;">
  <div class="capsule-navbar hidden" id="navbar">
    <a href="index.html">Go Back</a>
  </div>
  <div class="bg-container">
    <div class="highlight">Now that you’ve exposed yourself…</div>
    <h2>Take a Look at the Tea You've Spilled</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // ambil data
        $name     = $_POST["name"] ?? '';
        $nim      = $_POST["nim"] ?? '';
        $address  = $_POST["address"] ?? '';
        $email    = $_POST["email"] ?? '';
        $phone    = $_POST["phone"] ?? '';
        $language = $_POST["language"] ?? '';
        $project  = $_POST["project"] ?? '';
        $software = isset($_POST["software"]) ? implode(', ', $_POST["software"]) : '-';
        $os       = $_POST["os"] ?? '';
        $skill    = $_POST["skill"] ?? '';

        if ($name && $nim && $address && $email && $phone && $language && $project && $os && $skill) {
            echo "<p>Thank you, <i>" . htmlspecialchars($name) . "</i>, we appreciated it. Here's what you spilled to us:</p>";

            echo "<table border='1' cellpadding='8'>";
            echo "<tr><th>Nama</th><td>" . htmlspecialchars($name) . "</td></tr>";
            echo "<tr><th>NIM</th><td>" . htmlspecialchars($nim) . "</td></tr>";
            echo "<tr><th>Alamat</th><td>" . htmlspecialchars($address) . "</td></tr>";
            echo "<tr><th>Email</th><td>" . htmlspecialchars($email) . "</td></tr>";
            echo "<tr><th>Telepon</th><td>" . htmlspecialchars($phone) . "</td></tr>";
            echo "<tr><th>Bahasa Pemrograman</th><td>" . htmlspecialchars($language) . "</td></tr>";
            echo "<tr><th>Proyek Pribadi</th><td>" . nl2br(htmlspecialchars($project)) . "</td></tr>";
            echo "<tr><th>Software Digunakan</th><td>" . htmlspecialchars($software) . "</td></tr>";
            echo "<tr><th>Sistem Operasi</th><td>" . htmlspecialchars($os) . "</td></tr>";
            echo "<tr><th>Tingkat Pengetahuan</th><td>" . htmlspecialchars($skill) . "</td></tr>";
            echo "</table>";

            // lebih dari 2 bahasa pemrograman
            $languageList = array_map('trim', explode(',', $language));
            if (count($languageList) > 2) {
                echo "<h4>Ho, Anda cukup berpengalaman dalam pemrograman!</h4>";
            }

        } else {
        echo "<p style='color:red;'>Anda wajib mengisi semua field!</p>";
        }
    } else {
        echo "<p style='color:red;'>Akses tidak valid.</p>";
    }
    ?>
  </div>

  <footer class="footer">
      <p>
          &copy; 2025 | 240441100006 | Lovingly designed by Yadya Niha
  </footer>

  <script src="script.js"></script>
</body>
</html>
