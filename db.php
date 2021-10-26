<?php
      $conn=mysqli_connect('localhost','root','','domaci_php');
      if(mysqli_connect_errno()){
         echo "Neuspesno konektovanje na MySQL".mysqli_connect_errno();
  
      }else{
         // echo "Uspesno konektovanje na MySQL";
          
      }  
?>