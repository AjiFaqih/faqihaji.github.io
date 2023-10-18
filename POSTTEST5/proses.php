<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];

    $insert_query = "INSERT INTO pelanggan (nama, notelp, email) VALUES ('$nama', '$notelp', '$email')";

    if ($conn->query($insert_query) === TRUE) {
        echo "
        <script>
            alert('Data Berhasil DiTambahkan!');
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal DiTambahkan!');   
        </script>";
    }

    $conn->close();
}
?>
