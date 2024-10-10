<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'uts5a');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $makul = isset($_POST['makul']) ? implode(',', $_POST['makul']) : ''; // Convert the array to a comma-separated string

    // Update query
    $sql_update = "UPDATE krs SET name='$name', nim='$nim', kelas='$kelas', makul='$makul' WHERE id=$id";

    // Execute the update
    if ($conn->query($sql_update) === TRUE) {
        echo "Data mahasiswa berhasil diupdate.<br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!-- Back button to return to the KRS list -->
<html>
<body>
    <form action="read_krs.php" method="POST">
        <input type="submit" value="Kembali ke Daftar KRS">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
