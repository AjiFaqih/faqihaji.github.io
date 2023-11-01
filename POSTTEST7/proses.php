<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $gambar = "";

    
    if(isset($_FILES['gambar'])) {
        $allowed_extensions = array('jpg', 'jpeg', 'png'); // ekstensi file yang diperbolehkan
        $original_file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $tmp = explode('.', $original_file_name);
        $file_ext = strtolower(end($tmp));
    
        if(in_array($file_ext, $allowed_extensions)){
            // Format penamaan file: yyyy-mm-dd nama-file.ekstensi
            $new_file_name = date('Y-m-d') . ' ' . $original_file_name;
            $gambar = $new_file_name;
            if(!is_dir("gambar")) {
                mkdir("gambar");
            }
            move_uploaded_file($file_tmp, "gambar/" . $gambar);
        } else {
            echo "<script>alert('File tidak sesuai!');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengunggah gambar!');</script>";
        exit;
    }

    $insert_query = "INSERT INTO pelanggan (nama, notelp, email, gambar) VALUES ('$nama', '$notelp', '$email', '$gambar')";

    if ($conn->query($insert_query) === TRUE) {
        echo "<script>alert('Data Berhasil DiTambahkan!');</script>";
    } else {
        echo "<script>alert('Data Gagal DiTambahkan!');</script>";
    }

    $conn->close();
}

