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

        
        if(isset($_SESSION['role'])){



            if($_SESSION['role'] == 'admin'){


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

        }  

     }




      function GetCommentData($conn){


        $sql = "SELECT * FROM comments ";
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


     function ResetViews($conn){

        
        if(isset($_GET['reset'])){

            $id = $_GET['reset'];


            $sql = "UPDATE posts SET post_view_counts = 0 WHERE post_id = $id ";
            $reset_views = mysqli_query($conn, $sql);   
            header("Location: posts.php");


            if(!$reset_views){

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


     function GetUsersDataLimit($conn, $per_page, $offset){
                
        $sql = "SELECT * FROM users LIMIT $offset,$per_page "; 
        $post_query = mysqli_query($conn, $sql); 
        return $post_query;

     }







     function redirect($location)

        {

        return header(header: "Location:" . $location);

        };




        function users_online($conn){
          // session id 
          $session  = session_id();

          // time = unix time stamp 
          $time = time();
          // seconds 
          $seconds = 70;

          // time out when the seconds elapsed
          $session_timeout = $time - $seconds;  


          // select * rows (time and session) when there is session in database
          $session_sql = "SELECT * FROM users_online WHERE session = '$session' ";
          $query = mysqli_query($conn, $session_sql);
          $users_session_count = mysqli_num_rows($query);
          
              // if user is not already registered or new user
              
          if($users_session_count == 0){

              //this will make a new session id
              $insert_session_sql = "INSERT INTO users_online (session, time) VALUES ('$session', $time)";
              mysqli_query($conn, $insert_session_sql);

          }else{
                  // if it is already existing it will set new time (the current time) in their session id
              $existing_session = "UPDATE users_online SET time= $time WHERE session = '$session' ";
              mysqli_query($conn, $existing_session);

          }

              // selecting all rows where the current time stamp is greater than the set timeout that indicate offline

              $users_online = "SELECT * FROM users_online WHERE time > $session_timeout";
              $online = mysqli_query($conn, $users_online);

                  while($user = mysqli_fetch_assoc($online)){

                      $_SESSION['online'] = $user['session'];

           }


          // delete the row where the time is less than the session timeout or offline
              $sql4="DELETE FROM users_online WHERE time < $session_timeout";
              mysqli_query($conn,$sql4);


              $online_sql = "SELECT * FROM users_online WHERE session != '$session' ";
                 $users_online_query = mysqli_query($conn, $online_sql);
                        $num_online_users = mysqli_num_rows($users_online_query);

                        return $num_online_users;

        }
      

      ?>
