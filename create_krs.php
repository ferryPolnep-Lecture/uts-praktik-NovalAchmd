<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'uts5a');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$name = $_POST['name'];
$nim  = $_POST['nim'];
$kelas = $_POST['kelas'];
$makul = isset($_POST['makul']) ? implode(',', array_map([$conn, 'real_escape_string'], $_POST['makul'])) : ''; // makul ini adalah array karena diambil dari checkbox

// Validasi nama hanya mengandung huruf
if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
    echo "Error: Nama hanya boleh mengandung huruf. Silakan masukkan kembali.<br>";
    ?>
    <html>
    <form action="form_buat_krs.html" method="POST">
        <input type="submit" value="Kembali">
    </form>
    </html>
    <?php
    exit; // Hentikan eksekusi script lebih lanjut
}

// Menyimpan data mahasiswa ke tabel 'krs'
$sql_mahasiswa = "INSERT INTO krs (name, nim, kelas, makul) VALUES ('$name', '$nim', '$kelas', '$makul')";

if ($conn->query($sql_mahasiswa) === TRUE) {
    echo "Data mahasiswa dan mata kuliah berhasil ditambahkan.<br>";
} else {
    echo "Error: " . $sql_mahasiswa . "<br>" . $conn->error;
}
?>
<html>
<form action="form_buat_krs.html" method="POST">
    <input type="submit" value="Kembali">
</form>
</html>
<?php
$conn->close();
?>
