<?php
include 'koneksi.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyakit</title>
    <link rel="stylesheet" href="2.css">

    
</head>
<body>
<nav class="navbar">
        <div class="container1">
            
        <a href="../homepage/peternak.php" onclick="index()">
        <img src="../../00image/logo2.png" alt="LOGO" id="logo"></a>
        <a href="../homepage/peternak.php" onclick="index()" id="ayamsehat">AYAM SEHAT</a>
            
            <ul class="menu">
                <li><a href="../homepage/peternak.php">Home</a></li>
                <li><a href="../diagnosis/diagnosis.php">Diagnosis</a></li>
                <li><a href="#">Penyakit</a></li>
                <li><a href="../../0interface/index.php">Logout</a></li>
            </ul>

        </div>
    </nav>

    <main>
<div class="container0"></div>
<div class='judul'>
            <p id="judul">DAFTAR PENYAKIT</p>

        </div>
    <div class="container2">
        
        <div class="listpenyakit">
            <?php
            $sql = "SELECT * FROM p_ayambroiler";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='penyakit-item'>";
                    echo "  <div class='isipenyakit'>";
                    echo "      <img src='../../dokter/penyakit/uploads/" . $row['gambar'] . "' alt='Gambar Penyakit'>";
                    echo "  </div>";
                    echo "  <h2 id='judulpenyakit'>" . $row['namapenyakit'] . "</h2>";
                    echo "  <h2 id='namailmiah'>" . $row['namailmiah'] . "</h2>";
                    echo "  <div class='gejala-solusi'>";
                    echo "  <h3><strong>Keterangan</strong></h3>";
                    echo "      <p>" . $row['keterangan'] . "</p>";
                    echo "  <h3><strong>Gejala</strong></h3>";
                    echo "      <p>" . $row['gejala'] . "</p>";
                    echo "  <h3><strong>Solusi</strong></h3>";
                    echo "      <p>" . $row['solusi'] . "</p>";
                    echo "  </div>";
                    echo "</div>";
                }
            } else {
                echo "Tidak ada data ditemukan.";
            }

            $conn->close();
            ?>
        </div>

    </div>
    </main>
    

   


    
    <script src="script.js"></script> 
</body>
</html>



