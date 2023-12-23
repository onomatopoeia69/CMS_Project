


<?php       

if(isset($_POST['update_user'])){

$id = $_GET['edit'];
$username = $_POST['username'];
$user_firstname= $_POST['user_firstname']; 
$user_lastname = $_POST['user_lastname'];
$password= $_POST['password'];
$email = $_POST['email'];
$role = $_POST['user_role'];

// $image = $_FILES['image']['name'];
// $image_file = $_FILES['image']['tmp_name'];


// move_uploaded_file($image_file,"../image/$image");  



// if(empty($image)){

   
// $sql = "SELECT * FROM posts where post_id= $id";
// $select_image = mysqli_query($conn, $sql);




// while ($row = mysqli_fetch_assoc($select_image)){


// $post_image = $row['post_image'];



// }



$sql  = "UPDATE users SET user_firstname = '$user_firstname', user_lastname='$user_lastname', username= '$username',
        user_role='$role',email= '$email', password= '$password' WHERE user_id = $id";
$user_update = mysqli_query($conn,$sql);

header("Location: users.php");

  

}

?>





            <?php 

            if(isset($_GET['edit'])) {

                $id = $_GET['edit'];


            $sql = "SELECT * FROM users where user_id= $id";
            $user = mysqli_query($conn, $sql);


                }
            ?>




<?php while($row = mysqli_fetch_assoc($user)): ?>

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
<input type="text" class="form-control"  name="user_firstname"   value="<?php echo $username; ?>">
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




<!-- 
<div class="form-group">
<label for="title">Post Author</label>
<input type="text" class="form-control" name="author"  value="<">
</div> -->

<div class="form-group">
<label for="title">Email</label>
<input type="text" class="form-control"  value="<?php echo $email;?>" name="email">
</div>

<div class="form-group">
<label for="title">Password</label>
<input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
</div>


<div class="form-group">

<input class="btn btn-primary"  type="submit" name="update_user"  value="UPDATE USER">


<?php endwhile; ?>
</div>
</form>