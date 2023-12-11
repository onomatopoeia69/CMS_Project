

       
        <?php $b = GetPostData($conn); ?>
        <?php deletePost($conn); ?>
 


        

<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                              
                            </tr>
                        </thead>
                   
                   
                   
                    <tbody>
                     <?php while($row_Post = mysqli_fetch_assoc($b)):?>
                    <tr>

                            <td><?php echo $row_Post['post_id'];?></td>
                            <td><?php echo $row_Post['post_author'];?></td>
                            <td><?php echo $row_Post['post_title'];?></td>



                          <?php 
                            
                            $sql = "SELECT * FROM category WHERE cat_id = {$row_Post['post_category_id']} ";
                            $cat_query = mysqli_query($conn, $sql);

                            ?>

                            <?php while($row_Cat = mysqli_fetch_assoc($cat_query)):?>

                            <td><?php echo $row_Cat['cat_title'];?></td>

                                   <?php endwhile; ?> 



                            <td><?php echo $row_Post['post_status'];?></td>
                            <td><img width='100' src="../image/<?php echo $row_Post['post_image'];?>"></td>
                            <td><?php echo $row_Post['post_tags'];?></td>
                            <td><?php echo $row_Post['post_comment_count'];?></td>
                            <td><?php echo $row_Post['post_date'];?></td>
                            <td><a href="posts.php?delete=<?php echo $row_Post['post_id'];?>">Delete</a></td>
                            <td><a href="posts.php?source=edit_post&edit=<?php echo $row_Post['post_id']; ?>">Edit</a></td>
                        
                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
                    


  