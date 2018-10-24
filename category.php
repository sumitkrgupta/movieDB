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
			    <?php
                if(isset($_GET['category'])) {
                    $catID = $_GET['category'];
                    $query = "SELECT (cat_title) FROM categories WHERE cat_id = $catID";
                    $category = mysqli_query($connect, $query);
                    $row = mysqli_fetch_assoc($category);
                }
                ?>
				<h1 class="pb-2 mt-4 mb-2 border-bottom text-secondary">
					Reviews<br>
                    <small class="text-dark"><b>Category:</b> <?php echo $row['cat_title']; ?></small>
				</h1>

				<?php
                
				$query = "SELECT * FROM posts WHERE post_cat_id = $catID";
				$posts = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($posts) <= 0) {
                    die("Sorry, NO RESULTS!");
                }

				while($row = mysqli_fetch_assoc($posts)) {
                    $postID = $row['post_id'];
					$postTitle = $row['post_title'];
					$postCategory = $row['post_cat_id'];
					$postAuthor = $row['post_author'];
					$postDate = $row['post_date'];
					$postImage = $row['post_image'];
					$postContent = substr($row['post_content'], 0, 400);
					$postDesc = $row['post_desc'];   
					?>

					<!-- Blog Post -->
					<h2>
						<a href="post.php?p_id=<?php echo $postID; ?>"><?php echo $postTitle; ?></a>
					</h2>
					<h4><q><?php echo $postDesc ?></q></h4>
					<p>
						by <a href="index.php"><?php echo $postAuthor ?></a>
					</p>
					<p><span class="far fa-clock"></span> Posted on <?php echo $postDate; ?></p>

					<?php 
					if(strlen($postImage) > 0) {
						?>
						<center><img class="img-responsive" width="300px" src="images/<?php echo $postImage; ?>" alt=""></center>
						<?php

					}
                    ?>

					<hr>
                    <p><?php echo $postContent; ?></p>
                    <a href="post.php?p_id=<?php echo $postID; ?>">...Read More</a>
					<hr>    

				<?php } ?>

			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div>
		<!-- /.row -->
		
		<!-- footer-->
		<?php include "includes/footer.php" ?>
		
	</div>
    <!-- /.container -->
    
    <?php include "includes/scripts.php"; ?>

</body>

</html>
