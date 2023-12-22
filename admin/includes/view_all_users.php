

       
        <?php $b = GetUsersData($conn); ?>
        <?php //deletePost($conn); ?>
 


        

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

                            <td><a href=users.php?approve=>Approve</a></td>
                            <td><a href=users.php?unapprove=>Unapprove</a></td>
                            <td><a href=users.php?delete=>Delete</a></td>
                            <td><a href=users.php?edit=>Edit</a></td>

                           
                        
                    </tr>
                     </tbody>
                    <?php endwhile; ?>
                    </table>   
                    


  