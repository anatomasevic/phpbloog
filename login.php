<?php include('header.php');
session_start();
$_SESSION['authenticated']=true;
/*session_start();

if(isset($_SESSION['loggedIN'])){
    header("Location: admin/index.php");
    exit();
}

if($_POST['login']){

    $email=$_POST['email'];
    $pass=$_POST['pass'];
  
   $data= mysqli_query($conn,"SELECT `id` FROM `admin` WHERE email=$email AND pass=$pass");
   if($data->num_rows>0){
       $_SESSION['loggedIN']='1';
       $_SESSION['email']=$email;

       exit('success');
   }else{
       exit('failed');
   }
}*/

?>

    
    <div class="container">
    
<div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control">
</div>
<div class="form-group">
            <label>Sifra</label>
            <input type="text" name="pass" id="pass" class="form-control">
</div>
<div class="form-group">
            
            <input type="submit"  name="submit" value="Prijava" id="submit" class="btn btn-primary">
</div>
</div>


  
<?php include('footer.php');?>
<script type="text/javascript">

$("#submit").click(function(event){
    email = document.getElementById("email").value;
    pass = document.getElementById("pass").value;

    
   
    if(email=="" || pass=="")
    alert('input field cant be empty');
    else{
    
     
     $.ajax({
        url:"login_ajax.php",
        type:"POST",
        async: false,
        data:{email:email,pass:pass},
        success:function(data){
            if(data=="success"){
                window.location="../phpdomaci/admin/index.php";

            }else{
                alert(data);
            } 
            
          
       
            }
    

});

}
});         
</script>
