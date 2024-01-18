

       
        <?php $b = GetPostData($conn); ?>
        <?php deletePost($conn); ?>




    <?php 

            if(isset($_POST['checkboxArray'])){
       
               
                $array1 = $_POST['checkboxArray'];


                 for($i = 0 ; $i< count($array1); $i++){


                    $bulk_options = $_POST['bulk_options'];

                  switch ($bulk_options){


                    case "Published":
                    
                        $sql ="UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $array1[$i]";
                        mysqli_query($conn, $sql);
                        header('Location:posts.php');
                        
                    break;

                    case "Draft":
                    
                        $sql ="UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $array1[$i]";
                        mysqli_query($conn, $sql);
                        header('Location:posts.php');
                        
                    break;


                    case "Delete":
                    
                        $sql ="DELETE FROM posts WHERE post_id = $array1[$i]";
                        mysqli_query($conn, $sql);
                        header('Location:posts.php');
                        
                    break;

                    case "Clone":
                    
                        $sql ="SELECT * FROM posts WHERE post_id = $array1[$i]";
                        $clone_data = mysqli_query($conn, $sql);


                    while($row_clone = mysqli_fetch_assoc($clone_data)){

                            
                            $db_author = $row_clone['post_author'];
                            $db_title = $row_clone['post_title'];
                            $db_post_category_id = $row_clone['post_category_id'];
                            $db_status = $row_clone['post_status'];
                            $db_image = $row_clone['post_image'];
                            $db_tags = $row_clone['post_tags'];
                            $db_post_comment_count = $row_clone['post_comment_count'];
                            $db_date = $row_clone['post_date'];
                            $db_content = $row_clone['post_content'];

                        

                    $sql2 = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) 
                            VALUES ($db_post_category_id, '$db_title', '$db_author', '$db_date' , '$db_image', '$db_content','$db_tags', $db_post_comment_count, '$db_status' )";
                            $cloned_data_query = mysqli_query($conn, $sql2);
                            header('Location:posts.php');



                        }
                        

                        
                        
                    break;

                    

                    }

           }



        }

    ?>



    
 



    <form action="" method="post">
 


                <div id="bulkOptionsContainer" class="col-xs-4">

                    <select class="form-control" name="bulk_options" id="">

                        <option value="">SELECT OPTIONS</option>
                        <option value="Published">PUBLISH</option>
                        <option value="Draft">DRAFT</option>
                        <option value="Delete">DELETE</option>
                        <option value="Clone">CLONE</option>

                        
                    </select>
                   
                </div>

    <div class="col-xs-4">

    <input type="submit" name="submit"  class="btn btn-success" onclick="return confirm('Do you want to apply this changes ?')" value="APPLY CHANGES">
    <a class="btn btn-primary" href="./posts.php?source=add_post">ADD NEW</a>


    </div>


    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th><input type="checkbox" id="SelectAllCheckBoxes"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>View Post</th>


                              
                            </tr>
                        </thead>
                   
                   
                   
                    <tbody>
                     <?php while($row_Post = mysqli_fetch_assoc($b)):?>

                        <?php 

                            $id = $row_Post['post_id'];
                            $author = $row_Post['post_author'];
                            $title = $row_Post['post_title'];
                            $post_category_id = $row_Post['post_category_id'];
                            $status = $row_Post['post_status'];
                            $image = $row_Post['post_image'];
                            $tags = $row_Post['post_tags'];
                            $post_comment_count = $row_Post['post_comment_count'];
                            $date = $row_Post['post_date'];


                        ?>
                    <tr>

                            <td><input type="checkbox" class="checkboxes" name="checkboxArray[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $author;?></td>
                            <td><?php echo $title;?></td>



                          <?php 
                            
                            $sql = "SELECT * FROM category WHERE cat_id = $post_category_id ";
                            $cat_query = mysqli_query($conn, $sql);

                            ?>

                            <?php while($row_Cat = mysqli_fetch_assoc($cat_query)):?>
                                <?php 

                                $cat_title = $row_Cat['cat_title'];

                                ?>

                            <td><?php echo $cat_title; ?></td>

                                   <?php endwhile; ?> 

                            <td><?php echo $status;?></td>

                            <td><img width='100' src="../image/<?php echo $image;?>"></td>

                            <td><?php echo $tags;?></td>

                            <td><?php echo $post_comment_count;?></td>

                            <td><?php echo $date;?></td>
                            <td><a onclick="return confirm('Are you sure you want to Delete <?php ?>?')"  href="posts.php?delete=<?php echo $id;?>"><i class="fa fa-fw fa-trash"></i>Delete</a></td>
                            <td><a href="posts.php?source=edit_post&edit=<?php echo $id; ?>"><i class="fa fa-fw fa-edit"></i>Edit</a></td>
                            <td><a href="../post.php?post_id=<?php echo $id; ?>"><i class="fa fa-fw fa-edit"></i>View Post</a></td>
                            

                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
               


  