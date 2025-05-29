<?php 
// Untuk mengenali data
$id_guru = 2; 

// Membuat koneksi ke database
$conn = new mysqli("localhost", "username", "password", "nama_database");

// Memeriksa koneksi
if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
}

// Menyiapkan pernyataan SQL untuk menghapus data pada tabel guru
$sql = "DELETE FROM guru WHERE id='$id_guru'";

// Menjalankan pernyataan SQL
if ($conn->query($sql) === TRUE) { 
    echo "Data guru berhasil dihapus dari database."; 
} else { 
    echo "Error: " . $sql . "<br>" . $conn->error; 
}

// Menutup koneksi
$conn->close(); 
?>
