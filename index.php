
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 

   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            

            <?php 

            $sql = "Select * FROM posts WHERE post_status='Published' ORDER BY post_id DESC ";
            $select_all_post= mysqli_query($conn,$sql);
           
            ?>

          <?php       
                if(mysqli_num_rows($select_all_post) === 0) : ?>

                        <h1 class="text-center">No Post Result</h1>

                 <?php else: 
    
    
                 while($row= mysqli_fetch_assoc($select_all_post)):?>

                 <?php 


                    $id = $row['post_id'];
                    $title = $row['post_title'];
                    $author = $row['post_author'];
                    $date = $row['post_date'];
                    $image = $row['post_image'];
                    $post_content = $row['post_content'];



                    ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $id;?>"><?php echo $title;    ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?post_name=<?php  echo $author;  ?>"><?php echo $author ;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  date('M d Y',strtotime($date)); ?></p>
                <hr>



                <a href="post.php?post_id=<?php echo $id;?>"><img class="img-responsive" src="image/<?=$image; ?>" alt=""></a>

                <hr>
                <p><?php echo substr($post_content,0,50); ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $id;?>">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

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