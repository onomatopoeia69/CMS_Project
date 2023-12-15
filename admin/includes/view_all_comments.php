
       
        <?php $comment_data = GetCommentData($conn); ?>
        <?php deleteComment($conn); ?>
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
                                <th>UnApprove</th>
                                <th>Delete</th>
                             
                            </tr>
                        </thead>
                   
                   
                   
                    <tbody>
                     <?php while($row_Comment = mysqli_fetch_assoc($comment_data)):?>
                    <tr>

                            <td><?php echo $row_Comment['comment_id'];?></td>
                            <td><?php echo $row_Comment['comment_author'];?></td>
                            <td><?php echo $row_Comment['comment_content'];?></td>
                            <td><?php echo $row_Comment['comment_email'];?></td>       
                            <td><?php echo $row_Comment['comment_status'];?></td>

                          <?php
                          $sql = "SELECT * FROM posts WHERE post_id = {$row_Comment['comment_post_id']} "; 
                          $Get_post_data = mysqli_query($conn, $sql);

                          ?>

                          <?php while ($row_post = mysqli_fetch_assoc($Get_post_data)):    ?>   

                               
                            <td><a href="../post.php?post_id=<?php echo $row_post['post_id']; ?>"><?php echo $row_post['post_title'];?></td>
                                           
                                
                             <?php endwhile; ?>
                           
                          
                            

                            <td><?php echo $row_Comment['comment_date'];?></td>

                            
                            <td><a href="comments.php?approve=<?php echo $row_Comment['comment_id'];?>">Approve</a></td>
                            <td><a href="comments.php?unapprove=<?php echo $row_Comment['comment_id'];?>">Unapprove</a></td>
                            <td><a href="comments.php?delete=<?php echo $row_Comment['comment_id']; ?>">Delete</a></td>
                           
                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
                    


  