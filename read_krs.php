<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'uts5a');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari tabel 'krs'
$sql = "SELECT * FROM krs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td><?php echo $row['makul']; ?></td>
            <td>
                <a href="update_krs.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_krs.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <form action="form_buat_krs.html" method="POST">
        <input type="submit" value="kembali">
    </form>
</body>
</html>

<?php
$conn->close();
?>
