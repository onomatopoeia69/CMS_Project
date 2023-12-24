

       
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
                                <th>Delete</th>
                                <th>Edit</th>


                              
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
                            <td><a href="posts.php?delete=<?php echo $id;?>"><i class="fa fa-fw fa-trash"></i>Delete</a></td>
                            <td><a href="posts.php?source=edit_post&edit=<?php echo $id; ?>"><i class="fa fa-fw fa-edit"></i>Edit</a></td>
                        
                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
                    


  