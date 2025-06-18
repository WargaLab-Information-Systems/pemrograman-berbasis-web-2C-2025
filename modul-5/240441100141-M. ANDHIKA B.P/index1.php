<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Profil Mahasiswa</title>
    <style>
        .custom-font {
            font-size: smaller;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-primary px-3 mb-3">
        <div class="container-fluid">
            <h4 class="navbar-brand text-white">Profile Mahasiswa</h4>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item"><a class="nav-link text-white" href="index2.php">Pengalaman Kuliah</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="index3.php">Blog</a></li>
            </ul>
        </div>
    </nav>

    <?php
    $errors = [];
    $values = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function validasi($field, $errorMessage) {
            global $errors, $values;
            if (empty($_POST[$field])) {
                $errors[$field] = $errorMessage;
            } else {
                $values[$field] = $_POST[$field];
            }
        }

        validasi("nama", "Nama wajib diisi!");
        validasi("nim", "NIM wajib diisi!");
        validasi("ttl", "Tempat, Tanggal Lahir wajib diisi!");
        validasi("email", "Email wajib diisi!");
        validasi("pemrograman", "Bahasa Pemrograman wajib diisi!");
        validasi("pengalaman", "Pengalaman proyek wajib diisi!");

        if (!isset($_POST['software'])) {
            $errors["software"] = "Pilih minimal satu software!";
        } else {
            $values["software"] = $_POST['software'];
        }

        if (!isset($_POST["os"])) {
            $errors["os"] = "Pilih salah satu sistem operasi!";
        } else {
            $values["os"] = $_POST["os"];
        }

        if (empty($_POST["penguasaan"])) {
            $errors["penguasaan"] = "Pilih salah satu tingkat penguasaan!";
        } else {
            $values["penguasaan"] = $_POST["penguasaan"];
        }

        if (empty($errors)) {
            echo "<div class='alert alert-success'>Form berhasil dikirim!</div>";
        }
    }
    ?>

    <div class="container bg-white border rounded shadow my-3 w-50 p-3">
        <form method="POST" action="halaman1.php" id="form" class="mt-1">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $values["nama"] ?? ""; ?>">
            <p class="text-danger"><?php echo $errors["nama"] ?? ""; ?></p>

            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="<?php echo $values["nim"] ?? ""; ?>">
            <p class="text-danger"><?php echo $errors["nim"] ?? ""; ?></p>

            <label class="form-label">Tempat, Tanggal Lahir</label>
            <input type="text" name="ttl" class="form-control" value="<?php echo $values["ttl"] ?? ""; ?>">
            <p class="text-danger"><?php echo $errors["ttl"] ?? ""; ?></p>

            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $values["email"] ?? ""; ?>">
            <p class="text-danger"><?php echo $errors["email"] ?? ""; ?></p>

            <label class="form-label mt-3">Bahasa Pemrograman</label>
            <input type="text" name="pemrograman" class="form-control" value="<?php echo $values["pemrograman"] ?? ""; ?>">
            <p class="text-danger"><?php echo $errors["pemrograman"] ?? ""; ?></p>

            <label class="form-label">Pengalaman Proyek</label>
            <textarea name="pengalaman" class="form-control"><?php echo $values["pengalaman"] ?? ""; ?></textarea>
            <p class="text-danger"><?php echo $errors["pengalaman"] ?? ""; ?></p>

            <label class="form-label">Software</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="software[]" value="vscode" <?php echo isset($values["software"]) && in_array("vscode", $values["software"]) ? "checked" : ""; ?>>
                <label class="form-check-label">Visual Studio Code</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="software[]" value="xampp" <?php echo isset($values["software"]) && in_array("xampp", $values["software"]) ? "checked" : ""; ?>>
                <label class="form-check-label">XAMPP</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="software[]" value="git" <?php echo isset($values["software"]) && in_array("git", $values["software"]) ? "checked" : ""; ?>>
                <label class="form-check-label">Git</label>
            </div>
            <p class="text-danger"><?php echo $errors["software"] ?? ""; ?></p>

            <label class="form-label">Sistem Operasi</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="os" value="windows" <?php echo isset($values["os"]) && $values["os"] === "windows" ? "checked" : ""; ?>>
                <label class="form-check-label">Windows</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="os" value="linux" <?php echo isset($values["os"]) && $values["os"] === "linux" ? "checked" : ""; ?>>
                <label class="form-check-label">Linux</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="os" value="mac" <?php echo isset($values["os"]) && $values["os"] === "mac" ? "checked" : ""; ?>>
                <label class="form-check-label">Mac</label>
            </div>
            <p class="text-danger"><?php echo $errors["os"] ?? ""; ?></p>

            <label class="form-label">Tingkat Penguasaan PHP</label>
            <select class="form-select" name="penguasaan">
                <option selected disabled value="">Pilih</option>
                <option value="pemula" <?php echo isset($values["penguasaan"]) && $values["penguasaan"] === "pemula" ? "selected" : ""; ?>>Pemula</option>
                <option value="menengah" <?php echo isset($values["penguasaan"]) && $values["penguasaan"] === "menengah" ? "selected" : ""; ?>>Menengah</option>
                <option value="mahir" <?php echo isset($values["penguasaan"]) && $values["penguasaan"] === "mahir" ? "selected" : ""; ?>>Mahir</option>
            </select>
            <p class="text-danger"><?php echo $errors["penguasaan"] ?? ""; ?></p>

            <button type="submit" class="btn btn-primary mt-4 d-block mx-auto">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
