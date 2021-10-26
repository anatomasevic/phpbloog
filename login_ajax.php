<?php //session_start();
include('db.php');


/*if (!isset($_SESSION['authenticated']))
{
    header('Location https://../login.php');
    exit;
}
else*/
{
    if($_POST['email']){

        $email=$_POST['email'];
        $pass=$_POST['pass'];
      
       $data= mysqli_query($conn,"SELECT `id` FROM `admin` WHERE email='$email' AND pass='$pass'");
       $row=mysqli_num_rows($data);
       if($row>0){
          echo "success";
    
           exit(0);
       }else{
           $er="username/pass is incorect";
           echo $er;
           exit(0);
       }
    }
}


?>