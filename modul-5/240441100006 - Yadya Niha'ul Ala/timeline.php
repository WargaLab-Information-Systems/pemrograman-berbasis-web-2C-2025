<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="img/flow.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Raleway:wght@400;600;700&family=Quicksand:wght@400;500;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"/>

    <title>Timeline</title>
  </head>
  <body style="background-color: #f7b29b;">
    <div id="main" class="banner">
      <div class="banner-title">
        <h1>
          <span>I Poured Hot Tea</span>
        </h1>
      </div>
    </div>

    <div class="capsule-navbar hidden" id="navbar">
      <a href="index.html">Kembali ke Profil</a>
      <a href="blog.php">Menuju Blog</a>
    </div>

    <div class="timeline-title">
      <h1>Timeline Pengalaman Kuliah</h1>
    </div>
    <div class="timeline"> 
        <?php
        $timeline = [
            ["tanggal" => "Agustus 2024", "judul" => "Awal Masuk Kuliah", "deskripsi" => "Dibantai ospek univ hingga prodi (pesona paling parah)."],
            ["tanggal" => "September 2024", "judul" => "Perkuliahan Dimulai", "deskripsi" => "Beradaptasi dengan dunia kuliah dan terkena beberapa culture shock..."],
            ["tanggal" => "Oktober 2024", "judul" => "Sibuk Praktikum", "deskripsi" => "Penyesuaian dengan praktikum yang baru beberapa kali pertemuan."],
            ["tanggal" => "November 2024", "judul" => "Ikut Kepanitian", "deskripsi" => "Sibuk rapat dan kegiatannya."],
            ["tanggal" => "Desember 2024", "judul" => "Ujian Akhir Semester", "deskripsi" => "Menghadapi UAS pertama dengan harapan cepat pulang."],
            ["tanggal" => "Januari 2025", "judul" => "Liburan Semester 1", "deskripsi" => "Menikmati libur di rumah selama hampir dua bulan."],
            ["tanggal" => "Februari 2025", "judul" => "Daftar TOEFL", "deskripsi" => "Mencoba daftar TOEFL for fun."],
            ["tanggal" => "Maret 2025", "judul" => "Semester 2", "deskripsi" => "Membagi waktu antara kelas dan praktikum yang lumayan padat."],
            ["tanggal" => "April 2025", "judul" => "Ujian Tengah Semester", "deskripsi" => "Menyiapkan ujian dan tidak sabar untuk pulang."],
            ["tanggal" => "Mei 2025", "judul" => "Praktikum.", "deskripsi" => "Menghabiskan sebagian besar waktu mengerjakan praktikum."],
        ];

        foreach ($timeline as $entry) {
            echo '<div class="entry">';
            echo '<h3>' . $entry['tanggal'] . ' - ' . $entry['judul'] . '</h3>';
            echo '<p>' . $entry['deskripsi'] . '</p>';
            echo '</div>';
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
