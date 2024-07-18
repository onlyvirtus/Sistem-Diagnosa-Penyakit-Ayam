<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['hasilDiagnosis']) && isset($_SESSION['penyakitData']) && isset($_SESSION['gejalaTerpilih']) && isset($_SESSION['cfUser'])) {
    $cfPenyakit = $_SESSION['hasilDiagnosis'];
    $penyakitData = $_SESSION['penyakitData'];
    $gejalaTerpilih = $_SESSION['gejalaTerpilih'];
    $cfUser = $_SESSION['cfUser'];
} else {
    echo "<script>alert('Tidak ada penyakit yang cocok dengan gejala yang Anda pilih.');</script>";
    exit;
}

unset($_SESSION['hasilDiagnosis']);
unset($_SESSION['penyakitData']);
unset($_SESSION['gejalaTerpilih']);
unset($_SESSION['cfUser']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosis Penyakit Ayam</title>
    <link rel="stylesheet" href="4.css">
</head>
<body>
<nav class="navbar">
        <div class="container1">
            
        <a href="../homepage/peternak.php" onclick="index()">
        <img src="../../00image/logo2.png" alt="LOGO" id="logo"></a>
        <a href="../homepage/peternak.php" onclick="index()" id="ayamsehat">AYAM SEHAT</a>
            
            <ul class="menu">
                <li><a href="../homepage/peternak.php">Home</a></li>
                <li><a href="diagnosis.php">Diagnosis</a></li>
                <li><a href="../penyakit/penyakit.php">Penyakit</a></li>
                <li><a href="../../0interface/index.php">Logout</a></li>
            </ul>

        </div>
    </nav>


<main>
    <div class="container0"></div>
    <div class='judul'>
        <p id="judul">HASIL DIAGNOSIS PENYAKIT AYAM</p>
    </div>
    <div class="konten">
        <p id="subjudul">Hasil diagnosis berdasarkan gejala yang dipilih:</p>
    </div>

    <?php if (!empty($cfPenyakit)): ?>
        <div class="hasil-diagnosis">
            <?php
            $hasilDiagnosis = key($cfPenyakit);
            $cfSistem = current($cfPenyakit);
            ?>
            <div class='penyakit-item'>
                <div class='isipenyakit'>
                    <img src='../../dokter/penyakit/uploads/<?= $penyakitData[$hasilDiagnosis]['gambar'] ?>' alt='Gambar Penyakit'>
                </div>
                <h2 id='judulpenyakit'><?= $penyakitData[$hasilDiagnosis]['namapenyakit'] ?></h2>
                <h3 id='judulpenyakit'><em>(<?= $penyakitData[$hasilDiagnosis]['namailmiah'] ?>)</em></h3>
                <div class='gejala-solusi'>
                    <p>Kemungkinan Ayam Anda <strong><?= number_format($cfSistem * 100, 2) ?>%</strong> Mengidap <strong><?= $penyakitData[$hasilDiagnosis]['namapenyakit'] ?></strong></p>
                    <h3><strong>Keterangan:</strong></h3>
                    <p id="keterangan"><?= $penyakitData[$hasilDiagnosis]['keterangan'] ?></p>
                    <h3><strong>Gejala:</strong></h3>
                    <p id="gejala"><?= $penyakitData[$hasilDiagnosis]['gejala'] ?></p>
                    <h3><strong>Solusi:</strong></h3>
                    <p id="solusi"><?= $penyakitData[$hasilDiagnosis]['solusi'] ?></p>
                </div>
            </div>
            <div class="detail-gejala">
                <h2 id="selengkapnya"><strong>Selengkapnya : </strong></h2>
                <h3><strong>Gejala yang Dipilih dan Nilai CF User:</strong></h3>
                <table>
                    <tr>
                        <th>Gejala</th>
                        <th>Nilai CF User</th>
                    </tr>
                <?php
                $namaGejalaDitampilkan = [];
                foreach ($gejalaTerpilih as $idgejala):
                    $namagejala = '';
                    if (empty($namagejala)) {
                        $query = $conn->prepare("SELECT namagejala FROM mesin_inferensi WHERE idgejala = ?");
                        $query->bind_param("s", $idgejala);
                        $query->execute();
                        $result = $query->get_result();
                        $row = $result->fetch_assoc();
                        $namagejala = $row['namagejala'] ?? 'Gejala tidak ditemukan'; 
                    }

                    if (!empty($namagejala) && !in_array($namagejala, $namaGejalaDitampilkan)) {
                        $namaGejalaDitampilkan[] = $namagejala; ?>
                        <tr>
                            <td><?= $namagejala ?></td>
                            <td><?= number_format($cfUser[$idgejala], 2) ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td>Gejala tidak ditemukan (ID: <?= $idgejala ?>)</td>
                            <td><?= number_format($cfUser[$idgejala], 2) ?></td>
                        </tr>
                    <?php } 
                endforeach; ?>
                </table>
                <h3><strong>Rumus:</strong></h3>
                <p>𝐶𝐹(𝐻|𝐸)𝑝𝑎𝑟𝑎𝑙𝑒𝑙 = 𝐶𝐹(𝐸)𝑢𝑠𝑒𝑟 × 𝐶𝐹(𝐸)𝑝𝑎𝑘𝑎𝑟</p>
                <br><p>𝐶𝐹(𝐻|𝐶𝐹1, 𝐶𝐹2)𝑘𝑜𝑚𝑏𝑖𝑛𝑎𝑠𝑖 = 𝐶𝐹1 + 𝐶𝐹2(1 − 𝐶𝐹1)</p>
                <h3><strong>Hasil Hitungan Rumus:</strong></h3>
                <table>
                    <tr>
                        <th>Penyakit</th>
                        <th>Hasil CF𝑘𝑜𝑚𝑏𝑖𝑛𝑎𝑠𝑖</th>
                    </tr>
                    <?php foreach ($cfPenyakit as $penyakit => $cf): ?>
                        <tr>
                            <td><?= $penyakit ?></td>
                            <td><?= number_format($cf, 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                
            </div>
        </div>
    <?php else: ?>
        <p>Tidak ada penyakit yang cocok dengan gejala yang Anda pilih.</p>
    <?php endif ?>

    <div class="tombol">
                <a href="diagnosis.php" id="kembali">Kembali</a>
                <a href="../homepage/peternak.php" id="selesai">Selesai</a>
    </div>
    
</main>
</body>
</html>
