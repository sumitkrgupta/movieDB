<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>

<body>
    
    <!-- Navigation -->
    <?php include "includes/admin_navbar.php"; ?>

        <div class="content">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="pb-2 mt-4 mb-2 border-bottom text-muted">
                        Welcome, 
                        <span class="text-primary"><?php echo $_SESSION['fullname']; ?>!</span>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row mt-2">
                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="card card-blue">
                        <div class="card-body">
                            <div class="row clearfix">
                                <div class="col-xs-3 float-left">
                                    &emsp;<i class="fa fa-file-alt fa-5x"></i>
                                </div>
                                <?php
                                if(isset($_SESSION['user_role'])) {
                                    $user = $_SESSION['username'];
                                    if($_SESSION['user_role'] == 'admin') {
                                        $query = "SELECT * FROM posts";
                                    } else {
                                        $query = "SELECT * FROM posts WHERE post_author = '$user'";
                                    }
                                }
                                $post_count = mysqli_num_rows(mysqli_query($connect, $query));
                                ?>
                                <div class="col-xs-6">
                                    <h3>&emsp;<?php echo $post_count; ?><br>
                                        <small>&emsp;Posts</small>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['user_role'])) {
                    if($_SESSION['user_role'] == 'admin') {
                        ?>
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="card card-red">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            &emsp;<i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <?php
                                            $query = "SELECT * FROM categories";
                                            $category_count = mysqli_num_rows(mysqli_query($connect, $query));
                                            ?>
                                            <h3>&emsp;<?php echo $category_count; ?><br>
                                                <small>&emsp;Categories</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="card-footer">
                                        <span class="float-left">View Details</span>
                                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php

                    }
                }
                ?>
                <?php
                if(isset($_SESSION['user_role'])) {
                    if($_SESSION['user_role'] == 'admin') {
                        ?>
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="card card-yellow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            &emsp;<i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $query = "SELECT * FROM users";
                                            $user_count = mysqli_num_rows(mysqli_query($connect, $query));
                                            ?>
                                            <h3><?php echo $user_count; ?><br>
                                                <small>&emsp;Users</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="card-footer">
                                        <span class="float-left">View Details</span>
                                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="col-lg-3 col-md-6 mb-2">
                    <div class="card card-green">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-3">
                                    &emsp;<i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <?php
                                    if(isset($_SESSION['user_role'])) {
                                        $user = $_SESSION['fullname'];
                                        if($_SESSION['user_role'] == 'admin') {
                                            $query = "SELECT * FROM comments";
                                        } else {
                                            $query = "SELECT * FROM comments WHERE comment_author = '$user'";
                                        }
                                    }
                                    $comment_count = mysqli_num_rows(mysqli_query($connect, $query));
                                    ?>
                                    <h3>&emsp;<?php echo $comment_count; ?><br>
                                        <small>&emsp;Comments</small>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    
    <?php include "includes/admin_scripts.php"; ?>
</body>

</html>
