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
				<h2 class="pb-2 mt-3 mb-2 border-bottom text-muted">
					Trivia/Movie Facts<br>
<!--                    <small><b>Category:</b> <?php echo $row['cat_title']; ?></small>-->
				</h2>

				<?php
                
                $perPage = 4;
                
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "1";
                }
                
                if($page == "" || $page == 1) {
                    $page1 = 0;
                } else {
                    $page1 = ($page * $perPage) - $perPage;
                }
                
                $query = "SELECT * FROM posts WHERE post_type = 'trivia'";
                $count = mysqli_query($connect, $query);
                $postCount = mysqli_num_rows($count);
                $postCount = ceil($postCount / $perPage);
                
				$query = "SELECT * FROM posts WHERE post_type = 'trivia' ORDER BY post_date DESC LIMIT $page1, $perPage";
				$trivia = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($trivia) <= 0) {
                    echo "<blockquote class='blockquote'>Sorry, NO RESULTS!</blockquote>";
                }

				while($row = mysqli_fetch_assoc($trivia)) {
                    $triviaID = $row['post_id'];
					$triviaTitle = $row['post_title'];
					$triviaAuthor = $row['post_author'];
					$triviaDate = $row['post_date'];
					$triviaContent = substr($row['post_content'], 0, 400);
					?>

					<!-- Blog Post -->
					<h3 class="mt-3">
						<a class="text-info" href="post.php?p_id=<?php echo $triviaID; ?>"><?php echo $triviaTitle; ?></a>
					</h3>
					<p>
						by <a href="profiles.php?user=<?php echo $triviaAuthor; ?>"><?php echo $triviaAuthor ?></a>
						<span class="float-right"><i class="far fa-clock"></i> Posted on <?php echo $triviaDate; ?></span>
					</p>

					<hr>
                    <p><?php echo $triviaContent; ?>
                    <?php
                    if(strlen($row['post_content']) > 400) {
                        ?>
                        <a href="post.php?p_id=<?php echo $postID; ?>">...Read More</a>
                        <?php
                    }
                    ?>
                    </p>
                    
					<hr>    

				<?php } ?>
				
				<nav id="pagination" aria-label="Page navigation">
                  <ul class="pagination">
                    <?php
                    for($i = 1; $i <= $postCount; $i++) {
                        if($i == $page) {
                            echo "<li class='page-item active disabled'><a class='page-link' aria-disabled='true' aria-pressed='true'>{$i}</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='trivia.php?page={$i}'>{$i}</a></li>";
                        }
                    }
                    ?>
                  </ul>
                </nav>

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
