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
					<div class="col-sm-12">
						<h1 class="page-header">
							Your Profile
<!--							<small><q><?php echo $_SESSION['username']; ?></q></small>-->
						</h1>
						
						<?php
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }

                        switch($source) {
                            case 'edit_profile':
                                include "includes/edit_profile.php";
                                break;
                            default:
                                include "includes/view_profile.php";
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