




            <?php 
                
                    $sql  = "SELECT * FROM users ";
                    $all_users = mysqli_query($conn, $sql);
                    $users_row = mysqli_num_rows($all_users);
                    
                    $per_page = 5;
                    $count  = ceil( $users_row / $per_page);



            
            ?>
                <?php 


                        if(isset($_GET['page'])){


                            $page = $_GET['page'];     


                        }else{

                            $page = 0 ;

                        }

                        if($page == 0 || $page == 1){


                            $offset = 1;

                        }else{

                            $offset = ($page * $per_page) - $per_page;

                        }


                ?>




    <?php 
    

            if(isset($_POST['submit'])){


                $array2 = $_POST['checkboxArray'];

                for($i=0; $i<count($array2); $i++){


                    $options = $_POST['bulk_options'];



                    switch ($options){




                         case 'Admin':


                                $sql=" UPDATE users SET user_role = 'admin' WHERE user_id= $array2[$i]; ";  
                                $update_query = mysqli_query($conn, $sql); 
                                header("Location: users.php");

                                break;


                                case 'Subscriber':

                                        $sql=" UPDATE users SET user_role = 'subscriber' WHERE user_id= $array2[$i]; ";  
                                        $update_query = mysqli_query($conn, $sql); 
                                        header("Location: users.php");
        

                                        break;

                                            case 'Delete':

                                                $sql = "DELETE FROM users WHERE user_id = $array2[$i] ";
                                                $delete_query = mysqli_query($conn, $sql);
                                                header("Location: users.php");

                                                
                                                    break;

                                                    

                            }


                }

            }
    
     
    
    ?>







       
        

  <form action="" method="post">
 

 <table class="table table-bordered table-hover">
 
 
                 <div id="bulkOptionsContainer" class="col-xs-4">
 
                     <select class="form-control" name="bulk_options" id="">
 
                         <option value="">SELECT OPTIONS</option>
                         <option value="Admin">ADMIN</option>
                         <option value="Subscriber">SUBSCRIBER</option>
                         <option value="Delete">DELETE</option>
                         
 
                         
                     </select>
                    
                 </div>
 
     <div class="col-xs-4">
 
     <input type="submit" name="submit"  class="btn btn-success" onclick="return confirm('Do you want to apply this changes ?')" value="APPLY CHANGES">
     <a class="btn btn-primary" href="./users.php?source=add_user">ADD NEW</a>
    
    
                        <thead>
                            <tr>

                                <th><input type="checkbox" id="SelectAllCheckBoxes" ></th>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>     
                                <th>Role</th>
                                <th>Date</th>
                        
                            </tr>
                        </thead>
                   
                   
                   
                    <tbody>

                        <?php $users_data = GetUsersDataLimit($conn, $per_page, $offset); ?>
                     <?php while($row_User = mysqli_fetch_assoc($users_data)):?>
                     


                       <?php 
                                
                                $id= $row_User['user_id'];
                                $username= $row_User['username']; 
                                $firstname= $row_User['user_firstname']; 
                                $lastname= $row_User['user_lastname'];
                                $email= $row_User['email'];  
                                $role =$row_User['user_role'];
                                $date=$row_User['date'];
                                $image = $row_User['user_image'];
                                $password=$row_User['password'];
                            ?>
                            
                    <tr>


                            <td><input type="checkbox" class="checkboxes" name="checkboxArray[]" value="<?php echo $id; ?>"></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $username;?></td>
                            <td><?php echo $firstname;?></td>
                            <td><?php echo $lastname;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $role;?></td>
                            <td><?php echo date('M d Y',strtotime($date));?></td>
                                <!-- change into admin -->
                             <?php ChangetoAdmin($conn);    ?> 
                            <td><a href=users.php?admin=<?php  echo $id;    ?>>Admin</a></td>
                                <!-- change into subscriber -->
                            <?php ChangetoSubscriber($conn);    ?> 
                            <td><a href=users.php?subscriber=<?php  echo $id;   ?>>Subscriber</a></td>
                                <!-- delete the user -->
                            <?php deleteUser($conn); ?>
                            <td><a onclick="return confirm('Are you sure you want to Delete <?php ?>?')" href=users.php?delete=<?php echo $id; ?>>Delete</a></td>
                            <!-- edit the user information -->
                            <td><a href=users.php?source=edit_user&edit=<?php  echo $id; ?>>Edit</a></td>

                   
                        
                    </tr>
                     </tbody>
                    <?php endwhile; ?>


                    </table>   
                    
               
             <ul class="pager">


                        <li><?php echo isset($_GET['page']) ? $page : "1"; ?> of <?php echo $count; ?></li><br>

                
                <?php if($page > 1): ?>

                        
                            <li><a href="users.php?page=<?php echo $page - 1  ?>"> << </a></li>


                <?php endif; ?>

                <?php  for($i=1; $i <= $count ; $i++): ?>

                         <li><a href="users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                <?php endfor; ?>

                <?php   if($page < $count):    ?>


                         <li><a href="users.php?page=<?php echo isset($_GET['page'])? $page + 1 : $page + 2 ; ?>"> >> </a></li>

                <?php endif; ?>


                </ul>
 


  