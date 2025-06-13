<?php
session_start();
require '../config/db.php';

$today = date('Y-m-d');
$query_jadwal = $conn->prepare("SELECT * FROM jadwal WHERE tanggal >= ? ORDER BY tanggal ASC");
$query_jadwal->bind_param("s", $today);
$query_jadwal->execute();
$result_jadwal = $query_jadwal->get_result();

$whereClauses = []; $params = []; $paramTypes = "";
if (!empty($_GET['search'])) {
    $whereClauses[] = "nama LIKE ?";
    $params[] = "%" . $_GET['search'] . "%";
    $paramTypes .= "s";
}
if (!empty($_GET['filter_gol'])) {
    $whereClauses[] = "gol_darah = ? AND status = 'Lolos'";
    $params[] = $_GET['filter_gol'];
    $paramTypes .= "s";
}
$whereSQL = $whereClauses ? "WHERE " . implode(" AND ", $whereClauses) : "";
$stmt = $conn->prepare("SELECT * FROM pendaftaran $whereSQL ORDER BY id DESC");
if ($params) $stmt->bind_param($paramTypes, ...$params);
$stmt->execute();
$result_pendaftaran = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Pendaftaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style> body{background:#f0ede0;} </style>
</head>
<body class="flex">
<aside class="fixed w-64 bg-[#918e80] h-screen p-5 text-white">
  <!-- menu sama seperti sebelumnya -->
</aside>

<main class="ml-64 flex-1 p-5">
  <h1 class="text-3xl font-bold text-[#970c10] mb-6">Tambah Pendaftaran</h1>
  <form method="POST" action="simpan.php" class="bg-white p-6 rounded shadow mb-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- Nama, NIK, Usia, Berat Badan -->
      <div>
        <label class="block font-medium">Nama</label>
        <input name="nama" required class="border p-2 rounded w-full">
      </div>
      <div>
        <label class="block font-medium">NIK (16 digit)</label>
        <input name="nik" maxlength="16" required class="border p-2 rounded w-full">
      </div>
      <div>
        <label class="block font-medium">Usia</label>
        <input type="number" name="usia" required class="border p-2 rounded w-full">
      </div>
      <div>
        <label class="block font-medium">Berat Badan (kg)</label>
        <input type="number" name="berat_badan" step="0.1" required class="border p-2 rounded w-full">
      </div>

      <!-- Gol. Darah -->
      <div>
        <label class="block font-medium">Golongan Darah</label>
        <select name="gol_darah" required class="border p-2 rounded w-full">
          <option value="">Pilih Golongan</option><option>A</option><option>B</option><option>AB</option><option>O</option>
        </select>
      </div>

      <!-- Rhesus (radio) -->
      <div>
        <span class="block font-medium">Rhesus</span>
        <label><input type="radio" name="rhesus" value="+" required> +</label>
        <label class="ml-4"><input type="radio" name="rhesus" value="-" required> -</label>
      </div>

      <!-- Sudah Sarapan (radio) -->
      <div>
        <span class="block font-medium">Sudah Sarapan?</span>
        <label><input type="radio" name="sudah_sarapan" value="Ya" required> Ya</label>
        <label class="ml-4"><input type="radio" name="sudah_sarapan" value="Tidak" required> Tidak</label>
      </div>

      <!-- Haid/Hamil/Menyusui -->
      <div>
        <label class="block font-medium">Haid/Hamil/Menyusui?</label>
        <select name="haid_hamil_menyusui" required class="border p-2 rounded w-full">
          <option value="">Pilih...</option><option>Tidak</option><option>Haid</option><option>Hamil</option><option>Menyusui</option>
        </select>
      </div>

      <!-- Riwayat Penyakit -->
      <div>
        <label class="block font-medium">Riwayat Penyakit</label>
        <input name="penyakit" class="border p-2 rounded w-full">
      </div>

      <!-- Konsumsi Alkohol (radio) -->
      <div>
        <span class="block font-medium">Konsumsi Alkohol?</span>
        <label><input type="radio" name="konsumsi_alkohol" value="Tidak Pernah" required> Tidak Pernah</label>
        <label class="ml-4"><input type="radio" name="konsumsi_alkohol" value="Pernah" required> Pernah</label>
      </div>

      <!-- Terakhir Donor -->
      <div>
        <label class="block font-medium">Terakhir Donor</label>
        <select name="terakhir_donor" required class="border p-2 rounded w-full">
          <option value="">Pilih...</option><option>Pertama kali</option><option>< 2 bulan</option><option>> 2 bulan</option>
        </select>
      </div>

      <!-- Jenis Identitas -->
      <div>
        <label class="block font-medium">Jenis Identitas</label>
        <select name="jenis_identitas" required class="border p-2 rounded w-full">
          <option value="">Pilih...</option><option>KTP</option><option>SIM</option><option>Kartu Pelajar</option><option>KTM</option>
        </select>
      </div>

      <!-- Pilih Jadwal -->
      <div>
        <label class="block font-medium">Pilih Jadwal</label>
        <select name="jadwal_id" required class="border p-2 rounded w-full">
          <option value="">Pilih Jadwal</option>
          <?php while ($jadwal = $result_jadwal->fetch_assoc()): ?>
            <?php $label = $jadwal['tanggal']==$today?'(Hari Ini)':''; ?>
            <option value="<?= $jadwal['id'] ?>"><?= "{$jadwal['tanggal']} - {$jadwal['lokasi']} $label" ?></option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>
    <div class="mt-6"><button class="bg-[#970c10] text-white px-6 py-2 rounded">Simpan</button></div>
  </form>

  <h2 class="text-2xl font-bold text-[#970c10] mb-4">Data Pendaftar</h2>
  <form method="GET" class="mb-4 flex gap-4">
    <input type="text" name="search" placeholder="Cari Nama" value="<?= $_GET['search']??'' ?>"
      class="border p-2 rounded">
    <select name="filter_gol" class="border p-2 rounded">
      <option value="">Filter Golongan</option><option>A</option><option>B</option><option>AB</option><option>O</option>
    </select>
    <button class="bg-[#970c10] text-white px-4 py-2 rounded">Cari</button>
  </form>

  <div class="overflow-x-auto">
    <table id="tbl" class="min-w-full bg-white border cursor-pointer">
      <thead class="bg-[#970c10] text-white"><tr>
        <th class="px-4 py-2 border">Nama</th><th class="px-4 py-2 border">Gol</th>
        <th class="px-4 py-2 border">Rhesus</th><th class="px-4 py-2 border">Status</th><th class="px-4 py-2 border">Aksi</th>
      </tr></thead>
      <tbody>
      <?php while($row = $result_pendaftaran->fetch_assoc()): ?>
        <tr data-id="<?= $row['id'] ?>">
          <td class="px-4 py-2 border text-center"><?= htmlspecialchars($row['nama']) ?></td>
          <td class="px-4 py-2 border text-center"><?= $row['gol_darah'] ?></td>
          <td class="px-4 py-2 border text-center"><?= $row['rhesus'] ?></td>
          <td class="px-4 py-2 border text-center"><?= $row['status'] ?></td>
          <td class="px-4 py-2 border text-center">
            <a href="update.php?id=<?= $row['id'] ?>" class="bg-blue-500 text-white px-3 py-1 rounded">Update</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="bg-red-600 text-white px-3 py-1 rounded"
               onclick="return confirm('Yakin ingin hapus?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</main>

<!-- Detail modal -->
<div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
  <div class="bg-white w-full max-w-lg p-6 rounded relative">
    <button onclick="toggleModal()" class="absolute top-2 right-2 text-2xl">×</button>
    <div id="detailContent"></div>
  </div>
</div>

<script>
  const rows = document.querySelectorAll('#tbl tbody tr');
  function toggleModal(){
    document.getElementById('detailModal').classList.toggle('hidden');
  }
  rows.forEach(r => r.onclick = () => {
    const id = r.dataset.id;
    fetch(`get_detail.php?id=${id}`)
      .then(res => res.json())
      .then(d => {
        let html = '';
        for(let k in d) {
          html += `<div class="mb-2"><strong>${k}</strong>: ${d[k]}</div>`;
        }
        document.getElementById('detailContent').innerHTML = html;
        toggleModal();
      });
  });
</script>
</body></html>
