<?php ob_start(); ?>
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 
<?php include_once 'admin/functions.php'; ?> 
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            

            <?php 

            if (isset($_GET['post_id'])){



            $post_id = $_GET['post_id'];

            $sql = "Select * FROM posts WHERE post_id= $post_id";
            $select_all_post= mysqli_query($conn,$sql);

          


            while($row= mysqli_fetch_assoc($select_all_post)):?>


                    <?php 

                            $title = $row['post_title'];
                            $author = $row['post_author'];
                            $date= $row['post_date'];
                            $image = $row['post_image'];
                            $content = $row['post_content'];
                            $post_view_counts = $row['post_view_counts'];
                            $new_count = $post_view_counts + 1;


            
              $sql2 = "UPDATE posts SET post_view_counts = $new_count WHERE post_id = $post_id ";
                 $update_view_count = mysqli_query($conn, $sql2);
                 ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date ; ?></p>
                <hr>
                <img class="img-responsive" src="image/<?=$image; ?>" alt="">
                <hr>
                <p><?php echo $content; ?></p>
              
                <hr>

             <?php endwhile; ?>


                              
           <?php  }else{ 



            header("Location: index.php");
            exit;

                    

           } ?>


               <?php 
               
                    if (isset($_POST['create_comment'])){

                        $post_id = $_GET['post_id'];
                        $email = mysqli_real_escape_string($conn, $_POST['comment_email']);
                        $comment_content = mysqli_real_escape_string($conn, $_POST['comment']);
                        $comment_author = $_POST['comment_author'];




                        if(empty($email) || empty($comment_author) || empty($comment_content)){


                            echo "<script>alert('Please Fill up the comment form !') </script>";

                        }else{


                        $sql =  "INSERT into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)
                                    VALUES ($post_id, '$comment_author', '$email', '$comment_content','unapproved',NOW())";
                        $comment_query = mysqli_query($conn, $sql);

                         
         
                    //  $sql2 = "UPDATE posts set post_comment_count = post_comment_count + 1  WHERE post_id = $post_id";
                    //     $count_query = mysqli_query($conn, $sql2);

                    }

                    redirect(location:"post.php?post_id=$post_id ");

                   
                    exit;
                }


                    ?>


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action=""  method="post" >


                    
                    
                    <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" class="form-control" name="comment_author" placeholder="Author">
                    </div>

                    <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" name="comment_email" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                    <label for="Comment">Comment</label>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Write a comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <h4>Comments:</h4>
                        <?php

                            $post_id = $_GET['post_id'];
                        
                            $sql = "SELECT * FROM comments WHERE comment_post_id = $post_id and comment_status ='approved' ORDER BY comment_id DESC";
                            $post_comments = mysqli_query($conn, $sql);

                        
                  

                         while($row = mysqli_fetch_assoc($post_comments)): ?>

                        <?php 

                            $author = $row['comment_author'];
                            $date = $row['comment_date'];
                            $content = $row['comment_content'];

                        ?>

                <!-- Comment -->
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author; ?>
                            <small><?php echo date('M d, Y',strtotime($date)); ?> at <?php echo date('h:i A',strtotime($date)); ?></small>
                        </h4>
                     <?php echo $content; ?>
                    </div>
                </div>

                <?php endwhile; ?>


                <!-- Comment
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4> -->
                      
                        <!-- Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                       
                       
                        <!-- Nested Comment -->
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    <!-- </div>
                </div> -->
       
            </div>

            <?php include_once 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>