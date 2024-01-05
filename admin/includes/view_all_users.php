

       
        


        

<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
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

                        <?php $b = GetUsersData($conn); ?>
                     <?php while($row_User = mysqli_fetch_assoc($b)):?>
                     


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
                            <td><a href=users.php?delete=<?php echo $id; ?>>Delete</a></td>
                            <!-- edit the user information -->
                            <td><a href=users.php?source=edit_user&edit=<?php  echo $id; ?>>Edit</a></td>

                           
                        
                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
                    


  