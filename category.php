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
			    <?php
                if(isset($_GET['category'])) {
                    $catID = $_GET['category'];
                    $query = "SELECT (cat_title) FROM categories WHERE cat_id = $catID";
                    $category = mysqli_query($connect, $query);
                    $row = mysqli_fetch_assoc($category);
                }
                ?>
				<h2 class="pb-2 mt-3 mb-2 border-bottom text-secondary">
					Reviews<br>
                    <small class="text-dark"><b>Category:</b> <?php echo $row['cat_title']; ?></small>
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
                
                $query = "SELECT * FROM posts WHERE post_type = 'review' and post_cat_id = $catID";
                $count = mysqli_query($connect, $query);
                $postCount = mysqli_num_rows($count);
                $postCount = ceil($postCount / $perPage);
                
				$query = "SELECT * FROM posts WHERE post_type = 'review' and post_cat_id = $catID ORDER BY post_date DESC LIMIT $page1, $perPage";
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
					<h3 class="mt-3">
						<a class="text-info" href="post.php?p_id=<?php echo $postID; ?>"><?php echo $postTitle; ?></a>
					</h3>
					<h4><q><?php echo $postDesc ?></q></h4>
					<p>
						by <a href="profiles.php?user=<?php echo $postAuthor; ?>"><?php echo $postAuthor ?></a>
						<span class="float-right"><i class="far fa-clock"></i> Posted on <?php echo $postDate; ?></span>
					</p>

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
				
				<nav id="pagination" aria-label="Page navigation">
                  <ul class="pagination">
                    <?php
                    for($i = 1; $i <= $postCount; $i++) {
                        if($i == $page) {
                            echo "<li class='page-item active disabled'><a class='page-link active_link' aria-disabled='true' aria-pressed='true'>{$i}</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='category.php?page={$i}'>{$i}</a></li>";
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
