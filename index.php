<?php include('header.php');

?> 
<div class ="content">
    <table class="table">
        <thread>
            <th>Redni br.</th>
            <th id ="naslov">Naslov</th>
            <th id = "sadrzaj">Sadrzaj</th>
           
            <th>Datum</th>
            <th>Obrisi</th>
</thread>
<tbody id = "content">
</tbody>
</table 
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmeni post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Naslov</label>
    <input type="email" class="form-control" name="name" id="name" aria-describedby="emailHelp">

    <input type="hidden" class="form-control" name="sifra" id="sifra" aria-describedby="emailHelp">

</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tekst</label>
    <input type="email" class="form-control" name="coment" id="coment" aria-describedby="emailHelp">
  </div>
 
  
</form>
      </div>
      <div class="modal-footer">
   
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Izmeni</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

load();

});
function load(){
    $.ajax({
    url:"home_ajax.php",
    type:"POST",
    data:"html",
    success:function(data){
        $("#content").html(data);
    }
});
}

function del(id){
   // alert(id)
   var conf = confirm("Da li ste sigurni da zelite da obrisete post?");
   if(conf){
    $.ajax({
    url:"home_ajax.php",
    type:"POST",
    data:{id:id},
    success:function(data){
       load();
    }
});
}
}
/*function open(edit_id){
    $('#Modal').modal('show')

    $.ajax({
    url:"home_ajax.php",
    type:"POST",
    data:{edit_id:edit_id},
    success:function(data){
          // load();
     var obj = JSON.parse(data);
     // alert(obj);
      //$("#content").val(obj);
    //  console.log(obj);
     $("#content").val(obj);
    }
});
}
*/


function edit(edit_id){
    $('#Modal').modal('show')
   // alert(id)
    $.ajax({
    url:"home_ajax.php",
    type:"POST",
    data:{edit_id:edit_id},
    success:function(data){
      // load();
     var obj = JSON.parse(data);
     // alert(obj);
      //$("#content").val(obj);
    //  console.log(obj);
    $("#name").val(obj.naslov);
    $("#coment").val(obj.tekst);
    $('#sifra').val(obj.id);

    }
});
}


$("#submit").click(function(){
    var name =$("#name").val();
    var coment =$("#coment").val();
    var sifra =$("#sifra").val();
    alert(sifra);
   
    

    
     
     $.ajax({
        url:"home_ajax.php",
        type:"POST",
        data:{name:name,coment:coment,sifra:sifra},
        success:function(data){
            alert("Uspesno ubaceni podaci u bazu");

           
        }

    });
   
});
</script>




<?php include('footer.php');?> 