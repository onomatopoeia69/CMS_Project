
   
   
   <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ADMIN</a>
            </div>
            <!-- Top Menu Items -->
            


            <ul class="nav navbar-right top-nav">
           
            
                <li><a href="../index.php">HOME</a></li>
                

             <?php       


                $num_online_users = users_online($conn);


             ?>


                <li><a href="../admin/online_users.php">NUMBER OF ONLINE: <?php echo $num_online_users;?></a></li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    
                    <?php if(isset($_SESSION['username'])){
                            
                            
                            echo $_SESSION['username']; 


                         }
                            
                            ?>

                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                      
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>



            </ul>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-pencil-square-o"></i> Post<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="posts.php?source=add_post"><i class="fa fa-fw fa-plus"></i>Add Post</a>
                            </li>
                            <li>
                                <a href="posts.php"><i class="fa fa-fw fa-eye"></i> View Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Users<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                            <a href="users.php?source=add_user"><i class="fa fa-fw fa-plus"></i>Add Users</a>
                            </li>
                            <li>
                            <a href="users.php"><i class="fa fa-fw fa-eye"></i> View Users</a>
                            </li>
                            <li>
                       
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-windows"></i> Categories</a>
                    </li>
                    <li class="active">
                        <a href="comments.php"><i class="fa fa-fw fa-comment"></i> Comments</a>
                    </li>
    
                    <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>