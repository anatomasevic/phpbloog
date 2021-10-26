<?php include('../db.php');

if(isset($_POST['id']))
{
    $id=$_POST['id'];
    mysqli_query($conn, "DELETE FROM `poruka` WHERE id=$id");
}

 $i=1;
$select= mysqli_query($conn,"SELECT * FROM `poruka` order by id desc");
while($row=mysqli_fetch_array($select))
{?>
<tr>
   
    <td><?php echo $i++;?></td>
    <td><?php echo $row['ime'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['poruka'];?></td>
    <td><?php echo $row['datum'];?></td>
    <td><button onclick="del('<?php echo $row["id"];?>')">Obrisi</button></td>

<tr>
<?php } ?>

