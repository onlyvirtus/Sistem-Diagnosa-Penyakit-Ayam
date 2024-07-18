<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['gejala'])) {
        echo "<h2>Error:</h2><p>Anda belum memilih gejala apapun.</p>";
        exit;
    }

    $gejalaTerpilih = $_POST['gejala'];
    $cfUser = $_POST['cf_user'];

    $sql = "SELECT p.idpenyakit, p.namapenyakit,p.namailmiah, p.keterangan, p.gejala, p.solusi, p.gambar, g.idgejala, g.namagejala, g.nilaicf 
            FROM p_ayambroiler p
            JOIN mesin_inferensi g ON p.idpenyakit = g.idpenyakit";
    $result = $conn->query($sql);

    $cfPenyakit = [];
    $penyakitData = [];

    while ($row = $result->fetch_assoc()) {
        $penyakit = $row['namapenyakit'];
        $cfPakar = $row['nilaicf'];

        if (in_array($row['idgejala'], $gejalaTerpilih)) {
            $cfUserGejala = $cfUser[$row['idgejala']];
            $cfParallel = $cfUserGejala * $cfPakar;

            if (isset($cfPenyakit[$penyakit])) {
                $cfPenyakit[$penyakit] = $cfPenyakit[$penyakit] + $cfParallel * (1 - $cfPenyakit[$penyakit]);
            } else {
                $cfPenyakit[$penyakit] = $cfPenyakit[$penyakit] + $cfParallel * (1 - $cfPenyakit[$penyakit]);
                $penyakitData[$penyakit] = $row;
            }
        }
    }

    arsort($cfPenyakit);

    session_start();
    $_SESSION['hasilDiagnosis'] = $cfPenyakit;
    $_SESSION['penyakitData'] = $penyakitData;
    $_SESSION['gejalaTerpilih'] = $gejalaTerpilih;
    $_SESSION['cfUser'] = $cfUser;

    $conn->close();

    header('Location: hasil.php');
    exit;
}
?>
