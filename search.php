
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            

          



            <!-- searching to the database -->


       <?php if(isset($_POST['submit'])){

            $search = htmlspecialchars($_POST['search']);

            $sql = "SELECT * FROM posts WHERE CONCAT_WS('',post_title,post_author,post_tags) LIKE '%$search%' ";
            $search_query = mysqli_query($conn, $sql); 
  
            if(mysqli_num_rows($search_query) == 0 ){


                echo "<h1>No results</h1>";

            }else{ 

                echo "<h1>Search Results</h1>";

                    while($row= mysqli_fetch_assoc($search_query)):?>

        
                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                            <?php  ?> 
        
                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?post_id=<?php echo $row['post_id'];?>"><?php echo $row['post_title'];   ?></a>
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
           
        <?php  }
              
            }    
            ?>

        
        

      
            
     
            </div>

            <?php include_once 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>