<?php
session_start();
include("../logindokter/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Hewan</title>
    <link rel="stylesheet" href="3.css">
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
                <li><a href="../../0interface/index.php">Logout</a></li>
            </ul>
            <a href="#" id="profile">Profile</a>
        </div>
    </nav>
    
    <div class="rectangle">
        
        <a id="hellodokter">HELLO DOKTER</a>
        <a id="namadokter"><?php 
        if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            $query=mysqli_query($conn, "SELECT dokter.* FROM `dokter` WHERE dokter.email='$email'");
            while($row=mysqli_fetch_array($query)){
                echo $row['namadepan'].' '.$row['namabelakang'];
                echo "      <img src='../../admin/uploads/" . $row['gambar'] . "' id='gambar'>";
            }
        }
        ?></a>
        <div class="button">
            <a href="../penyakit/penyakit.php"id="penyakit"><li>Daftar Penyakit</li></a>
        </div>
    </div>
    
    
    
    <script src="script.js"></script>
</body>
</html>