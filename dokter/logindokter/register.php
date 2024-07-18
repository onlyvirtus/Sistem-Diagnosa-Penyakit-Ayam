<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $namadepan=$_POST['fName'];
    $namabelakang=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From dokter where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO dokter(namadepan,namabelakang,email,password)
                       VALUES ('$namadepan','$namabelakang','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM dokter WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: ../homepage/homepage.php");
    exit();
   }
   else{
    echo "Tidak Ditemukan, Salah Email atau Password";
   }

}
?>