<?php
require 'koneksi.php';
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}



if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $select_query = "SELECT gambar FROM pelanggan WHERE id = $id";
    $result = $conn->query($select_query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = "gambar/" . $row['gambar'];
        
        if (file_exists($filename)) {
            unlink($filename);
        }
    }

    $delete_query = "DELETE FROM pelanggan WHERE id = $id";
    $conn->query($delete_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="lihatcss.css">
   
</head>
<body>

<nav>
    <img src="logo.jpeg" alt="Logo" width="100px" >
        
        <ul class="menu">
            <p>
                <?php
                date_default_timezone_set("Asia/Makassar");
                echo date("l, d F Y") . ", Zona Waktu: " . date("e");
                ?>
            </p>
            <li><a href="index.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h1>Data Pelanggan</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Gambar</th>
                <th>UBAH</th>
                <th>HAPUS</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $query = "SELECT * FROM pelanggan";
        $result = $conn->query($query);
        $pelanggan_data = [];
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pelanggan_data[] = $row;
            }
        }
        
        foreach($pelanggan_data as $data): ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['notelp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><img src="gambar/<?php echo $data['gambar']; ?>" alt="Gambar Pelanggan" width="100"></td>
            <td><a href="update.php?id=<?php echo $data['id']; ?>">Update</a></td>
            <td><a href="dashboard.php?action=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('APAKAH YAKIN MENGHAPUS DATA TERSEBUT?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>


</body>
</html>
