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
                            Users
<!--                            <small><q>Author</q></small>-->
                        </h1>

                        <?php
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }

                        switch($source) {
                            case 'add_user':
                                include "includes/add_user.php";
                                break;
                            case 'edit_user':
                                include "includes/edit_users.php";
                                break;
                            case 100:
                                echo "nice 100";
                                break;
                            case 200:
                                echo "nice 200";
                                break;
                            default:
                                include "includes/view_users.php";
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