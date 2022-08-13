<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    session_start();
    $email=$_SESSION['email'];
    $password=$_POST["password"];
    $repassword=$_POST["repassword"];
    $query="SELECT `id`FROM `signup` WHERE `email`='$email'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
    $uid = $row['id'];
    echo$uid;
    if($password==$repassword)
    {
      $sql="UPDATE `signup` SET `password`='$password' WHERE `id`='$uid'";
      $output=mysqli_query($conn,$sql);
      if($output){
        $_SESSION['status']="password updated successfully";
        header('location:index.php');
      }
    }
    else{
      header('location:index.php');
    }
  }
?>