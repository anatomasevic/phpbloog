<?php include('db.php');

if($_POST['name']){

    $name=$_POST['name'];
    $coment=$_POST['coment'];
    $sifra=$_POST['sifra'];
    mysqli_query($conn,"INSERT INTO `komentar`(`ime`, `komentar`,`postid`) VALUES ('$name','$coment','$sifra')");
}



?>