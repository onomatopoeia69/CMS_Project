<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <?php 

    if(isset($_POST["submit"])){

      
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $username = mysqli_real_escape_string($conn, $username);
                $email = mysqli_real_escape_string($conn, $email);
                $password = mysqli_real_escape_string($conn, $password);
                $error = array();

                // hashing algorithm
                $options = array( 'diff'=> 12);
                $password_hashed = password_hash($password,PASSWORD_BCRYPT,$options);



                if(empty($username)){   

                        $error['empty username'] = "*required to fill up";
    
                  }

                if (empty($email)){

                     $error['empty email'] = "*required to fill up";
          
                }
                if (empty($password)){


                    $error['empty password'] = "*required to fill up";
        
                }

                


                        if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)){


                            $error['email error'] = "email is not valid";


                        }

                                        
                                            if(empty($error)){


                                                $sql = "INSERT INTO users (username, password , email, user_role) 
                                                VALUES ('$username','$password_hashed','$email', 'subscriber')";
                                                mysqli_query($conn, $sql);

                                                header("Location: index.php");


                                            }

  
    }


    ?>




    <!-- Navigation -- >
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">


                            


                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" value= <?php echo isset($username) ? htmlspecialchars($username) : '' ; ?>>
                        </div>


                        <?php if(isset($error['empty username'])): ?>

                      
                            <p class='bg-danger'><?php echo htmlspecialchars($error['empty username']);?></p>


                            <?php endif; ?>



                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" 
                            value= "<?php echo isset($email) && empty($error['email error']) ? htmlspecialchars($email) : '' ; ?>">
                        </div>

                        <?php if(isset($error['empty email'])): ?>

                      
                            <p class='bg-danger'><?php echo htmlspecialchars($error['empty email']);?></p>


                            <?php endif; ?>


                        <?php if(isset($error['email error'])){?>

                        <p class='bg-danger'><?php echo htmlspecialchars($error['email error']); ?></p>


                        <?php  } ?>

                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" >
                        </div>
                        

                        <?php if(isset($error['empty password'])): ?>

                      
                        <p class='bg-danger'><?php echo htmlspecialchars($error['empty password']);?></p>


                        <?php endif; ?>

                                                 


                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
