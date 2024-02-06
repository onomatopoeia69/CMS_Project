<?php include 'includes/admin_header.php';?>
<?php include 'functions.php'; ?> 

 


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
                                        
                                    if(isset($_GET['source']) ){

                                    $source = $_GET['source']; 
                                    
                                    }      
                                    
                                    

                                    switch(isset($source)? $source: ''){

                                        

                                        case 'post_all_comments';
                                        include "includes/post_comments.php";
                                        break;

                        
                                        default:

                                        include 'includes/view_all_comments.php'; 

                                        break;

                                    }
                                       

                                        ?> 

            
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php'; ?>