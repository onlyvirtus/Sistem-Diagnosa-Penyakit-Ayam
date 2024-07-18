<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namapenyakit = $_POST['namapenyakit'];
    $namailmiah = $_POST['namailmiah'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];
    $idpenyakit = $_POST['idpenyakit'];

    $gejala = '';

    // Handle gejala dari form
    if (!empty($_POST['namagejala']) && is_array($_POST['namagejala']) &&
        !empty($_POST['nilaicf']) && is_array($_POST['nilaicf']) &&
        !empty($_POST['idgejala']) && is_array($_POST['idgejala'])) {

        $namagejalaArray = $_POST['namagejala'];
        $nilaicfArray = $_POST['nilaicf'];
        $idgejalaArray = $_POST['idgejala'];

        $gejalaFormatted = '';

        for ($i = 0; $i < count($namagejalaArray); $i++) {
            $namagejala = $namagejalaArray[$i];
            $nilaicf = $nilaicfArray[$i];
            $idgejala = $idgejalaArray[$i];

            $gejalaFormatted .= $namagejala;

            if ($i < count($namagejalaArray) - 1) {
                $gejalaFormatted .= ', ';
            }

            $sqlGejala = "INSERT INTO mesin_inferensi (idpenyakit, idgejala, namagejala, nilaicf) 
                          VALUES ('$idpenyakit', '$idgejala', '$namagejala', '$nilaicf')";

            if ($conn->query($sqlGejala) !== TRUE) {
                echo "Error: " . $sqlGejala . "<br>" . $conn->error;
                exit; 
            }
        }

        $gejala = $gejalaFormatted;
    }

    // Handle file upload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['gambar']['tmp_name'];
        $fileName = $_FILES['gambar']['name'];
        $uploadFileDir = 'uploads/';
        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Insert data ke dalam tabel p_ayambroiler
            $sql = "INSERT INTO p_ayambroiler (idpenyakit, namapenyakit, namailmiah, keterangan, gejala, solusi, gambar) 
                    VALUES ('$idpenyakit', '$namapenyakit', '$namailmiah', '$keterangan', '$gejala', '$solusi', '$fileName')";

            if ($conn->query($sql) === TRUE) {
                header('Location: penyakit.php');
                exit; 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo 'Terjadi kesalahan saat memindahkan file yang diunggah.';
        }
    } else {
        echo 'Tidak ada file yang diunggah atau terjadi kesalahan saat mengunggah.';
    }

    $conn->close();
}
?>
