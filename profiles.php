<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php ob_start(); ?>
<?php session_start(); ?>

<body>

	<!-- Navigation -->
	<?php include "includes/navbar.php"; ?>

	<!-- Page Content -->
	<div class="container">
    
        <?php
        if(isset($_GET['user'])) {
            $user = $_GET['user'];
            $query = "SELECT * FROM users WHERE username = '$user'";
            $users = mysqli_query($connect, $query);

            if(!$users) {
                echo mysqli_error($connect);
            }

            while($row = mysqli_fetch_assoc($users)) {
                $userID = $row['user_id'];
                $userName = $row['username'];
                $name = $row['fullname'];
                $email = $row['user_email'];
                $image = $row['user_image'];
                $role = $row['user_role'];
            }

        }
        ?>
	    
	    <div class="card mt-3">
            <div class="card-body">
                <div class="card-title mb-4">
                    <div class="d-flex justify-content-start">
                        <?php
                        $query = "SELECT * FROM posts WHERE post_author = '$userName'";
                        $postCount = mysqli_query($connect, $query);
                        $postCount = mysqli_num_rows($postCount);
                        ?>
                        <div class="image-container float-left">
                            <img src="images/users/<?php echo $image; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail">
                            <h4 class="mt-4 text-primary">Total Blog Posts: <small class="text-muted"><?php echo $postCount; ?></small></h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-11 offset-sm-1">
                        <div class="tab-content mt-2 ml-1" id="myTabContent">
                            <div class="tab-pane show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label class="text-primary">Username</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?php echo $userName; ?>
                                    </div>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label class="text-primary">Name</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?php echo $name; ?>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label class="text-primary">Email</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <?php echo $email; ?>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
		
		<!-- footer-->
		<?php include "includes/footer.php" ?>
		
	</div>
    <!-- /.container -->
    
    <?php include "includes/scripts.php"; ?>

</body>

</html>
