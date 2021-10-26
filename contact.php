<?php include('header.php');?> 
<div class ="content">
    <table class="table">
        <thread>
            <th>Redni br.</th>
            <th>Ime</th>
            <th>Email</th>
            <th>Poruka</th>
            <th>Datum</th>
            <th>Odgovor</th>
</thread>
<tbody id = "content">
</tbody>
</table 
</div>

<script type="text/javascript">
$(document).ready(function(){

load();

});
function load(){
    $.ajax({
    url:"contact_ajax.php",
    type:"POST",
    data:"html",
    success:function(data){
        $("#content").html(data);
    }
});
}

function del(id){
   // alert(id)
    $.ajax({
    url:"contact_ajax.php",
    type:"POST",
    data:{id:id},
    success:function(data){
       load();
    }
});
}

</script>
<?php include('footer.php');?> 