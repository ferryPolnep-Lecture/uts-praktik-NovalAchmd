<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>

    <?php
    // Check if 'id' is present in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'uts5a');

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Fetch the student data based on the ID
        $sql = "SELECT * FROM krs WHERE id = $id";
        $result = $conn->query($sql);

        // Check if the record exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $selectedMakul = explode(',', $row['makul']); // Convert 'makul' field to an array
        } else {
            echo "Data tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID tidak ditemukan.";
        exit;
    }
    ?>

    <!-- Form to edit student data -->
    <form action="update.php" method="post">
        <!-- Hidden field to pass the student ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        Nama: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        NIM: <input type="text" name="nim" value="<?php echo $row['nim']; ?>"><br>
        Kelas: <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>"><br>
        Mata Kuliah: <br>
        <input type="checkbox" name="makul[]" value="WebApp" <?php echo in_array('WebApp', $selectedMakul) ? 'checked' : ''; ?>> Web Application Development<br>
        <input type="checkbox" name="makul[]" value="MobileApp" <?php echo in_array('MobileApp', $selectedMakul) ? 'checked' : ''; ?>> Mobile Application Development<br>
        <input type="checkbox" name="makul[]" value="UI/UX" <?php echo in_array('UI/UX', $selectedMakul) ? 'checked' : ''; ?>> UI/UX Design<br>
        <input type="checkbox" name="makul[]" value="SoftEng" <?php echo in_array('SoftEng', $selectedMakul) ? 'checked' : ''; ?>> Software Engineering<br>
        <input type="checkbox" name="makul[]" value="DataEng" <?php echo in_array('DataEng', $selectedMakul) ? 'checked' : ''; ?>> Data Engineering<br>
        <input type="submit" value="Update Data">
    </form>

</body>
</html>
