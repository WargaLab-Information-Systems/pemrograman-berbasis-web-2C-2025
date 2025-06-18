<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $ttl = $_POST['ttl'];
        $email = $_POST['email'];
        $pemrograman = $_POST['pemrograman'];
        $pengalaman = $_POST['pengalaman'];
        $software = isset($_POST['software']) ? $_POST['software'] : [];
        $penguasaan = isset($_POST['penguasaan']) ? $_POST['penguasaan'] : null;
        $os = isset($_POST['os']) ? $_POST['os'] : null;

        $pemrogramanArray = array_map('trim', explode(",", $pemrograman));
        if (count($pemrogramanArray) > 2) {
            $berpengalaman = "<p class='text-danger'><strong>Anda sudah cukup berpengalaman dalam pemrograman!</strong></p>";
        } else {
            $berpengalaman = "";
        }

        function tampilkanBaris($label, $isi) {
            echo "<tr><td>$label</td><td>$isi</td></tr>";
        }
    }
    ?>

    <nav class="navbar navbar-expand-lg bg-primary px-3 mb-3">
        <div class="container-fluid">
            <h4 class="navbar-brand text-white">Profile Mahasiswa</h4>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item"><a class="nav-link text-white" href="index2.php">Pengalaman Kuliah</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="index2.php">Blog</a></li>
            </ul>
        </div>
    </nav>
    <main class="my-4">
        <div class="container" style="max-width: 800px;">
            <div class="card bg-white border rounded shadow mb-4 p-4">
                <h5><i class="bi bi-person"></i> Informasi Mahasiswa</h5><hr>
                <table class="table table-bordered">
                    <?php
                    tampilkanBaris("Name", $nama);
                    tampilkanBaris("NIM", $nim);
                    tampilkanBaris("Tempat, Tanggal Lahir", $ttl);
                    tampilkanBaris("Email", $email);
                    ?>
                </table>
            </div>
            
            <div class="card bg-white border rounded shadow mb-4 p-4">
                <h5><i class="bi bi-code-slash"></i> Keahlian Dasar</h5><hr>
                <p><strong>Bahasa Pemrograman : </strong><?php echo $pemrograman; ?></p>
                <p><strong>Tingkat Penguasaan PHP : </strong><?php echo $penguasaan; ?></p>
                <p><strong>Pengalaman</strong><br><?php echo $pengalaman; ?></p>
                <?php echo $berpengalaman ?>
            </div>
    
            <div class="card bg-white border rounded shadow mb-4 p-4">
                <h5><i class="bi bi-tools"></i> Tools yang Digunakan</h5><hr>
                <p><strong>Software : </strong><?php echo implode(", ", $software); ?></p>
                <p><strong>Operation System : </strong><?php echo $os; ?></p>
            </div>
        </div>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>