<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'uts5a');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID mahasiswa yang akan dihapus
$id = $_GET['id'];
$sql = "DELETE FROM krs WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Data mahasiswa berhasil dihapus.";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<a href="read_krs.php">Kembali ke daftar mahasiswa</a>
