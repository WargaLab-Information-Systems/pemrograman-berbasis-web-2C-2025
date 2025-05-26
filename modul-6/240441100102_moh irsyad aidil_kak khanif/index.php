
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_mahasiswa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];

    $sql = "INSERT INTO mahasiswa (nim, nama) VALUES ('$nim', '$nama')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
  <h3 class="mb-4">Data Mahasiswa</h3>

  <!-- Tombol Tambah Mahasiswa -->
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
    Tambah Mahasiswa
  </button>

  <!-- Tabel Mahasiswa -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$no}</td>
                  <td>{$row['nim']}</td>
                  <td>{$row['nama']}</td>
                  <td>
                    <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                  </td>
                </tr>";
            $no++;
    }
    ?>
    </tbody>
  </table>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="nim" class="form-control mb-2" placeholder="NIM" required>
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>