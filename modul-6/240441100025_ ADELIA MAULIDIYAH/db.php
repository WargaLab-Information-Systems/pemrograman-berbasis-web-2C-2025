 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'absensi_karyawan';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Error Koneksi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #ffe6f0;
            }
            .card {
                background-color: #fff0f5;
                box-shadow: 0 0 10px #ffb6c1;
            }
        </style>
    </head>
    <body>
    <div class="container d-flex vh-100">
        <div class="row align-self-center w-100 justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 text-center">
                    <h2 class="text-danger">Koneksi Gagal</h2>
                    <p class="text-dark">Terjadi kesalahan saat menyambungkan ke database:</p>
                    <p class="text-muted"><strong><?= htmlspecialchars($conn->connect_error) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}
?>
