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
                            Categories
<!--                            <small><q>Author</q></small>-->
                        </h1>
                        </div>
                        
                        <!-- Show and Delete Categories -->
                        <div class="col-sm-6 mt-2">                            
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
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
                        <div class="col-sm-6 mt-2">
                            <?php addCategory(); ?>
                            <form action="" method="post">
                                <label for="cat_title" class="form-label"><b>Add Category</b></label>
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
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            
    <?php include "includes/admin_scripts.php"; ?>
</body>

</html>