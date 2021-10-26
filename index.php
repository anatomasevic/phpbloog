
    <?php include('header.php');?>
    <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <select name="sort_numeric" class="form-control">
                                           
                                            <option value="najnoviji" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "najnoviji") { echo "selected"; } ?> > najnoviji</option>
                                            <option value="njastariji" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "njastariji") { echo "selected"; } ?> > njastariji</option>
                                        </select>
                                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                                            Sortiraj
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
    <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
    <?php 

$sort_option = "";
if(isset($_GET['sort_numeric']))
{
    if($_GET['sort_numeric'] == "najnoviji"){
        $sort_option = "ASC";
    }elseif($_GET['sort_numeric'] == "njastariji"){
        $sort_option = "DESC";
    }
}
    
    $select_post=mysqli_query($conn,"SELECT * FROM `post` ORDER by id $sort_option");
            while($posts=mysqli_fetch_array($select_post)){
                ?>
       
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="onepost.php?id=<?php echo $posts['id']?>">
                            <h2 class="post-title"><?php echo $posts['naslov']?></h2>
                            <h3 class="post-subtitle"><?php echo $posts['tekst']?></h3>
                        </a>
                     <!--   <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            <?php echo $posts['datum']?>
                        </p>-->
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php }?>
    <?php include('footer.php');?> 