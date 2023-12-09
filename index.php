
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            

            <?php 

            $sql = "Select * FROM posts";
            $select_all_post= mysqli_query($conn,$sql);
           
        

             while($row= mysqli_fetch_assoc($select_all_post)):?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $row['post_title'];    ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $row['post_author'];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $row['post_date']; ?></p>
                <hr>
                <img class="img-responsive" src="image/<?=$row['post_image']; ?>" alt="">
                <hr>
                <p><?php echo $row['post_content']; ?></p>
                <a class="btn btn-primary" href="#">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

             <?php endwhile; ?>
        
                
            </div>

            <?php include_once 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>