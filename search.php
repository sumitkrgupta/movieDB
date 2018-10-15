<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<body>

	<!-- Navigation -->
	<?php include "includes/navbar.php"; ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-9">
				<h1 class="page-header">
                    Home <small>Search results for <q><?php echo $_POST['search']; ?></q></small> 
				</h1>
				
				<?php
				
				
				if(isset($_POST['submit'])) {
					$search = $_POST['search'];
					
					$query = "SELECT * FROM posts where post_tags LIKE '%$search%' ";
					$search_data = mysqli_query($connect, $query);
					
					/*if(!$search) {
						die("Query Failed!" . mysqli_error($connect));
					}*/
					
					$count = mysqli_num_rows($search_data);
					
					if($count == 0) {
						echo "<h4><b>NOTHING FOUND</b></h4><blockquote>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</blockquote>";
					} else {
						$posts = mysqli_query($connect, $query);
						
						while($row = mysqli_fetch_assoc($posts)) {
							$postTitle = $row['post_title'];
							$postCategory = $row['post_cat_id'];
							$postAuthor = $row['post_author'];
							$postDate = $row['post_date'];
							$postImage = $row['post_image'];
							$postContent = $row['post_content'];
							$postDesc = $row['post_desc'];   
							?>
							
							<!-- Blog Post -->
							<h2>
								<a href="#"><?php echo $postTitle ?></a>
							</h2>
							<h4><q><?php echo $postDesc ?></q></h4>
							<p>
								by <a href="index.php"><?php echo $postAuthor ?></a>
							</p>
							<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postDate ?></p>
							
							<?php 
							if(strlen($postImage) > 0) {
								?>
								<center><img class="img-responsive" width="300px" src="images/<?php echo $postImage ?>" alt=""></center>
								<?php
								
							} else {
								?>
								<img class="img-responsive" src="http://placehold.it/900x300" alt="">
							<?php } ?>
							
							
							
							
							<hr>
							<p><?php echo $postContent ?></p>
							<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

							<hr>    
							
						<?php } 
					}
				}
				?>
				

				

			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div>
		<!-- /.row -->
    
        <?php include "includes/footer.php" ?>
        
    </div>
    <!-- /.container -->
    
    <?php include "includes/scripts.php"; ?>

</body>

</html>
