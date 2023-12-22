
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            

            <?php 

            $sql = "Select * FROM posts WHERE post_status= 'Published' ORDER BY post_date DESC ";
            $select_all_post= mysqli_query($conn,$sql);
           
            ?>

          <?php       
                if(mysqli_num_rows($select_all_post) === 0) : ?>

                        <h1 class="text-center">No Post Result</h1>

                 <?php else: 
    
    
                 while($row= mysqli_fetch_assoc($select_all_post)):?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $row['post_id'];?>"><?php echo $row['post_title'];    ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $row['post_author'];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  date('M d Y',strtotime($row['post_date'])); ?></p>
                <hr>
                <img class="img-responsive" src="image/<?=$row['post_image']; ?>" alt="">
                <hr>
                <p><?php echo substr($row['post_content'],0,50); ?></p>
                <a class="btn btn-primary" href="">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

             <?php endwhile; ?>
             <?php endif;?>
        
                
            </div>

            <?php include_once 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>