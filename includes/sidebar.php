                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">



                        <!-- Blog Search Well -->
            <div class="well">

                <h4>Blog Search</h4>
                <form action="search.php" method="post">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="search author, titles ...">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>

                    </form>
                </div>
                <!-- /.input-group -->
            </div>


         <!-- Login -->
    <!-- trying to hide the login form when the admin successfully login and not hide when the user login   -->
    <?php if(!isset($_SESSION['id']) || $_SESSION['role'] == 'subscriber'){ ?>  

         <div class="well">

                <h4>LOGIN</h4>
                <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="username">
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <span class="input-group-btn" >

                    <button name="login" class="btn btn-primary" type="submit">LOGIN</button>

                    </span>
                </div>
                       
             
        
                    </form>
                </div>
                <!-- /.input-group -->
           
       <?php  } ?>


            <!-- Blog Categories Well -->



            <div class="well">

                <h4>Blog Categories</h4>
                <div class="row">
                    
                    <div class="col-lg-12">
                    <ul class="list-unstyled">


                    <?php 
                                $sql = "SELECT * FROM category WHERE cat_title = 'PHP' ";
                                $select_category = mysqli_query($conn,$sql);
                                $php_num_rows = mysqli_num_rows($select_category);
                    ?>
                  
                    
                    <?php 
                                $sql = "SELECT * FROM category";
                             
                                $select_category = mysqli_query($conn,$sql);
                     
                               
                    ?>

                   <?php  while($row= mysqli_fetch_assoc($select_category)): ?>

                    <?php 

                        $id = $row['cat_id'];
                        $title = $row['cat_title'];
                        
                       
                    ?>


                  <li><a href="category.php?category=<?php echo $id; ?>"><?php echo $title ;?></a>
                  </li>


                  <?php endwhile; ?> 

                    </ul>
                
                    </div>

                 




                

                    <!-- /.col-lg-6 -->
                    
                
                    
                            

                </div>


                <!-- /.row -->
                
            </div>





                <!-- Side Widget Well -->
                        <?php include "side_widget.php"; ?>

                </div>