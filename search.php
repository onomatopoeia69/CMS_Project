
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

            $sql = "SELECT * FROM posts WHERE CONCAT_WS('',post_title,post_author,post_tags) LIKE '%$search%'  AND  post_status = 'Published'";
            $search_query = mysqli_query($conn, $sql); 
            $num_rows= mysqli_num_rows($search_query);
  
            if($num_rows == 0 ){


                echo "<h1>No results</h1>";

            }else{ 

                echo "<h1>Search Results({$num_rows})</h1>";

                    while($row= mysqli_fetch_assoc($search_query)):?>

                    <?php
                    
                    $id = $row['post_id'];
                    $title = $row['post_title'];
                    $author = $row['post_author'];
                    $date = $row['post_date'];
                    $image = $row['post_image'];
                    $content = $row['post_content'];
                    
                    
                    
                    ?> 

        
                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                           
                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?post_id=<?php echo $id;?>"><?php echo $title;   ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $author;?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $date; ?></p>
                        <hr>
                        <a href="post.php?post_id=<?php echo $id ; ?>"> <img class="img-responsive" src="image/<?=$image; ?>" alt=""></a>
                        <hr>
                        <p><?php echo $content; ?></p>
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