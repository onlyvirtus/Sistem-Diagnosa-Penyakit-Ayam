<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dokter Hewan</title>
    <link rel="stylesheet" href="sty.css">

</head>
<body>
<nav class="navbar">
        <div class="container1">
            
        <a href="../../0Interface/index.php" onclick="index()">
        <img src="../../00image/logo2.png" alt="LOGO" id="logo"></a>
        <a href="../../0Interface/index.php" onclick="index()" id="ayamsehat">AYAM SEHAT</a>
            
            <ul class="menu">
            </ul>

        </div>
    </nav>
    <div class="container0"></div>

    
    <div class="form">
        <div class="textlogin">
        <p>SILAHKAN LOGIN</p>
        </div>
        
        <div class="isiform" id="signIn">
                    <form method="post" action="register.php" id="isi">
                    <table>
                        <tr>
                            <td><strong>Email</strong><input type="email" name="email" id="email" placeholder="Masukkan Email" maxlength="50" required>
                        </tr>
                        <tr>
                            <td><br><strong>Password</strong><input type="password" name="password" id="password" placeholder="Masukkan Password" maxlength="50" required>
                        </tr>
                        
                    </table>

                    
                    <div class="tombol">
                        <input type="button" id="buttonhome" value="Kembali" onclick="location.href='../../0Interface/index.php'">
                        <input type="submit" class="btn" value="Sign In" name="signIn">
                    </div>
                    
                    </form>
        </div>
    </div>



            

        </div>


</body>
</html>