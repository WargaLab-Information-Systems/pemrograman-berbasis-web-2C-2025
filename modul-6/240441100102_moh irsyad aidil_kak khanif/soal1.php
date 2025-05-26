<?php
session_start();

// Koneksi database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_karyawan';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

// Routing halaman
$page = $_GET['page'] ?? 'login';

// Proses logout
if ($page === 'logout') {
    session_destroy();
    header('Location: ?page=login');
    exit;
}

// Proses registrasi
if ($page === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header("Location: ?page=login");
    exit;
}

// Proses login
if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: ?page=dashboard");
            exit;
        }
    }
    $error = "Login gagal! Username atau password salah.";
}

// Proses tambah data karyawan
if ($page === 'tambah' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip = $conn->real_escape_string($_POST['nip']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = (int)$_POST['umur'];
    $jk = $conn->real_escape_string($_POST['jenis_kelamin']);
    $dept = $conn->real_escape_string($_POST['departemen']);
    $jab = $conn->real_escape_string($_POST['jabatan']);
    $kota = $conn->real_escape_string($_POST['kota_asal']);
    $tgl = $conn->real_escape_string($_POST['tanggal']);
    $masuk = $conn->real_escape_string($_POST['jam_masuk']);
    $pulang = $conn->real_escape_string($_POST['jam_pulang']);
    $query = "INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal, jam_masuk, jam_pulang) 
              VALUES ('$nip', '$nama', $umur, '$jk', '$dept', '$jab', '$kota', '$tgl', '$masuk', '$pulang')";
    if ($conn->query($query)) {
        header('Location: ?page=dashboard');
        exit;
    } else {
        $error = "Gagal menyimpan data!";
    }
}

// Proses hapus
if ($page === 'hapus' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM karyawan_absensi WHERE id = $id");
    header('Location: ?page=dashboard');
    exit;
}

// Proses edit
if ($page === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $nip = $conn->real_escape_string($_POST['nip']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = (int)$_POST['umur'];
    $jk = $conn->real_escape_string($_POST['jenis_kelamin']);
    $dept = $conn->real_escape_string($_POST['departemen']);
    $jab = $conn->real_escape_string($_POST['jabatan']);
    $kota = $conn->real_escape_string($_POST['kota_asal']);
    $tgl = $conn->real_escape_string($_POST['tanggal']);
    $masuk = $conn->real_escape_string($_POST['jam_masuk']);
    $pulang = $conn->real_escape_string($_POST['jam_pulang']);
    $query = "UPDATE karyawan_absensi SET nip='$nip', nama='$nama', umur=$umur, jenis_kelamin='$jk', departemen='$dept',
              jabatan='$jab', kota_asal='$kota', tanggal='$tgl', jam_masuk='$masuk', jam_pulang='$pulang' WHERE id=$id";
    $conn->query($query);
    header('Location: ?page=dashboard');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Manajemen Karyawan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
  body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    color: #fff;
  }
  .container {
    background: rgba(0, 0, 0, 0.7);
    border-radius: 15px;
    padding: 30px;
    margin-top: 40px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
  }
  h2 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
    letter-spacing: 1px;
  }
  table {
    background-color: #222;
  }
  thead.table-dark th {
    background-color: #444 !important;
  }
  .form-control, .form-select {
    background: #222;
    border: none;
    color: #eee;
  }
  .form-control:focus, .form-select:focus {
    background: #333;
    color: #fff;
    box-shadow: 0 0 8px #764ba2;
    border: none;
  }
  .btn-primary {
    background: #764ba2;
    border: none;
  }
  .btn-primary:hover {
    background: #8e65c7;
  }
  .btn-secondary {
    background: #444;
    border: none;
    color: #ccc;
  }
  .btn-secondary:hover {
    background: #666;
    color: #fff;
  }
  .btn-success {
    background: #28a745;
    border: none;
  }
  .btn-success:hover {
    background: #45c364;
  }
  .btn-danger {
    background: #dc3545;
    border: none;
  }
  .btn-danger:hover {
    background: #e85a6f;
  }
  .btn-warning {
    background: #ffc107;
    border: none;
    color: #212529;
  }
  .btn-warning:hover {
    background: #ffcd39;
    color: #212529;
  }
  a.btn-link {
    color: #8e65c7;
  }
  a.btn-link:hover {
    color: #b196e3;
  }
  .alert-danger {
    background-color: #d9534f;
    border: none;
    color: white;
  }
  .alert-warning {
    background-color: #f0ad4e;
    border: none;
    color: #212529;
  }
</style>
</head>
<body>
<div class="container">

<?php if ($page === 'login'): ?>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST" autocomplete="off">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required autofocus />
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <button class="btn btn-primary w-100">Login</button>
        <div class="text-center mt-3">
            <a href="?page=register" class="btn btn-link">Belum punya akun? Daftar</a>
        </div>
    </form>

<?php elseif ($page === 'register'): ?>
    <h2>Registrasi</h2>
    <form method="POST" autocomplete="off">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required autofocus />
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <button class="btn btn-primary w-100">Daftar</button>
        <div class="text-center mt-3">
            <a href="?page=login" class="btn btn-link">Sudah punya akun? Login</a>
        </div>
    </form>

<?php elseif ($page === 'dashboard' && isset($_SESSION['user'])): 
    $result = $conn->query("SELECT * FROM karyawan_absensi ORDER BY tanggal DESC");
?>
    <h2>Data Karyawan & Absensi</h2>
    <div class="d-flex justify-content-between mb-3">
      <a href="?page=tambah" class="btn btn-success">Tambah Data</a>
      <div>
        <span class="me-3">Halo, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong></span>
        <a href="?page=logout" class="btn btn-danger">Logout</a>
      </div>
    </div>
    <div class="table-responsive" style="max-height: 500px; overflow-y:auto;">
    <table class="table table-bordered table-hover text-white align-middle">
        <thead class="table-dark sticky-top">
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>JK</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Pulang</th>
                <th style="min-width:120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows == 0): ?>
                <tr><td colspan="11" class="text-center">Tidak ada data</td></tr>
            <?php endif; ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nip']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['umur']) ?></td>
                <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                <td><?= htmlspecialchars($row['departemen']) ?></td>
                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                <td><?= htmlspecialchars($row['kota_asal']) ?></td>
                <td><?= htmlspecialchars($row['tanggal']) ?></td>
                <td><?= htmlspecialchars($row['jam_masuk']) ?></td>
                <td><?= htmlspecialchars($row['jam_pulang']) ?></td>
                <td>
                    <a href="?page=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-1" title="Edit Data">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
                            viewBox="0 0 16 16">
                          <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708L4.207 14.793 1 15l.207-3.207L12.146.854zM11.207 2.5 13.5 4.793 14.5 3.793 12.207 1.5 11.207 2.5z"/>
                        </svg>
                    </a>
                    <a href="?page=hapus&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')" title="Hapus Data">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                            viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1 0-2h3.5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1H14a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118z"/>
                        </svg>
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>

<?php elseif ($page === 'tambah' && isset($_SESSION['user'])): ?>
    <h2>Tambah Data Karyawan</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST" autocomplete="off" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">NIP</label>
            <input name="nip" class="form-control" required />
            <div class="invalid-feedback">NIP wajib diisi.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Nama</label>
            <input name="nama" class="form-control" required />
            <div class="invalid-feedback">Nama wajib diisi.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label class="form-label">Umur</label>
            <input type="number" min="18" max="100" name="umur" class="form-control" required />
            <div class="invalid-feedback">Umur wajib diisi dan antara 18-100.</div>
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">Pilih...</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <div class="invalid-feedback">Pilih jenis kelamin.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Departemen</label>
            <input name="departemen" class="form-control" required />
            <div class="invalid-feedback">Departemen wajib diisi.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Jabatan</label>
            <input name="jabatan" class="form-control" required />
            <div class="invalid-feedback">Jabatan wajib diisi.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Kota Asal</label>
            <input name="kota_asal" class="form-control" required />
            <div class="invalid-feedback">Kota asal wajib diisi.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required />
            <div class="invalid-feedback">Tanggal wajib diisi.</div>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" required />
            <div class="invalid-feedback">Jam masuk wajib diisi.</div>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Jam Pulang</label>
            <input type="time" name="jam_pulang" class="form-control" required />
            <div class="invalid-feedback">Jam pulang wajib diisi.</div>
          </div>
        </div>
        <button class="btn btn-success w-100" type="submit">Simpan Data</button>
        <a href="?page=dashboard" class="btn btn-secondary w-100 mt-2">Batal</a>
    </form>

<?php elseif ($page === 'edit' && isset($_SESSION['user']) && isset($_GET['id'])): 
    $id = (int)$_GET['id'];
    $row = $conn->query("SELECT * FROM karyawan_absensi WHERE id=$id")->fetch_assoc();
    if (!$row) {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
        echo '<a href="?page=dashboard" class="btn btn-secondary">Kembali</a>';
        exit;
    }
?>
    <h2>Edit Data Karyawan</h2>
    <form method="POST" autocomplete="off" class="needs-validation" novalidate>
        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">NIP</label>
            <input name="nip" class="form-control" required value="<?= htmlspecialchars($row['nip']) ?>" />
            <div class="invalid-feedback">NIP wajib diisi.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Nama</label>
            <input name="nama" class="form-control" required value="<?= htmlspecialchars($row['nama']) ?>" />
            <div class="invalid-feedback">Nama wajib diisi.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label class="form-label">Umur</label>
            <input type="number" min="18" max="100" name="umur" class="form-control" required value="<?= (int)$row['umur'] ?>" />
            <div class="invalid-feedback">Umur wajib diisi dan antara 18-100.</div>
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">Pilih...</option>
                <option value="Laki-laki" <?= $row['jenis_kelamin']=='Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $row['jenis_kelamin']=='Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <div class="invalid-feedback">Pilih jenis kelamin.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Departemen</label>
            <input name="departemen" class="form-control" required value="<?= htmlspecialchars($row['departemen']) ?>" />
            <div class="invalid-feedback">Departemen wajib diisi.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Jabatan</label>
            <input name="jabatan" class="form-control" required value="<?= htmlspecialchars($row['jabatan']) ?>" />
            <div class="invalid-feedback">Jabatan wajib diisi.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Kota Asal</label>
            <input name="kota_asal" class="form-control" required value="<?= htmlspecialchars($row['kota_asal']) ?>" />
            <div class="invalid-feedback">Kota asal wajib diisi.</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="<?= $row['tanggal'] ?>" />
            <div class="invalid-feedback">Tanggal wajib diisi.</div>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" required value="<?= $row['jam_masuk'] ?>" />
            <div class="invalid-feedback">Jam masuk wajib diisi.</div>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Jam Pulang</label>
            <input type="time" name="jam_pulang" class="form-control" required value="<?= $row['jam_pulang'] ?>" />
            <div class="invalid-feedback">Jam pulang wajib diisi.</div>
          </div>
        </div>
        <button class="btn btn-warning w-100" type="submit">Update Data</button>
        <a href="?page=dashboard" class="btn btn-secondary w-100 mt-2">Batal</a>
    </form>

<?php else: ?>
    <div class="alert alert-warning text-center">
      Kamu harus login terlebih dahulu.<br>
      <a href="?page=login" class="btn btn-primary mt-3">Login</a>
    </div>
<?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Bootstrap form validation
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', e => {
      if (!form.checkValidity()) {
        e.preventDefault()
        e.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})();
</script>

</body>
</html>
