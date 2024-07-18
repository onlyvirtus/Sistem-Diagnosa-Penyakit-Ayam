<?php
session_start(); // Mulai session (jika belum dimulai)

// Cek jika ada pesan yang diset dalam session
$pesan = isset($_SESSION['pesan']) ? $_SESSION['pesan'] : '';
unset($_SESSION['pesan']); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="container" id="signup">
        <h1 class="form-title">Daftarkan Dokter atau Pakar</h1>
        <form method="post" action="register.php" enctype="multipart/form-data">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
                <label for="gambar">Masukkan Gambar</label><br>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="namadepan" id="namadepan" placeholder="Nama Depan" required>
                <label for="namadepan">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="namabelakang" id="namabelakang" placeholder="Nama Belakang" required>
                <label for="namabelakang">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Daftar" name="signUp">
        </form>

        <script src="script.js"></script>
        <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            var pesan = "<?php echo $pesan; ?>";

            if (pesan === "berhasil_daftar") {
                alert("Berhasil mendaftarkan dokter!");
            }
        });
    </script>
    </div>
</body>
</html>
