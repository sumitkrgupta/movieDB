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
			    <!--<?php
                if(isset($_GET['category'])) {
                    $catID = $_GET['category'];
                    $query = "SELECT (cat_title) FROM categories WHERE cat_id = $catID";
                    $category = mysqli_query($connect, $query);
                    $row = mysqli_fetch_assoc($category);
                }
                ?>-->
				<h1 class="pb-2 mt-4 mb-2 border-bottom text-muted">
					Trivia/Movie Facts<br>
<!--                    <small><b>Category:</b> <?php echo $row['cat_title']; ?></small>-->
				</h1>

				<?php
                
				$query = "SELECT * FROM posts WHERE post_type = 'trivia'";
				$trivia = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($trivia) <= 0) {
                    echo "<blockquote class='blockquote'>Sorry, NO RESULTS!</blockquote>";
                }

				while($row = mysqli_fetch_assoc($trivia)) {
                    $triviaID = $row['post_id'];
					$triviaTitle = $row['post_title'];
					$triviaAuthor = $row['post_author'];
					$triviaDate = $row['post_date'];
					$triviaContent = $row['post_content'];  
					?>

					<!-- Blog Post -->
					<h2>
						<a href="post.php?p_id=<?php echo $triviaID; ?>"><?php echo $triviaTitle; ?></a>
					</h2>
					<p>
						by <a href=#><?php echo $triviaAuthor ?></a>
					</p>
					<p><span class="far fa-clock"></span> Posted on <?php echo $triviaDate; ?></p>

					<hr>
                    <p><?php echo $triviaContent; ?></p>
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