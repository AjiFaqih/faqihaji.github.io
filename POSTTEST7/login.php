
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="btn-box">
                <div id="btn"></div>
                <button type="button" class="t-btn" onclick="login()">Login &nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="button" class="t-btn" onclick="register()">Daftar</button>
            </div>
            <form method="post" action="plogin.php" id="login" class="input-g">
                <input name="username" type="text" class="input-f" placeholder="Username" required>
                <input name="password" type="password" class="input-f" placeholder="Password" required>
                <br><br>
                <input type="submit" class="s-btn" value="Login"></input>
            </form>
            <form method="post" action="pdaftar.php"  id="register" class="input-g">
                <input type="text" class="input-f" placeholder="Nama Lengkap" required>
                <input name="username" type="text" class="input-f" placeholder="Username" required>
                <input name="password" type="password" class="input-f" placeholder="Password" required>
                <br><br>
                <input type="submit" class="s-btn" value="Daftar"></input>
            </form>
        </div>
    </div>
    <script>
        
        var x = document.getElementById("login")
        var y = document.getElementById("register")
        var z = document.getElementById("btn")

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px"; 
        }
        
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px"; 
        }        
    </script>
</body>
</html>