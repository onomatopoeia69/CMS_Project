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
                
        $sql = "SELECT * FROM posts"; 
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