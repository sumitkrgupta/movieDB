<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">MoviesDB</a>
    </div>
    
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav bg-dark" style="background-color: #212529;">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['fullname']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                <a href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-alt-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo2" class="collapse">
                    <li>
                        <a href="./posts.php"><i class="fas fa-fw fa-book-open"></i> View All Posts</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_post"><i class="fas fa-fw fa-plus-circle"></i> Add New Post</a>
                    </li>
                </ul>
            </li>
            <?php 
            if(isset($_SESSION['user_role'])) {
                if($_SESSION['user_role'] == 'admin') { ?>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-file"></i> Categories</a>
                    </li>
                    <?php
                }
            }
            ?>
            
            <?php
            if(isset($_SESSION['user_role'])) {
                if($_SESSION['user_role'] == 'admin') { ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-alt-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="./users.php"><i class="fas fa-fw fa-users"></i> View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user"><i class="fas fa-fw fa-user-plus"></i> Add New User</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
            }
            ?>
            <li>
                <a href="comments.php"><i class="fas fa-fw fa-comments"></i> Comments</a>
            </li>
            <li>
                <a href="profile.php"><i class="fas fa-fw fa-user"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
    
</nav>