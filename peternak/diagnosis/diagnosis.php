<?php
include 'koneksi.php';

$sql = "SELECT idgejala, namagejala, nilaicf FROM mesin_inferensi GROUP BY idgejala ORDER BY idgejala ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis</title>
    <link rel="stylesheet" href="sty.css">
</head>
<body>
<nav class="navbar">
        <div class="container1">
            
        <a href="../homepage/peternak.php" onclick="index()">
        <img src="../../00image/logo2.png" alt="LOGO" id="logo"></a>
        <a href="../homepage/peternak.php" onclick="index()" id="ayamsehat">AYAM SEHAT</a>
            
            <ul class="menu">
                <li><a href="../homepage/peternak.php">Home</a></li>
                <li><a href="#">Diagnosis</a></li>
                <li><a href="../penyakit/penyakit.php">Penyakit</a></li>
                <li><a href="../../0interface/index.php">Logout</a></li>
            </ul>

        </div>
    </nav>
    
    <main>
        <div class="container0"></div>
        <div class='judul'>
            <p id="judul">DIAGNOSIS</p>
        </div>
        <div class="konten">
            <p id="subjudul">PILIH GEJALA DAN TENTUKAN TINGKAT KEPERCAYAAN TERHADAP GEJALA YANG DIALAMI AYAM BROILER</p>
        </div>

        <form method="POST" action="mesin_inferensi.php">
            <div class="table">
                <table>
                    <tr>
                        <th>ID Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Pilih</th>
                        <th>Tingkat Kepercayaan Anda</th>
                    </tr>

                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["idgejala"] ?></td>
                            <td><?= $row["namagejala"] ?></td>
                            <td>
                                <input type="checkbox" name="gejala[]" value="<?= $row["idgejala"] ?>">
                            </td>
                            <td>
                                <select name="cf_user[<?= $row["idgejala"] ?>]" disabled>
                                    <option value="" disabled selected class="placeholder">Pilih gejala terlebih dahulu</option>
                                    <option value="" disabled selected class="placeholder-cf">Pilih gejala terlebih dahulu</option>
                                    <option value="0.1">Tidak yakin</option>
                                    <option value="0.2">Hampir tidak yakin</option>
                                    <option value="0.3">Kemungkinan besar tidak yakin</option>
                                    <option value="0.4">Mungkin tidak yakin</option>
                                    <option value="0.5">Tidak tahu</option>
                                    <option value="0.6">Mungkin</option>
                                    <option value="0.7">Kemungkinan besar</option>
                                    <option value="0.8">Hampir yakin</option>
                                    <option value="0.9">Yakin</option>
                                    <option value="1">Sangat yakin</option>
                                </select>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <button type="submit" id="hasil">Hasil Diagnosis</button>
        </form>

        <div class="keterangan-nilai-cf">
                <table>
                    <p id="keterangan"><strong>KETERANGAN : </strong></p>
                    <tr>
                        <th id="nilaicf">Nilai CF</th>
                        <th id="tingkatcf">Tingkat Kepercayaan Anda</th>
                    </tr>
                    <tr>
                        <th>0.1</th>
                        <th>Tidak Yakin</th>
                    </tr>
                    <tr>
                        <th>0.2</th>
                        <th>Hampir Tidak Yakin</th>
                    </tr>
                    <tr>
                        <th>0.3</th>
                        <th>Kemungkinan Besar Tidak Yakin</th>
                    </tr>
                    <tr>
                        <th>0.4</th>
                        <th>Mungkin Tidak Yakin</th>
                    </tr>
                    <tr>
                        <th>0.5</th>
                        <th>Tidak Tahu</th>
                    </tr>
                    <tr>
                        <th>0.6</th>
                        <th>Mungkin</th>
                    </tr>
                    
                    <tr>
                        <th>0.7</th>
                        <th>Kemungkinan Besar</th>
                    </tr>
                    <tr>
                        <th>0.8</th>
                        <th>Hampir Yakin</th>
                    </tr>
                    <tr>
                        <th>0.9</th>
                        <th>Yakin</th>
                    </tr>
                    <tr>
                        <th>1.0</th>
                        <th>Sangat Yakin</th>
                    </tr>
                </table>
            </div>
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const selects = document.querySelectorAll('select[name^="cf_user"]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const selectId = this.value;
            const select = document.querySelector(`select[name="cf_user[${selectId}]"]`);

            if (this.checked) {
                select.disabled = false;
                select.querySelector('.placeholder').remove(); 
                select.querySelector('.placeholder-cf').remove(); 
            } else {
                select.disabled = true;
                select.innerHTML = `
                    <option value="" disabled selected class="placeholder">Pilih gejala terlebih dahulu</option>
                    <option value="" disabled selected class="placeholder-cf">Pilih gejala terlebih dahulu</option>
                    <option value="0">Sangat Tidak yakin</option>
                    <option value="0.1">Tidak yakin</option>
                    <option value="0.2">Hampir tidak yakin</option>
                    <option value="0.3">Kemungkinan besar tidak yakin</option>
                    <option value="0.4">Mungkin tidak yakin</option>
                    <option value="0.5">Tidak tahu</option>
                    <option value="0.6">Mungkin</option>
                    <option value="0.7">Kemungkinan besar</option>
                    <option value="0.8">Hampir yakin</option>
                    <option value="0.9">Yakin</option>
                    <option value="1">Sangat yakin</option>
                `; 
            }
        });
    });

    selects.forEach(select => {
        select.addEventListener('click', function () {
            if (!this.disabled) {
                this.querySelector('.placeholder-cf').remove(); 
            }
        });
    });
});

    
</script>
</body>
</html>