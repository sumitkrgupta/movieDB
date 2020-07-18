<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>

<body>

        <!-- Navigation -->
        <?php include "includes/admin_navbar.php"; ?>
           
            <div class="content">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="pb-2 mt-4 mb-2 border-bottom">
                            Users
<!--                            <small><q>Author</q></small>-->
                        </h1>
                    </div>
                    
                    <div class="col-sm-12 mt-2">
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
    
    <?php include "includes/admin_scripts.php"; ?>
</body>

</html>