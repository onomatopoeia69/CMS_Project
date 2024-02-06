    <?php   include  'db.php'; ?>
    <?php session_start(); ?>
    

    <?php 



                if(isset($_POST['login']) ){


                    $username = mysqli_real_escape_string($conn,$_POST['username']);
                    $password = mysqli_real_escape_string($conn,$_POST['password']);

                    
                    $sql = "SELECT * FROM users WHERE username = '$username' ";
                    $user_query = mysqli_query($conn, $sql);

                 
                }
                ?>
              
               <?php  while($row = mysqli_fetch_assoc($user_query)){

            

                   $db_firstname =  $row['user_firstname'];
                   $db_lastname = $row['user_lastname'];
                   $db_role = $row['user_role'];
                   $db_password = $row['password'];
                   $db_username = $row['username'];
                   $db_email =  $row['email'];
                   $db_date = $row['date'];
                   $db_id = $row['user_id'];
                   
                   $password_hashed = password_verify($password,$db_password);
              

               }

                

                if ($username == $db_username && $password == $db_password  ||  $username == $db_username && $password_hashed === true ){


                        $_SESSION['id'] = $db_id;
                        $_SESSION['username'] = $db_username;
                        $_SESSION['role'] = $db_role;
                        
                        header("Location: ../admin");


                    }else{

                        header("Location: ../index.php");

                    }


             
              
            ?>

            




  