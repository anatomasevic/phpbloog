<?php include('../db.php');

if(isset($_POST['naslov'])){
     $post = new Postt();
   // $naslov=$_POST['naslov'];
   // $tekst=$_POST['tekst'];
    $post->naslov=$_POST['naslov'];
    $post->tekst=$_POST['tekst'];
    mysqli_query($conn,"INSERT INTO `post`(`naslov`, `tekst`) VALUES ('$naslov','$tekst')");
}



if(isset($_POST['id']))
{
    $id=$_POST['id'];
    mysqli_query($conn, "DELETE FROM `post` WHERE id=$id");
}

if(isset($_POST['name']))
{
    $name =$_POST['name'];
    $coment =$_POST['coment'];
    $sifra=$_POST['sifra'];
    
    
   mysqli_query($conn, "UPDATE `post` SET`naslov`='$name',`tekst`='$coment' WHERE id=$sifra");
   
    exit();

}
if(isset($_POST['edit_id']))
{
    
    $edit_id=$_POST['edit_id'];
   $dataget= mysqli_query($conn, "SELECT * FROM `post` WHERE id=$edit_id");
    $json=mysqli_fetch_array($dataget);
    echo json_encode($json);
    exit();

}

 $i=1;
$select= mysqli_query($conn,"SELECT * FROM `post` order by id desc");
while($row=mysqli_fetch_array($select))
{?>
<tr>
   
    <td><?php echo $i++;?></td>
    <td><?php echo $row['naslov'];?></td>
    <td><?php echo $row['tekst'];?></td>
   
    <td><?php echo $row['datum'];?></td>
    <td>
        <button onclick="del('<?php echo $row["id"];?>')">Obrisi</button>
        <button onclick="edit('<?php echo $row["id"];?>')">Izmeni</button>

</td>

<tr>
<?php } ?>




