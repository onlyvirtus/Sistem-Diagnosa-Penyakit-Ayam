<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $idpenyakit = $_GET['id'];

    // Hapus gejala terkait terlebih dahulu
    $deleteGejalaSql = "DELETE FROM mesin_inferensi WHERE idpenyakit = ?";
    $stmtGejala = $conn->prepare($deleteGejalaSql);
    $stmtGejala->bind_param("i", $idpenyakit);

    if ($stmtGejala->execute()) {
        // Hapus data penyakit setelah gejala berhasil dihapus
        $deletePenyakitSql = "DELETE FROM p_ayambroiler WHERE idpenyakit = ?";
        $stmtPenyakit = $conn->prepare($deletePenyakitSql);
        $stmtPenyakit->bind_param("i", $idpenyakit);

        if ($stmtPenyakit->execute()) {
            echo json_encode(['success' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['success' => false, 'error' => $stmtPenyakit->error]);
        }

        $stmtPenyakit->close();
    } else {
        echo json_encode(['success' => false, 'error' => $stmtGejala->error]);
    }

    $stmtGejala->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
