<?php
include('db.php');

if($_POST['name']){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    mysqli_query($conn,"INSERT INTO `poruka`( `ime`, `email`, `poruka`) VALUES ('$name','$email','$message')");
}




 






?>