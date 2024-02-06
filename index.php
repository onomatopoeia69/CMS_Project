
<?php include_once 'includes/db.php'; ?> 
<?php include_once 'includes/header.php'; ?> 
<?php include_once 'includes/navigation.php'; ?> 

   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



            <?php 


                $sql2 = "SELECT * FROM posts";
                $select_num_post= mysqli_query($conn,$sql2);
                $post_num_rows = mysqli_num_rows($select_num_post);
                $per_page = 2;



                    // this will be the number of pages 
                    //using ceiling the number rounds  up as long as their are decimals
                    // the deonominator will be the number of you want to posted
                    
                    $count = ceil($post_num_rows / $per_page);

             ?>

                <?php 

                    if(isset($_GET['post_page'])){


                        $page= $_GET['post_page'];

                       

      
                    }else{


                        $page = 0;
                    
                    
                    }


                    if($page == 0 || $page == 1){

                        $page_1 = 0 ;


                    }else{


                        $page_1 = ($page * $per_page) - $per_page;


                    }




                ?>


           
            
            <?php
   


            $sql2 = "Select * FROM posts WHERE post_status='Published' ORDER BY post_id DESC LIMIT $page_1 , $per_page ";
            $select_all_post= mysqli_query($conn,$sql2);
           


                    
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
                    <a href="post.php?post_id=<?php echo $id;?>"><?php echo $title; ?></a>
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



                        

        <ul class="pager">


                        <!-- this will process the footer pager downside  -->

              <!-- to achieve the ceiling function properly it must be have an equal in the loop -->


<!-- 
                        if the $page is set it print the current page , if not the $page will be printed as 1 -->
                <li><?php  echo isset($_GET['post_page']) ? $page: "1" ;  ?> of <?php echo $count; ?>   </li><br>


                 <!-- if the $page is greater than 1 , it will show the << button -->

                <?php  if($page > 1) :?>

                            <!-- minus the $page by 1  -->

                    <li><a href="index.php?post_page=<?php echo $page - 1; ?>"><<</a></li>


                  <?php endif;  ?>


                <?php for($i=1; $i <= $count; $i++):?>




                        <li><a href="index.php?post_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>



                    <?php endfor; ?>

                     <!-- if the $page is less than $count  , it will show the >> button -->

                    <?php  if( $page < $count ) :?>


                            <!-- if the $page is not set ( else $page= 0), it will proceed to page 2 by adding 2 -->
                  <!-- but if it set by clicking the any button in pagination ($page = 0), it will proceed also to page 2 by adding 1 -->

                            <li><a href="index.php?post_page=<?php echo $page == 0 ? $page + 2 : $page + 1; ?>">>></a></li>


                        <?php endif;  ?>


        </ul>

        <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>