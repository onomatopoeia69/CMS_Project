        
                    <!-- select all the data when click the edit  -->
                             <?php  $a = GetEditData($conn); ?>
                <!-- Update the data when click the update  -->
                                <?php UpdateEditCat($conn); ?> 
                        
                        
                        
                        
                        
                        <form action="" method="post">
                      
                      <div class="form-group">
                          <label for="cat-title">Edit Category</label>
                          
              <?php while($row = mysqli_fetch_assoc($a)): ?>

                  <?php 

                    $title = $row['cat_title'];

                  ?>

                <input value="<?php echo isset($title) ?  $title : '';?>" 
                class="form-control" type="text" name="edit_cat_title">

                      </div>
                      <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="edit_category" value="Update Category">
                      </div>
                      
                      </form>
                 <?php endwhile; ?>