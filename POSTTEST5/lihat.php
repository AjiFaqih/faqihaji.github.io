<?php
require 'koneksi.php';

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM pelanggan WHERE id = $id";
    $conn->query($delete_query);
}

$query = "SELECT * FROM pelanggan";
$result = $conn->query($query);
$pelanggan_data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pelanggan_data[] = $row;
    }
}

$conn->close();
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
            <li><a href="index.php">Home</a></li>
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
                <th>UBAH</th>
                <th>HAPUS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pelanggan_data as $data): ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['notelp']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><a href="update.php?id=<?php echo $data['id']; ?>">Update</a></td>
                <td><a href="lihat.php?action=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('APAKAH YAKIN MENGHAPUS DATA TERSEBUT?')">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
