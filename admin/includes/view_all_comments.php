
       
        <?php $comment_data = GetCommentData($conn); ?>
        <?php deleteComment($conn);?>
        <?php 

                if(isset($_GET['delete'])){

                    $id = $_GET['delete'];


                    
                    $sql2 = "UPDATE posts set post_comment_count = post_comment_count - 1  WHERE post_id = $id";
                    $count_query = mysqli_query($conn, $sql2);




                }

        
        ?>
        <?php  UnapproveStatus($conn);  ?>
        <?php ApproveStatus($conn); ?>
            
            
        


        

<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Response</th>
                                <th>Date & Time</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>
                             
                            </tr>
                        </thead>
                   
                   
                   
                    <tbody>
                     <?php while($row_Comment = mysqli_fetch_assoc($comment_data)):?>

                        <?php 

                            $id = $row_Comment['comment_id'];
                            $comment_id = $row_Comment['comment_author'];
                            $content = $row_Comment['comment_content'];
                            $email= $row_Comment['comment_email'];
                            $status= $row_Comment['comment_status'];
                            $comment_post_id= $row_Comment['comment_post_id'];
                            $date= $row_Comment['comment_date'];



                        ?>



                    <tr>

                            <td><?php echo $id;?></td>
                            <td><?php echo $comment_id;?></td>
                            <td><?php echo $content;?></td>
                            <td><?php echo $email;?></td>       
                            <td><?php echo $status;?></td>

                          <?php
                          $sql = "SELECT * FROM posts WHERE post_id = $comment_post_id "; 
                          $Get_post_data = mysqli_query($conn, $sql);

                          ?>

                          <?php while ($row_post = mysqli_fetch_assoc($Get_post_data)):    ?>   

                            <?php 

                            $id_post = $row_post['post_id'];
                            $title=$row_post['post_title']


                            ?>

                               
                            <td><a href="../post.php?post_id=<?php echo $id_post; ?>"><?php echo $title;?></td>
                                           
                                
                             <?php endwhile; ?>
                           
                          
                            

                            <td><?php echo $date;?></td>

                            
                            <td><a href="comments.php?approve=<?php echo $id;?>"><i class="fa fa-fw fa-check"></i>Approve</a></td>
                            <td><a href="comments.php?unapprove=<?php echo $id;?>"><i class="fa fa-fw fa-close"></i>Unapprove</a></td>
                            <td><a  onclick="return confirm('Are you sure you want to Delete <?php ?>?')"  href="comments.php?delete=<?php echo $id; ?>"><i class="fa fa-fw fa-trash"></i>Delete</a></td>
                           

                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
                    


  