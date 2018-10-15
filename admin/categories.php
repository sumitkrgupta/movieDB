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
                            Welcome to Admin Page
                            <small><q>Author</q></small>
                        </h1>
                        
                        <!-- Show and Delete Categories -->
                        <div class="col-12 col-sm-6">                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php showCategories(); ?>
                                    
                                    <?php deleteCategory(); ?>
                                </tbody>
                            </table> <!-- ./table -->
                        </div> <!-- col-xs-6 -->
                        
                        <!--Add Category-->
                        <div class="col-12 col-sm-6">
                            <?php addCategory(); ?>
                            <form action="" method="post">
                                <label for="cat_title" class="form-label">Add Category</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add">
                                </div>
                            </form>
                            
                            <!-- Edit Category-->
                            <?php
                            if(isset($_GET['edit'])) {
                                $catID = $_GET['edit'];
                                include "includes/edit_categories.php";
                            }
                            ?>
                        </div> <!-- ./col-xs-6 -->
                        
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