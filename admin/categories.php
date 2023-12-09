<?php include 'includes/admin_header.php';?>
<?php include 'functions.php'; ?> 

 


    <div id="wrapper">


                    <!-- navigation -->
        <?php include "includes/admin_navigation.php"; ?>


            <!-- insert in categories database -->
       
                <?php $a= insertCat($conn);  ?>

            

                <!-- deleting in categories database -->
                    
                    <?php   deleteCat($conn);     ?>

                
                <!-- selecting all categories in database -->
                

                    <?php  $c = GetCatData($conn);  ?>

                    
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            HELLO ADMIN
                            <small>Author</small>
                            </h1>

                            <!-- add category form -->

                        <div class="col-xs-6">
                        <p><?php echo isset($a)? $a : $a='';?></p>
                        <form action="" method="post">
                      
                        <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_category" value="Add Category">
                        </div>

                        </form>


                        <!-- edit category form -->

                           
                    <?php if(isset($_GET['edit'])){
                         
                            
                         include 'includes/update_categories.php';

                     } ?>
                        
                     

                        </div>
                       




                        <!-- table -->
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                        

                            <thead>
                            <tr>
                                    <th>Id </th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>

                            <!-- table body -->
                            <?php while($row = mysqli_fetch_assoc($c)) : ?>
                           
                            <tbody>
                           
                                <tr>

                                    <td><?php echo $row['cat_id'];?></td>
                                    <td><?php echo $row['cat_title'];?></td>
                                    <td><a href="categories.php?delete=<?php echo $row['cat_id'];?>">Delete</a></td>
                                    <td><a href="categories.php?edit=<?php echo $row['cat_id'];?>">Edit</a></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>

                        
                       
                        
                        
                            

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>







        <!-- /#page-wrapper -->
    <?php include 'includes/admin_footer.php'; ?>