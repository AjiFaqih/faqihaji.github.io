<?php
session_start();

if (isset($_SESSION["role"]) && $_SESSION["role"] != "admin") {
    
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
    <title>POSTTEST 5</title>
</head>
<body>

    <!-- POP UP -->
    <div id="popup" class="overlay">
        <div class="window" id="closePopup" >
          <h2>No Hp: 0832-2343-278</h2>
          <h2>Email: yahahaha@gamil.com</h2>
        </div>
    </div>

    <header class="main-header">
        <div class="header-content">
            <h1>WELCOME TO OUR SITE</h1>
            <p>WE ONLY SERVE HIGH QUALITY PRODUCT</p>
            
        </div>
    </header>

    <nav>
        <img src="logo.jpeg" alt="Logo" width="100px" >
        
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#aboutme">About Me</a></li>
            <li><a href="#product">Our Product</a></li>
            <li><a href="#" id="showPopup">Kontak</a></li>
            <li><a href="logout.php">Logout</a></li>
            <button id="toggle-mode">GANTI MODE</button>
        </ul>
    </nav>

    <div class="main">
        <p align="center">KOPULUS adalah toko kopi unik di pusat kota yang menawarkan beragam biji kopi premium dari seluruh dunia dan peralatan kopi berkualitas tinggi.
            <br> Mereka juga menjadi tempat pertemuan komunitas kopi lokal dan tempat belajar bagi pecinta kopi. 
            <br>Dengan suasana yang hangat dan staf yang berpengetahuan, KOPULUS adalah surga bagi para penggemar kopi.</p>
        <hr width="1000px">
        <h3 align="center">OUR PRODUCT</h3>
        <div class="container">
            <div class="box"><img src="mokapot.jpg" alt="" width="100%"><hr><span>Moka Pot <br>Rp. 359.000</span></div>
            <div class="box"><img src="vietnamdrip.jpg" alt="" width="100%"><hr><span>Vietnam Drip<br>Rp. 175.000</span></div>
            <div class="box"><img src="flairpresso.jpg" alt="" width="100%"><hr><span>Flair Presso<br>Rp. 1.465.000</span></div>
            <div class="box"><img src="rokpresso.jpg" alt="" width="100%"><hr><span>Rok Presso<br>Rp. 2.670.000</span></div>
        </div>
    </div>

    <section id="product">
        <div class="container">
            <div class="kiri">
                <img src="mokapot.jpg" alt="" width="100%">
            </div>
            <div class="kanan">
                <h1>MOKA POT</h1>
                <hr>
                <p>-Kapasitas 150ml - 3cup</p>
                <p>-Material alumunium</p>
                <p>-Bisa untuk kompor api atau elektrik</p>
                <p>-Tidak untuk kompor induksi</p>
            </div>
        </div>

        <div class="container">
            <div class="kiri">
                <img src="vietnamdrip.jpg" alt="" width="100%">
            </div>
            <div class="kanan">
                <h1>VIETNAM DRIP</h1>
                <hr>
                <p>-Vietnam drip LC (model sekrup)</p>
                <p>-Material alumunium</p>
                <p>-Kapasitas sekitar 120ml</p>
            </div>
        </div>

        <div class="container">
            <div class="kiri">
                <img src="flairpresso.jpg" alt="" width="100%">
            </div>
            <div class="kanan">
                <h1>FLAIR PRESSO</h1>
                <hr>
                <p>-Material : Stainless steel and die cast aluminum</p>
                <p>-Kapasitas air : 65ml (Cylinder)</p>
                <p>-Dimensi (PxLxT) : 30 x 15 x 25 cm</p>
                <p>-Kapasitas portafilter : 17 - 25 grams</p>
            </div>
        </div>

        <div class="container">
            <div class="kiri">
                <img src="rokpresso.jpg" alt="" width="100%">
            </div>
            <div class="kanan">
                <h1>ROK PRESSO</h1>
                <hr>
                <p>-Material : Polished Aluminium</p>
                <p>-Dimensi (PxLxT) : 26,5 x 20 x 31 cm</p>
                <p>-Kapasitas portafilter : 12 - 21 grams</p>
            </div>
        </div>
    </section>    


    <section id="aboutme">   
        <div class="container">
            <div class="kiri">
                <img src="fotoformal.jpg" alt="" width="100%">
            </div>
            <div class="kanan">
                <h1>ABOUT ME</h1>
                <hr>
                <p>Nama: Muhammad Faqih Ajiputra</p>
                <p>NIM: 2209106114</p>
                <p>Tempat, Tanggal lahir: Samarinda, 09 September 2003</p>
                <p>Jurusan: Informatika</p>
                <p>Angkatan: 2022</p>
                <hr>
            </div>
        </div>
    </section>

    <section id="form">
        <div class="container">
        <form method="POST" class="custom-form" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        
            <label for="notelp">No Telp:</label>
            <input type="text" id="notelp" name="notelp" required>
        
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*"required>

            <input type="submit" value="Submit" class="btn">
        </form>
        </div>

        <div id="success">
        <?php
        include 'proses.php';
        ?>
        <?php if (isset($nama)): ?>
            <p><b>Pesan Terkirim</b>, <?php echo $nama; ?></p>
        <?php endif; ?>

        <?php if (isset($notelp)): ?>
            <p>No Telp Anda: <?php echo $notelp; ?></p>
        <?php endif; ?>

        <?php if (isset($email)): ?>
            <p>Email Anda: <?php echo $email; ?></p>
        <?php endif; ?>
        </div>
    </section>

    <script src="javascript.js"></script>

    <footer>
        <p>2023 Situs Kami. Hak Cipta Dilindungi.<p>
    </footer>
    

</body>
</html>