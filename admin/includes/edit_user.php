
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


move_uploaded_file($image_file,"../image/$image");  



if(empty($image)){

   
$sql = "SELECT * FROM posts where post_id= $id";
$select_image = mysqli_query($conn, $sql);




while ($row = mysqli_fetch_assoc($select_image)){


$post_image = $row['post_image'];



}



}








$sql  = "UPDATE posts SET post_title = '$title', post_category_id=$category, post_author= '$author',
        post_status='$status', post_tags= '$tags', post_image= '$image', post_content='$content' where post_id = $id";
$post_update = mysqli_query($conn,$sql);

header("Location: posts.php");

  

}




?> 



<?php while($row = mysqli_fetch_assoc($post_value)): ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control"  name="title"   value="<?php echo $row['post_title'];?>">
</div>

<div class="form-group">


<select name="category" >

<?php while($rowInner= mysqli_fetch_assoc($a)){ ?>

<option value="<?php echo $rowInner['cat_id']; ?>"><?php echo $rowInner['cat_title']; ?></option>
<?php } ?>

</select>

</div>



<div class="form-group">
<label for="title">Post Author</label>
<input type="text" class="form-control" name="author"  value="<?php echo $row['post_author'];?>">
</div>

<div class="form-group">
<label for="title">Post Status</label>
<input type="text" class="form-control"  value="<?php echo $row['post_status'];?>" name="post_status">
</div>

<div class="form-group">
<label for="title">Post Images</label>
<input type="file" name="image">
<img width="300 " src="../image/<?php echo $row['post_image']?>" alt="image">
</div>

<div class="form-group">
<label for="title">Post Tags</label>
<input type="text" class="form-control" name="post_tags" value="<?php echo $row['post_tags']; ?>">
</div>



<div class="form-group">
<label for="title">Post Content</label>
<textarea type="text" class="form-control" name="post_content"  id="" cols="30" rows="10" ><?php echo $row['post_content'];?>
</textarea>
</div>


<div class="form-group">

<input class="btn btn-primary"  type="submit" name="update_post"  value="Publish Post">


<?php endwhile; ?>
</div>
</form>