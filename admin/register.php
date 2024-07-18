<?php 
include 'connect.php';

if(isset($_POST['signUp'])){
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); 

    $targetDir = "uploads/";
    $fileName = basename($_FILES["gambar"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    $allowedTypes = array('jpg', 'jpeg', 'png');

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
            
            $checkEmail = "SELECT * FROM dokter WHERE email='$email'";
            $result = $conn->query($checkEmail);

            if ($result->num_rows > 0) {
                echo "Email Address Already Exists!";
            } else {
                $insertQuery = "INSERT INTO dokter (namadepan, namabelakang, email, password, gambar)
                                VALUES ('$namadepan', '$namabelakang', '$email', '$password', '$fileName')";

                if ($conn->query($insertQuery) === TRUE) {
                    session_start();
                    $_SESSION['pesan'] = "berhasil_daftar";
                    header("location: admin.php");
                    exit();
                } else {
                    echo "Error:" . $conn->error;
                }
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    } else {
        echo "Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
    }

    $conn->close();
}
?>
