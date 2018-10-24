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
                            Comments
                        </h1>

                        <?php
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }

                        switch($source) {
                            case 'view_comments':
                                include "includes/add_post.php";
                                break;
                            default:
                                include "includes/view_comments.php";
                        }
                        ?>
                        <!-- <?php  ?> -->

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