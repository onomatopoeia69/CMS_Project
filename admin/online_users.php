<?php  include 'includes/admin_header.php'; ?>
<?php  include 'functions.php'; ?>


<?php include "includes/admin_navigation.php"; ?>


    

<div id="wrapper">

<div id="page-wrapper">

<div class="container-fluid">
<div class="row">
     <div class="col-lg-12">



        <?php

        $me_online = $_SESSION['online'];
        $online_sql = "SELECT * FROM users_online WHERE session != '$me_online' ";
        $users_online_query = mysqli_query($conn, $online_sql);

        $num_online_users = mysqli_num_rows($users_online_query);


        ?>


            <?php if($num_online_users == 0): ?>

        <h1><i class="fa fa-fw fa-sign-out"></i>NO ONLINE </h1>


        <?php else: ?>


            <h1><i class="fa fa-fw fa-user"></i> ONLINE: <?php echo $num_online_users; ?> </h1>


            <?php endif; ?>



     <table class="table table-bordered table-hover">

            

            <thead>

                <th>session</th>
                <th>time</th>

            </thead>


           

            
                
     
            <?php while($row= mysqli_fetch_assoc($users_online_query)): ?>
            <tr>

            

                <td><?php echo $row['session']; ?></td>
                <td><?php echo date('h:i:s', $row['time']);?></td>

            
                
                

               



            </tr>
                
            <?php endwhile; ?>

     </table>



     </div>
     </div>
</div>

</div>


</div>















<?php  include_once 'includes/admin_footer.php'; ?>


