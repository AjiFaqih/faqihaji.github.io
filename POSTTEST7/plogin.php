<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'koneksi.php';
    // Ambil data dari formulir login
    $username = $_POST["username"];
    $password = $_POST["password"];

    

    $query = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $role = $row["role"];

        session_start();
        $_SESSION["role"] = $role;

        if ($role == "admin") {
            header("Location: dashboard.php"); 
        } else {
            header("Location: index.php"); 
        }
        exit();
    } else {
        echo "Login gagal. Silakan coba lagi.";
        
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>
