<?php 


        if(isset($_POST['create_post'])){

            $title = $_POST['title'];
            $post_cat_id = $_POST['category_id'];
            $post_author = $_POST['author'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];  // from the array image , you can see the name
            $post_image_temp = $_FILES['image']['tmp_name']; // image location


            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');  // the date today, month and year
            // $post_comment_count = 4;

           
         move_uploaded_file($post_image_temp,"../image/$post_image");  // moving the file from the its source to the image folder (param: temp_folder, where it transfer)

            
            $sql = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) 
                    VALUES ( $post_cat_id,'$title', '$post_author',now(),'$post_image', '$post_content','$post_tags','$post_status' )";

            $create_posts = mysqli_query($conn,$sql);

            if(!$create_posts){

                die("QUERY FAILED.".mysqli_error($conn));


            }



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

        
        <?php $a= GetUsersData($conn);?>

        <?php while($row= mysqli_fetch_assoc($a)) : ?>
            <?php
                $user_id = $row['user_id'];
                $role= $row['user_role'];
                
            ?>

        <option value="<?php echo $user_id; ?>"><?php echo $role; ?></option>

        <?php endwhile; ?>

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
           
            <input class="btn btn-primary"  type="submit" name="add_user"  value="Add User">
        </div>
        </form>