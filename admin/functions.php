<?php 


            // insert categories in the database 

        function insertCat($conn){

            if(isset($_POST['add_category'])){
 
            $title = $_POST['cat_title'];
            $error= array();

                

            if(empty($title)){

            $error['cat_error']= "Please fill up the field.";
            return $error['cat_error'];

            }else{

                
             $sql ="INSERT INTO category (cat_title) VALUES ('$title')";
                $cat_title_query= mysqli_query($conn,$sql);

                    if(!$cat_title_query){

                        die('Query Failed'. mysqli_error($conn));

                    }


            }   

        }
     
    }

     // deleting the categories in the database


     function deleteCat($conn){

        
        if(isset($_GET['delete'])){

            $id = $_GET['delete'];


            $sql = "DELETE FROM category WHERE cat_id ='$id' ";
            $delete_cat = mysqli_query($conn, $sql);
            header("Location: categories.php");

            if(!$delete_cat){

                die('QUERY FAILED'.mysqli_error($conn));

            }

        }  

     }


     // getting the categories data 

     function GetCatData($conn){
                
        $sql = "SELECT * FROM category"; 
        $cat_query = mysqli_query($conn, $sql); 
        return $cat_query;

     }

     // Update the data when it click edit
     function UpdateEditCat($conn){

         

        if(isset($_POST['edit_category'])){

        $category = $_POST['edit_cat_title'];
        $id = $_GET['edit'];




        $sql = "UPDATE category SET cat_title= '$category' WHERE cat_id = $id";
        $cat_update = mysqli_query($conn, $sql);
        header('Location: categories.php');


            

        if(empty($cat_update)){

            die('query failed'.mysqli_error($conn));


        }
        }
    
     }


     function GetEditData($conn){

        if(isset($_GET['edit'])){

            $id = $_GET['edit'];
 
 
            $sql = "SELECT * FROM category WHERE cat_id = $id ";
                $select_categories_id= mysqli_query($conn, $sql);  
                return $select_categories_id;


          }
     }


      // getting the post data 

      function GetPostData($conn){
                
        $sql = "SELECT * FROM posts ORDER BY post_id DESC"; 
        $post_query = mysqli_query($conn, $sql); 
        return $post_query;

     }




    function confirm($result,$conn){

    if(!$result){

    die("QUERY FAILED.".mysqli_error($conn));


        }

        return $result;
    }

    // deleting the categories in the database


    function deletePost($conn){

        
        if(isset($_GET['delete'])){

            $id = $_GET['delete'];


            $sql = "DELETE FROM posts WHERE post_id ='$id' ";
            $delete_cat = mysqli_query($conn, $sql);
            header("Location: posts.php");

            if(!$delete_cat){

                die('QUERY FAILED'.mysqli_error($conn));

            }

        }  

     }


      function GetCommentData($conn){


        $sql = "SELECT * FROM comments";
        $comments_query = mysqli_query($conn,$sql);

        return $comments_query;


      }

      function deleteComment($conn){

        
        if(isset($_GET['delete'])){

            $id = $_GET['delete'];


            $sql = "DELETE FROM comments WHERE comment_id ='$id' ";
            $delete_cat = mysqli_query($conn, $sql);
    


            if(!$delete_cat){

                die('QUERY FAILED'.mysqli_error($conn));

            }


           

        }  

     }



     function UnapproveStatus($conn){

        if(isset($_GET['unapprove'])){

            $comment_id = $_GET['unapprove'];


            $sql = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id ";
            mysqli_query($conn, $sql);
            header("Location: comments.php");
        }

     }


     
     function ApproveStatus($conn){

        if(isset($_GET['approve'])){

            $comment_id = $_GET['approve'];


            $sql = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id ";
            mysqli_query($conn, $sql);
            header("Location: comments.php");
        }

     }


     function GetUsersData($conn){
                
        $sql = "SELECT * FROM users"; 
        $post_query = mysqli_query($conn, $sql); 
        return $post_query;

     }


     function deleteUser($conn){

        
        if(isset($_GET['delete'])){

            $id = $_GET['delete'];


            $sql = "DELETE FROM users WHERE user_id ='$id' ";
            $delete_cat = mysqli_query($conn, $sql);
            header("Location: users.php");

            if(!$delete_cat){

                die('QUERY FAILED'.mysqli_error($conn));

            }

        }  

     }


     function ChangetoAdmin($conn){


        if(isset($_GET['admin'])){

        $id = $_GET['admin'];

        $sql = "UPDATE users SET user_role ='admin' WHERE user_id = $id ";
        mysqli_query($conn,$sql);
        header("Location: users.php");

        }
       
     }


     
     function ChangetoSubscriber($conn){


        if(isset($_GET['subscriber'])){

        $id = $_GET['subscriber'];

        $sql = "UPDATE users SET user_role ='subscriber' WHERE user_id = $id ";
        mysqli_query($conn,$sql);
        header("Location: users.php");

        }
       
     }

     function Num_Posts($conn){


        

        $sql = "SELECT * FROM posts";
        $all_posts = mysqli_query($conn, $sql);

        $num_posts = mysqli_num_rows($all_posts);


        return $num_posts;

     }


