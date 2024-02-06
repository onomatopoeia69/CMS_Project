


            <?php 

                if(isset($_GET['post_id'])){

                    $post_id = $_GET['post_id'];

                }


            ?>

            
        


        <?php 
        
        if(isset($_GET['unapprove'])){

            $comment_id = $_GET['unapprove'];
        


            $sql = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id ";
            mysqli_query($conn, $sql);
           
        }
        
        ?>



        <?php
        
        if(isset($_GET['approve']) ) {

            $comment_id = $_GET['approve'];
          

            $sql = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id ";
            mysqli_query($conn, $sql);
          
            
        }
        
        
        ?>

        <?php

            if(isset($_GET['delete'])){


                $comment_id = $_GET['delete'];

                $sql= "DELETE FROM comments WHERE comment_id = $comment_id";
                mysqli_query($conn, $sql);



            }


        ?>
            
    


       
        <?php $b = GetPostData($conn); ?>
        
        <?php ResetViews($conn); ?>




    <?php 

            if(isset($_POST['checkboxArray'])){
       
               
                $array1 = $_POST['checkboxArray'];


                 for($i = 0 ; $i< count($array1); $i++){


                    $bulk_options = $_POST['bulk_options'];

                  switch ($bulk_options){


                    case "approved":
                    
                        $sql ="UPDATE comments SET comment_status = '$bulk_options' WHERE comment_id  = $array1[$i]";
                        mysqli_query($conn, $sql);
                        header('Location: comments.php?source=post_all_comments&post_id='.$post_id);
                        
                    break;

                    case "unapproved":
                    
                        $sql ="UPDATE comments SET comment_status = '$bulk_options' WHERE comment_id = $array1[$i]";
                        mysqli_query($conn, $sql);
                        header('Location: comments.php?source=post_all_comments&post_id='.$post_id);
                        
                    break;


                    case "Delete":
                    
                        $sql ="DELETE FROM comments WHERE comment_id= $array1[$i]";
                        mysqli_query($conn, $sql);
                        header('Location: comments.php?source=post_all_comments&post_id='.$post_id);
                        
                    break;
  

                    }

           }



        }

    ?>



    
 



    <form action="" method="post">
 


                <div id="bulkOptionsContainer" class="col-xs-4">

                    <select class="form-control" name="bulk_options" id="">

                        <option value="">SELECT OPTIONS</option>
                        <option value="approved">APPROVE</option>
                        <option value="unapproved">UN-APPROVE</option>
                        <option value="Delete">DELETE</option>
                        
                       

                        
                    </select>
                   
                </div>

    <div class="col-xs-4">

    <input type="submit" name="submit"  class="btn btn-success" onclick="return confirm('Do you want to apply this changes ?')" value="APPLY CHANGES">
   


    </div>


    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th><input type="checkbox" id="SelectAllCheckBoxes"></th>
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


                 <?php
                        
                        
            $sql = "SELECT * FROM comments WHERE comment_post_id = $post_id";
             $comment_data= mysqli_query($conn,$sql);


            ?>


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
                <td><input type="checkbox" class="checkboxes" name="checkboxArray[]" value="<?php echo $id; ?>"></td>
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

                
                <td><a href="comments.php?source=post_all_comments&post_id=<?php echo $post_id; ?>&approve=<?php echo $id;?>"><i class="fa fa-fw fa-check"></i>Approve</a></td>
                <td><a href="comments.php?source=post_all_comments&post_id=<?php echo $post_id; ?>&unapprove=<?php echo $id;?>"><i class="fa fa-fw fa-close"></i>Unapprove</a></td>
                <td><a  onclick="return confirm('Are you sure you want to Delete <?php ?>?')"  href="comments.php?source=post_all_comments&post_id=<?php echo $post_id; ?>&delete=<?php echo $id; ?>"><i class="fa fa-fw fa-trash"></i>Delete</a></td>
            

                                </tr>
                                </tbody>
                                <?php endwhile; ?>
                                </table>   
                        


            