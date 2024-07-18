<?php
include 'koneksi.php';
$sql = "SELECT * FROM p_ayambroiler";
$result = $conn->query($sql);
$gejalaData = $result->fetch_all(MYSQLI_ASSOC);

// Fungsi untuk menghitung CF paralel
function calculateCFParallel($cfUser, $cfPakar) {
    return $cfUser * $cfPakar;
}

// Fungsi untuk menghitung CF kombinasi
function calculateCFCombination($cf1, $cf2) {
    return $cf1 + $cf2 * (1 - $cf1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Hewan</title>
    <link rel="stylesheet" href="1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container1">
            <a href="" onclick="index()">
                <img src="../../00image/logo2.png" alt="LOGO" id="logo">
            </a>
            <a href="" onclick="index()" id="ayamsehat">AYAM SEHAT</a>
            <ul class="menu">
                <li><a href="../homepage/homepage.php">Home</a></li>
                <li><a href="../penyakit/penyakit.php">Penyakit</a></li>
                <li><a href="cf.php">Nilai CF</a></li>
                <li><a href="../../0interface/index.php">Logout</a></li>
            </ul>
            <a href="#" id="profile">Profile</a>
        </div>
    </nav>
    <div class="container0"></div>

    <div class="container2">
        <div class='judul'>
            <p id="judul">Certainty Factor</p>
        </div>
        <div class="listpenyakit">
            <?php
            $sql = "SELECT * FROM p_ayambroiler";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "  <div class='gejala-solusi'>";
                    echo "      <p><strong>Gejala:</strong> " . $row['gejala'] . "</p>";
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
</body>
</html>
