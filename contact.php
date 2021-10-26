<?php include('header.php');?>
    
    <div class="container">
        <div class="form-group">
            <label>Ime</label>
            <input type="text" name="name" id="name" class="form-control">
</div>
<div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control">
</div>
<div class="form-group">
            <label>Poruka</label>
            <input type="text" name="message" id="message" class="form-control">
</div>
<div class="form-group">
            
            <input type="submit"  name="submit" id="submit" class="btn btn-primary">
</div>
</div>
  
<?php include('footer.php');?>

<script type="text/javascript">

$("#submit").click(function(){
    var name =$("#name").val();
    var email =$("#email").val();
    var message =$("#message").val();
     
    $.ajax({
        url:"ajax.php",
        type:"POST",
        data:{name:name,email:email,message:message},
        success:function(data){
            alert("Uspesno ubaceni podaci u bazu");

            $("#name").val();
            $("email").val();
            $("message").val();
        }

    });
});
</script>