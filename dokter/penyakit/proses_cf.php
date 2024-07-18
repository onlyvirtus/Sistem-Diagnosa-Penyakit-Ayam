<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cfUser = $_POST['cf_user'];

    $sql = "SELECT * FROM p_ayambroiler";
    $result = $conn->query($sql);
    $gejalaData = $result->fetch_all(MYSQLI_ASSOC);

    $cfCombined = [];

    foreach ($gejalaData as $row) {
        $idpenyakit = $row['idpenyakit'];
        $cfPakar = $row['cf']; 

        $cfParallel = calculateCFParallel($cfUser[$idpenyakit], $cfPakar);
        $cfCombined[$idpenyakit] = isset($cfCombined[$idpenyakit]) 
            ? calculateCFCombination($cfCombined[$idpenyakit], $cfParallel)
            : $cfParallel;
    }

}
?>