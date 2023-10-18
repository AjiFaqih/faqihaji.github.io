<?php
require 'koneksi.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];

    $update_query = "UPDATE pelanggan SET nama='$nama', notelp='$notelp', email='$email' WHERE id=$id";
    $conn->query($update_query);

    header('Location: lihat.php');
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
    <form method="POST" action="update.php" class="custom-form">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>"></label><br>
        <label>No Telp: <input type="text" name="notelp" value="<?php echo $data['notelp']; ?>"></label><br>
        <label>Email: <input type="text" name="email" value="<?php echo $data['email']; ?>"></label><br>
        <input type="submit" name="submit" value="Update">
    </form>
</div>

</body>
</html>
