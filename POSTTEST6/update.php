<?php
require 'koneksi.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];

    $gambar = $_POST['gambar_lama'];

    if(isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
        $original_file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $tmp = explode('.', $original_file_name);
        $file_ext = strtolower(end($tmp));
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        if(in_array($file_ext, $allowed_extensions)) {
            $new_file_name = date('Y-m-d') . ' ' . $original_file_name;

            // Hapus gambar lama jika ada
            $old_file_path = "gambar/" . $gambar;
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }

            move_uploaded_file($file_tmp, "gambar/" . $new_file_name);
            $gambar = $new_file_name; 
        }
    }

    $update_query = "UPDATE pelanggan SET nama='$nama', notelp='$notelp', email='$email', gambar='$gambar' WHERE id=$id";
    $conn->query($update_query);

    header('Location: dashboard.php');
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM pelanggan WHERE id = $id";
    $result = $conn->query($select_query);
    $data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="lihatcss.css">
    
</head>
<body>
<div class="main">
    <form method="POST" action="update.php" class="custom-form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>"></label><br>
        <label>No Telp: <input type="text" name="notelp" value="<?php echo $data['notelp']; ?>"></label><br>
        <label>Email: <input type="text" name="email" value="<?php echo $data['email']; ?>"></label><br>
        <label>Gambar: <input type="file" name="gambar"></label><br>
        <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</div>

</body>
</html>
