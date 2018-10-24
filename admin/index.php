<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navbar.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <span class="text-primary"><?php echo $_SESSION['fullname']; ?> !</span>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
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
                                        <div class='huge'><?php echo $post_count; ?></div>
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
                    <?php
                    if(isset($_SESSION['user_role'])) {
                        if($_SESSION['user_role'] == 'admin') {
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <?php
                                                $query = "SELECT * FROM categories";
                                                $category_count = mysqli_num_rows(mysqli_query($connect, $query));
                                                ?>
                                                <div class='huge'><?php echo $category_count; ?></div>
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
                            <?php
                            
                        }
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['user_role'])) {
                        if($_SESSION['user_role'] == 'admin') {
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <?php
                                                $query = "SELECT * FROM users";
                                                $user_count = mysqli_num_rows(mysqli_query($connect, $query));
                                                ?>
                                                <div class='huge'><?php echo $user_count; ?></div>
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
                            <?php
                        }
                    }
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        if(isset($_SESSION['user_role'])) {
                                            $user = $_SESSION['username'];
                                            if($_SESSION['user_role'] == 'admin') {
                                                $query = "SELECT * FROM comments";
                                            } else {
                                                $query = "SELECT * FROM comments WHERE comment_author = '$user'";
                                            }
                                        }
                                        $comment_count = mysqli_num_rows(mysqli_query($connect, $query));
                                        ?>
                                        <div class='huge'><?php echo $comment_count; ?></div>
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
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <?php include "includes/admin_scripts.php"; ?>
</body>

</html>
