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
                            Comments
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

    
    <?php include "includes/admin_scripts.php"; ?>
</body>

</html>