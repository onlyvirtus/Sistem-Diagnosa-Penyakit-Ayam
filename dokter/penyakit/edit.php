<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idpenyakit = $_POST['idpenyakit'];
    $namapenyakit = $_POST['namapenyakit'];
    $namailmiah = $_POST['namailmiah'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];

    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
        $sql_update = "UPDATE p_ayambroiler SET namapenyakit='$namapenyakit', namailmiah='$namailmiah', gambar='$target_file', keterangan='$keterangan', solusi='$solusi' WHERE idpenyakit='$idpenyakit'";
    } else {
        $sql_update = "UPDATE p_ayambroiler SET namapenyakit='$namapenyakit', namailmiah='$namailmiah', keterangan='$keterangan', solusi='$solusi' WHERE idpenyakit='$idpenyakit'";
    }

    $gejalaArray = $_POST['namagejala'];
    $gejalaString = implode(", ", $gejalaArray); 
    $sql_update_gejala = "UPDATE p_ayambroiler SET gejala='$gejalaString' WHERE idpenyakit='$idpenyakit'";

    $conn->begin_transaction();

    $update_success = $conn->query($sql_update);
    $update_gejala_success = $conn->query($sql_update_gejala);

    if ($update_success && $update_gejala_success) {
        $sql_delete_gejala = "DELETE FROM gejala_ayambroiler WHERE idpenyakit='$idpenyakit'";
        $delete_gejala_success = $conn->query($sql_delete_gejala);

        if ($delete_gejala_success) {
            for ($i = 0; $i < count($_POST['idgejala']); $i++) {
                $idgejala = $_POST['idgejala'][$i];
                $namagejala = $_POST['namagejala'][$i];
                $nilaicf = $_POST['nilaicf'][$i];

                $sql_insert_gejala = "INSERT INTO mesin_inferensi (idpenyakit, idgejala, namagejala, nilaicf)
                                      VALUES ('$idpenyakit', '$idgejala', '$namagejala', '$nilaicf')";
                $insert_gejala_success = $conn->query($sql_insert_gejala);

                if (!$insert_gejala_success) {
                    $conn->rollback();
                    echo "Gagal memperbarui gejala penyakit.";
                    break;
                }
            }

            
            if ($insert_gejala_success) {
                $conn->commit();
                echo "Penyakit berhasil diperbarui.";
            }
        } else {
            $conn->rollback();
            echo "Gagal menghapus gejala penyakit.";
        }
    } else {
        $conn->rollback();
        echo "Gagal memperbarui penyakit.";
    }

    $conn->close();
} else {
    $idpenyakit = $_GET['id'];

    $sql = "SELECT * FROM p_ayambroiler WHERE idpenyakit = '$idpenyakit'";
    $result = $conn->query($sql);
    $penyakit = $result->fetch_assoc();

    $sqlGejala = "SELECT * FROM mesin_inferensi WHERE idpenyakit = '$idpenyakit'";
    $resultGejala = $conn->query($sqlGejala);
    $gejalaList = [];
    while ($rowGejala = $resultGejala->fetch_assoc()) {
        $gejalaList[] = $rowGejala;
    }

    $response = [
        'idpenyakit' => $penyakit['idpenyakit'],
        'namapenyakit' => $penyakit['namapenyakit'],
        'namailmiah' => $penyakit['namailmiah'],
        'keterangan' => $penyakit['keterangan'],
        'solusi' => $penyakit['solusi'],
        'gejala' => $gejalaList,
    ];

    echo json_encode($response);

    $conn->close();
}
?>
