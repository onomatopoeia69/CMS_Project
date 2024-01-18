<?php 


        if(isset($_POST['create_user'])){

            $firstname = $_POST['user_firstname'];
            $lastname = $_POST['user_lastname'];
            $role = $_POST['user_role'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password= $_POST['user_password'];
            // $post_date = date('d-m-y');  // the date today, month and year
         
         

           
        //  move_uploaded_file($post_image_temp,"../image/$post_image");  // moving the file from the its source to the image folder (param: temp_folder, where it transfer)

            
            $sql = "INSERT INTO users (username, password, user_firstname, user_lastname, user_role, email, date) 
                    VALUES ('$username','$password', '$firstname','$lastname', '$role','$email',NOW() )";

            $create_users= mysqli_query($conn,$sql);

           echo "<script> alert('User Created!')</script>; ";

        }


        ?> 

<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">First Name</label>
            <input type="text" class="form-control" name="user_firstname">
        </div>


        <div class="form-group">
            <label for="title">Last Name</label>
            <input type="text" class="form-control" name="user_lastname">
        </div>


        <div class="form-group">


        <select name="user_role" >

            <option value="subscriber">SELECT OPTION</option>
            <option value="admin">ADMIN</option>
            <option value="subscriber">SUBSCRIBER</option>


            </select>

        </div>

       

        <div class="form-group">
            <label for="title">Username</label>
            <input type="text" class="form-control" name="username">
        </div>

        <div class="form-group">
            <label for="title">Post Images</label>
            <input type="file"  name="image">
        </div>

        <div class="form-group">
            <label for="title">Email</label>
            <input type="text" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" class="form-control" name="user_password">
        </div>


        
        <div class="form-group">
           
            <input class="btn btn-primary"  type="submit" name="create_user"  value="Add User">
        </div>
        </form>