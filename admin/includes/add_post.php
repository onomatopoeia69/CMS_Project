<?php 


        if(isset($_POST['create_post'])){

            $title = $_POST['title'];
            $post_cat_id = $_POST['category_id'];
            $post_author = $_POST['author'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];  // from the array image , you can see the name
            $post_image_temp = $_FILES['image']['tmp_name']; // image location


            $post_tags = $_POST['post_tags'];
            $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
            // $post_date = date('Y-m-d',strtotime('now()')); // the date today, month and year
            // $post_comment_count = 4;

           
         move_uploaded_file($post_image_temp,"../image/$post_image");  // moving the file from the its source to the image folder (param: temp_folder, where it transfer)

            
            $sql = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) 
                    VALUES ( $post_cat_id,'$title', '$post_author',NOW(),'$post_image', '$post_content','$post_tags','$post_status' )";

            $create_posts = mysqli_query($conn,$sql);



            // this function get us the id of the last query that executed. see. above
            $post_id = mysqli_insert_id($conn);   
           

            echo "<p class='bg-success'>Successfully Updated .<a href='../post.php?post_id=$post_id'>View Post </a>.<a href='posts.php'> Edit More Posts</a> </p>";
        
          

            

            if(!$create_posts){

                die("QUERY FAILED.".mysqli_error($conn));

                
            }



        }




?> 

<form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">


        <select name="category_id" >

        
        <?php $a= GetCatData($conn);?>

        <?php while($row= mysqli_fetch_assoc($a)) : ?>

            <?php 

                $id = $row['cat_id'];
                $title=$row['cat_title'];

            ?>

        <option value="<?php echo $id; ?>"><?php echo $title;?></option>
        <?php endwhile; ?>

            </select>

        </div>

        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="author">
        </div>


                        
            <div class="form-group">


            <select name="post_status" >


            <option value="Published">Published</option>
            <option value="Draft">Draft</option>


                </select>

            </div>







        <!-- <div class="form-group">
            <label for="title">Post Status</label>
            <input type="text" class="form-control" name="post_status">
        </div> -->

        <div class="form-group">
            <label for="title">Post Images</label>
            <input type="file"  name="image">
        </div>

        <div class="form-group">
            <label for="title">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>

        <div class="form-group">
            <label for="summernote">Post Content</label>
            <textarea type="text" class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
           
            <input class="btn btn-primary"  type="submit" name="create_post"  value="Publish Post">
        </div>
        </form>