
    <?php 

            if(isset($_GET['edit'])) {

                $id = $_GET['edit'];


            $sql = "SELECT * FROM posts where post_id= $id";
            $post_value = mysqli_query($conn, $sql);


            }

    
    ?>

    <?php $a= GetCatData($conn);?>


    <?php       
    
            if(isset($_POST['update_post'])){

            $id = $_GET['edit'];
            $title = $_POST['title'];
            $category= $_POST['category']; 
            $author = $_POST['author'];
            $status = $_POST['post_status'];
            $image = $_FILES['image']['name'];
            $image_file = $_FILES['image']['tmp_name'];
            $tags = $_POST['post_tags'];
            $content = $_POST['post_content'];


           


            if(empty($image)){

               
            $sql = "SELECT * FROM posts where post_id= $id";
            $select_image = mysqli_query($conn, $sql);

           while ($row = mysqli_fetch_assoc($select_image)){


            $image = $row['post_image'];


            }}else{


            $image = $_FILES['image']['name'];

            }

            move_uploaded_file($image_file,"../image/$image");  


            $sql  = "UPDATE posts SET post_title = '$title', post_category_id=$category, post_author= '$author',
                    post_status='$status', post_tags= '$tags', post_image= '$image', post_content='$content' where post_id = $id";
            $post_update = mysqli_query($conn,$sql);


            echo "<p class='bg-success'>Successfully Updated. <a href='../post.php?post_id={$id}'>View Post</a>   <a href='posts.php'> Edit More Posts</a> </p>";
        
  
            }

        
            





    
    ?> 


    
<?php while($row = mysqli_fetch_assoc($post_value)): ?>
    <?php 

            $title = $row['post_title'];
            $post_tags= $row['post_tags'];
            $author = $row['post_author'];
            $post_status=  $row['post_status'];
            $image = $row['post_image'];
            $content = $row['post_content'];



    ?>

<form action="" method="post" enctype="multipart/form-data">
       
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control"  name="title"   value="<?php echo $title;?>">
        </div>

        <div class="form-group">


        <select name="category" >

        <?php while($rowInner= mysqli_fetch_assoc($a)): ?>

            <?php 

                $cat_id = $rowInner['cat_id']; 
                $cat_title =$rowInner['cat_title'];

               
             ?>


        <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>

        <?php endwhile; ?>

            </select>
        
        </div>

       

        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="author"  value="<?php echo $row['post_author'];?>">
        </div>




        <div class="form-group">


        <select name="post_status" >

        <?php 

            $sql = "SELECT * FROM posts";
            $recent_status = mysqli_query($conn, $sql);
            

        
           ?> 
      


      <option value="<?php echo  $post_status ;?>"><?php echo  $post_status ;?></option> 


        <?php if( $post_status == 'Published') : ?>    
            
          
        <option value="Draft">Draft</option>

        <?php else : ?>

        
        <option value="Published">Published</option>
        
        
       <?php endif; ?>
        
      
            </select>

        </div>


        <!-- <div class="form-group">
            <label for="title">Post Status</label>
            <input type="text" class="form-control"  value="<?php echo $post_status;?>" name="post_status">
        </div> -->

        <div class="form-group">
            <label for="title">Post Images</label>
            <input type="file" name="image">
            <img width="300 " src="../image/<?php echo $image?>" alt="image">
        </div>

        <div class="form-group">
            <label for="title">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
        </div>



        

        <div class="form-group">
            <label for="summernote">Post Content</label>
            <textarea type="text" class="form-control" name="post_content"  id="summernote" cols="30" rows="10" ><?php echo $content;?></textarea>
        </div>
       

        <div class="form-group">
           
            <input class="btn btn-primary"  type="submit" name="update_post"  value="Edit Post">

    
            <?php endwhile; ?>
        </div>
        </form>