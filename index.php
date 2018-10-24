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
				<h1 class="pb-2 mt-4 mb-2 border-bottom">
					Home<br>
					<small class="text-muted">Top Posts</small>
				</h1>

				<?php
                
                $perPage = 4;
                
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }
                
                if($page == "" || $page == 1) {
                    $page1 = 0;
                } else {
                    $page1 = ($page * $perPage) - $perPage;
                }
                
                $query = "SELECT * FROM posts";
                $count = mysqli_query($connect, $query);
                $postCount = mysqli_num_rows($count);
                $postCount = ceil($postCount / $perPage);
                
				$query = "SELECT * FROM posts ORDER BY post_comment_count DESC LIMIT $page1, $perPage";
				$posts = mysqli_query($connect, $query);

				while($row = mysqli_fetch_assoc($posts)) {
                    $postID = $row['post_id'];
                    $postType = $row['post_type'];
					$postTitle = $row['post_title'];
					$postAuthor = $row['post_author'];
					$postDate = $row['post_date'];
					$postContent = substr($row['post_content'], 0, 400);
                    
                    if($postType == 'review') {
                        $postCategory = $row['post_cat_id'];
                        $postImage = $row['post_image'];
                        $postDesc = $row['post_desc'];
                    }
					?>

					<!-- Blog Post -->
					<h2 class="mt-4 text-secondary">
						<?php
                        if($postType == 'review') {echo 'Review: ';}
						elseif($postType == 'trivia') {echo 'Trivia: ';}
						else {echo 'Movie Quote: ';}
                        ?>
						<small class="text-muted"><a class="text-info" href="post.php?p_id=<?php echo $postID; ?>"><?php echo $postTitle; ?></a></small>
					</h2>
					<?php if($postType == 'review') { ?>
					<h5><q><?php echo $postDesc; ?></q></h5>
					<?php } ?>
					<p>
						by <a class="text-primary" href="index.php"><?php echo $postAuthor ?></a>&emsp;
                        <span class="float-right"><i class="far fa-clock"></i> <em>Posted on <?php echo $postDate; ?></em></span>
					</p>

					<?php 
					if($postType == 'review') {
                        if(strlen($postImage) > 0) {
                            ?>
                            <center><img class="img-responsive" width="300px" src="images/<?php echo $postImage ?>" alt=""></center>
                            <?php

                        }
                    }
                    ?>

					<hr>
                    <p><?php echo $postContent; ?></p>
                    <?php
                    $string = strip_tags($postContent);
                    if(strlen($string) > 400) {
                        ?>
                        <a href="post.php?p_id=<?php echo $postID;?>">...Read More</a>
                        <?php
                    }
                    ?>
					<hr>    

				<?php } ?>
				
				<nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <?php
                    for($i = 1; $i <= $postCount; $i++) {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
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
