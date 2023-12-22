                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">



                        <!-- Blog Search Well -->
            <div class="well">

                <h4>Blog Search</h4>
                <form action="search.php" method="post">
                <div class="input-group">
                    <input type="text" name="search" class="form-control">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>

                    </form>
                </div>
                <!-- /.input-group -->
            </div>






            <!-- Blog Categories Well -->



            <div class="well">

                <h4>Blog Categories</h4>
                <div class="row">
                    
                    <div class="col-lg-12">
                    <ul class="list-unstyled">

                  
                    
                    <?php 
                                $sql = "SELECT * FROM category";
                                $select_category = mysqli_query($conn,$sql);

                    ?>

                   <?php  while($row= mysqli_fetch_assoc($select_category)): ?>

                    <?php 

                        $id = $row['cat_id'];
                        $title = $row['cat_title'];


                    ?>
                            
                            <li><a href="category.php?category=<?php echo $id; ?>"><?php echo $title; ?></a>
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