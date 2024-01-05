
<?php include 'includes/admin_header.php';?>
<?php include 'functions.php';?>

       
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
                            <small><?php echo $_SESSION['username']; ?></small>
                            </h1>
                    </div>
                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                    <?php 

                        $sql = "SELECT * FROM posts";
                        $all_posts = mysqli_query($conn, $sql);
                        $num_row_posts = mysqli_num_rows($all_posts);
                        
                    ?>

                  <div class='huge'><?php echo $num_row_posts; ?></div>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                         <?php 

                        $sql = "SELECT * FROM comments";
                        $all_comments = mysqli_query($conn, $sql);
                        $num_row_comments = mysqli_num_rows($all_comments);

                        ?>


                     <div class='huge'><?php echo $num_row_comments; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 

                    $sql = "SELECT * FROM users";
                    $all_users = mysqli_query($conn, $sql);
                    $num_row_users = mysqli_num_rows($all_users);

                    ?>


                    <div class='huge'><?php echo $num_row_users; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

                        $sql = "SELECT * FROM category";
                        $all_category = mysqli_query($conn, $sql);
                        $num_row_category = mysqli_num_rows($all_category);

                        ?>


                        <div class='huge'><?php echo $num_row_category; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->


                <div class="row">

        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],


            <?php

               
                $Element_text = array("Post", "Comments", "Users", "Categories");
                $Element_count = array($num_row_posts, $num_row_comments, $num_row_users, $num_row_category);


                for($i=0 ; $i<count($Element_text); $i++): ?>

                ["<?php echo $Element_text[$i]?>", <?php echo $Element_count[$i]?>, ],

               <?php endfor; ?>

         
    
        ]);

        var options = {
          chart: {
            title: 'CMS Statistic',
            subtitle: 'Pictographic Statistic <?php echo date('Y');?>',
          }
            };
      
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>



    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>




        </div>
 












            </div>
            <!-- /.container-fluid -->

        </div>

        


        <!-- /#page-wrapper -->
    <?php include 'includes/admin_footer.php'; ?>

   