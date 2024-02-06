 <?php session_start();?>
 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="index.php"><i class="glyphicon glyphicon-home"></i></a>
            </div>

            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php 

                    $query = 'Select * FROM category';
                    $sql_categories= mysqli_query($conn,$query);
                    $result = mysqli_fetch_all($sql_categories,MYSQLI_ASSOC);


                    foreach($result as $result): ?>

                    <li>
                        <a href= #><?php echo $result['cat_title']; ?></a>
                    </li>
                    
                    
                <?php endforeach; ?>


                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ): ?>
                    
                    <li>
                        <a href="admin/index.php">ADMIN</a>
                    </li>
                    
                 <?php endif; ?>


                    <li>
                        <a href="registration.php">Register</a>
                    </li>

                   
               
         <?php 


               
                
                if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){


                    if(isset($_GET['post_id'])){


                  ?>


                   <li>
                        <a href="admin/posts.php?source=edit_post&edit=<?php echo $_GET['post_id']; ?>">Edit Post</a>
                 </li>
                   

                   
                
               <?php } 
                    }
             ?>
                    
                    
            
               </ul>

            </div>
           
           
           
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
