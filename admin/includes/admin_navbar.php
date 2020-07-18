<nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark">
    <div class="container-fluid">
        <a href="../index.php" class="navbar-brand mr-auto"><i class="fas fa-lg fa-film"></i> MoviesDB&emsp;</a>
        <div class="navbar-nav dropdown">
            <a class="float-right nav-link btn dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user"></i><span class="d-none d-sm-inline">&nbsp;&nbsp;<?php echo $_SESSION['fullname']; ?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
            </div>
        </div>
    </div>
</nav>
    
<div class="sidebar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-alt-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse navbar-nav">
                <li class="nav-item">
                    <a href="./posts.php">&emsp;<i class="fas fa-fw fa-book-open"></i> View All Posts</a>
                </li>
                <li class="nav-item">
                    <a href="posts.php?source=add_post">&emsp;<i class="fas fa-fw fa-plus-circle"></i> Add New Post</a>
                </li>
            </ul>
        </li>
        <?php 
        if(isset($_SESSION['user_role'])) {
            if($_SESSION['user_role'] == 'admin') { ?>
                <li class="nav-item">
                    <a href="categories.php"><i class="fa fa-fw fa-list"></i> Categories</a>
                </li>
                <?php
            }
        }
        ?>

        <?php
        if(isset($_SESSION['user_role'])) {
            if($_SESSION['user_role'] == 'admin') { ?>
                <li class="nav-item">
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-alt-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse navbar-nav">
                        <li class="nav-item">
                            <a href="./users.php">&emsp;<i class="fas fa-fw fa-users"></i> View All Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="users.php?source=add_user">&emsp;<i class="fas fa-fw fa-user-plus"></i> Add New User</a>
                        </li>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
        <li class="nav-item">
            <a href="comments.php"><i class="fas fa-fw fa-comments"></i> Comments</a>
        </li>
        <li class="nav-item">
            <a href="profile.php"><i class="fas fa-fw fa-user"></i> Profile</a>
        </li>
    </ul>
</div>