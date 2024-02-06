
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <h1>ALL RESULTS:  </h1>


            

            <?php 

            if (isset($_GET['post_name'])){



            $post_author = $_GET['post_name'];

            $sql = "Select * FROM posts WHERE post_author= '$post_author' ORDER BY post_date DESC ";
            $select_all_post_author= mysqli_query($conn,$sql);

                }  ?>

             <?php while($row= mysqli_fetch_assoc($select_all_post_author)) :?>
             

                <?php 
                
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $image = $row['post_image'];
                    $content = $row['post_content'];


                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id ; ?>"><?php echo $post_title;    ?></a>
                </h2>
                <p class="lead">
                    by  <?php echo $post_author ;?> 
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="image/<?=$image; ?>" alt="">
                <hr>
                <p><?php echo $content ; ?></p>
              
                <hr>

             <?php endwhile; ?>


        



              
            </div>

            <?php include_once 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>