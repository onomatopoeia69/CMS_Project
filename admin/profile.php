<?php include 'includes/admin_header.php';?>
<?php include 'functions.php'; ?> 


<?php 

    if(isset($_SESSION['username'])){
    
       $id =  $_SESSION['id'];
       $firstname =  $_SESSION['username'];
       $role = $_SESSION['role'];

    }

?>


 


    <div id="wrapper">


                    <!-- navigation -->
        <?php include "includes/admin_navigation.php"; ?>




            
                    
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            HELLO ADMIN
                            <small>

                            <?php if(isset($_SESSION['username'])){
                            
                            
                            echo $_SESSION['username']; 


                           }
                            
                            ?>

                                </small> </h1>



       <?php 


                if(isset($_POST['update_profile'])){


                    $firstname = $_POST['user_firstname'];
                    $lastname = $_POST['user_lastname'];
                    $username = $_POST['username'];
                    $role = $_POST['user_role'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    
          $sql = "UPDATE users SET username = '$username', password = '$password', user_firstname = '$firstname', user_lastname = '$lastname',
                user_role = '$role', email = '$email' WHERE user_id = $id";

                mysqli_query($conn, $sql);
                          
                }





       ?>







        <?php 


            $sql = "SELECT * FROM users WHERE user_id = $id ";

            $user_info = mysqli_query($conn, $sql);
        ?>


    <?php  while($row = mysqli_fetch_assoc($user_info)) :   ?>
        <?php 

           $username = $row['username'];
           $password = $row['password'];
           $firstname = $row['user_firstname'];
           $lastname = $row['user_lastname'];
           $email = $row['email'];
           $role = $row['user_role'];


      ?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">First Name</label>
<input type="text" class="form-control"  name="user_firstname"   value="<?php echo $firstname; ?>">
</div>


<div class="form-group">
<label for="title">Last Name</label>
<input type="text" class="form-control" name="user_lastname"  value="<?php echo $lastname;?>">
</div>


<div class="form-group">
<label for="title">Username</label>
<input type="text" class="form-control"  value="<?php echo $username;?>" name="username">
</div>



<div class="form-group">



<div class="form-group">


    <select name="user_role" >




    <option value="<?php echo $role; ?>"><?php echo $role; ?></option>



            <!-- condition if the user already a admin the option will be only subscriber -->

    <?php 
    
        if($role == "admin"): ?> 

           <option value="subscriber">subscriber</option>

            <?php else:?>

            <option value="admin">admin</option>

        <?php endif; ?>


    </select>

</div>



<div class="form-group">
<label for="title">Email</label>
<input type="text" class="form-control"  value="<?php echo $email;?>" name="email">
</div>

<div class="form-group">
<label for="title">Password</label>
<input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
</div>


<div class="form-group">

<input class="btn btn-primary"  type="submit" name="update_profile"  value="UPDATE PROFILE">



</div>
<?php endwhile; ?>
</form>


                            
            
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

      
        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php'; ?>