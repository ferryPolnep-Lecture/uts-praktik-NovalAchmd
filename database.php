<?php
// Connect to MySQL server
$conn = new mysqli('localhost', 'root', '', '');

// Check connection
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Create the database 'uts5e' if it does not exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS uts5e";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database 'uts5e' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Error membuat database: " . $conn->error);
}

// Select the 'uts5e' database
$conn->select_db('uts5a');

// Create the 'krs' table if it does not exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS krs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nim BIGINT(10) NOT NULL,
    kelas enum('5A', '5B', '5C', '5D', '5E') NOT NULL,
    makul SET('WebApp','MobileApp','UI/UX','SoftEng','DataEng') NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabel 'krs' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Error membuat tabel: " . $conn->error);
}

// Close the connection
$conn->close();
?>
