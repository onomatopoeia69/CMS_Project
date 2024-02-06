
        <?php  
        
        

                $sql2 = "SELECT * FROM comments ";
                $comment_query = mysqli_query($conn, $sql2);
                $comment_num_rows = mysqli_num_rows($comment_query);
                $per_page = 10;
                $index = ceil($comment_num_rows/$per_page);  


        
        ?>


            <?php 


                    if(isset($_GET['page'])){


                        $page_num =  $_GET['page'];


                    }else{


                        $page_num = 0;


                    }


                    if($page_num == 1  || $page_num == 0 ){


                        $page_1 = 0 ;


                    }else{


                        $page_1 = ($page_num * $per_page) - $per_page;

                    }


                ?>


            


        <?php
        
        
                $sql = "SELECT * FROM comments LIMIT $page_1, $per_page";
                $comment_data= mysqli_query($conn,$sql);
        
        
          ?>


        <?php deleteComment($conn);?>

       

        <?php  
        
            UnapproveStatus($conn);
            
            
        
        
        ?>
        <?php

         ApproveStatus($conn); 

        
         
         ?>
            
            
        

        

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

                    <?php 
                            while ($row_post = mysqli_fetch_assoc($Get_post_data)):    ?>   

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


                    

                    <ul class="pager">




                            <li><?php echo isset($_GET['page'])?  $page_num : "1" ;?> of <?php echo $index; ?> </li><br>


                            <?php  if($page_num > 1) : ?>

                            <li><a href="comments.php?page=<?php echo  $page_num  - 1; ?>"> << </a></li>


                            <?php endif; ?>


                            <?php for($i=1; $i <= $index; $i++):?>

                            <li><a href="comments.php?page=<?php echo $i;?>"><?php echo $i;   ?></a></li>

                            <?php endfor; ?>

                            
                            <?php  if($page_num < $index) : ?>

                            <li><a href="comments.php?page=<?php echo  isset($_GET['page'])? $page_num + 1 : $page_num + 2 ; ?>"> >> </a></li>


                            <?php endif; ?>

                            

                    </ul>
                    


  