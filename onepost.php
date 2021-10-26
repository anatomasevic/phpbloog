<?php 
include('header.php');
$id=$_GET['id'];

?>
    <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
    <?php $select_post=mysqli_query($conn,"SELECT `id`, `naslov`, `tekst`, `datum` FROM `post` WHERE id ='$id'");
            while($posts=mysqli_fetch_array($select_post)){
                ?>
       
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title"><?php echo $posts['naslov']?></h2>
                            <h3 class="post-subtitle"><?php echo $posts['tekst']?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            <?php echo $posts['datum']?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Dodaj komentar
</button>
                        </p>
                    </div>

                    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj komentar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="includes/add_coment.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Korisnicko ime</label>
    <input type="email" class="form-control" name="name" id="name" aria-describedby="emailHelp">
    
    <input type="hidden" class="form-control" name="sifra" id="sifra" value=<?php echo $posts['id']?> aria-describedby="emailHelp">
        
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Komentar</label>
    <input type="email" class="form-control" name="coment" id="coment" aria-describedby="emailHelp">
  </div>
 
  
</form>
      </div>
      <div class="modal-footer">
   
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Komentarisi</button>
      </div>
    </div>
  </div>
</div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <h2 class="post-title">Komentari</h2>
                    <hr class="my-4" />
                    <?php $select_coments=mysqli_query($conn,"SELECT `komentar`, `ime` FROM `komentar` k JOIN `post` p ON k.postid=p.id WHERE postid ='$id'");
            while($coms=mysqli_fetch_array($select_coments)){
                ?>
       
                    <!-- Post preview-->
                    <div class="card-body">
                       
                            <h5 class="" style="margin-bottom: 0;"><?php echo $coms['ime']?></h4>
                            <p class="card-text"><?php echo $coms['komentar']?></h5>
                       
                       
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />

                    <?php }?>

                    <?php }?>


                    

    <?php include('footer.php');?> 
    <script type="text/javascript">

$("#submit").click(function(){
    var name =$("#name").val();
    var coment =$("#coment").val();
    //var sifra =$("#sifra").val();
    var sifra= $('#sifra').val();
   
    

    
     
     $.ajax({
        url:"add_coment.php",
        type:"POST",
        data:{name:name,coment:coment,sifra:sifra},
        success:function(data){
            alert("Uspesno ubaceni podaci u bazu");

           
        }

    });
   
});
</script>
