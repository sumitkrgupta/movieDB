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
				<h2 class="pb-2 mt-3 mb-2 border-bottom">
                    <small class="text-muted">Search results for <q><?php echo $_GET['search']; ?></q></small> 
				</h2>
				
				<?php
				
				
				if(isset($_GET['search'])) {
					$search = $_GET['search'];
                    
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

                    $query = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";
                    $count = mysqli_query($connect, $query);
                    $postCount = mysqli_num_rows($count);
                    $postCount = ceil($postCount / $perPage);
					
					$query = "SELECT * FROM posts where post_title LIKE '%$search%' ORDER BY post_date DESC LIMIT $page1, $perPage";
					$search_data = mysqli_query($connect, $query);
					
					/*if(!$search) {
						die("Query Failed!" . mysqli_error($connect));
					}*/
					
					$count = mysqli_num_rows($search_data);
					
					if($count == 0) {
						echo "<h4><b>NOTHING FOUND</b></h4><blockquote class='blockquote'>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</blockquote>";
					} else {
						$posts = mysqli_query($connect, $query);
						
						while($row = mysqli_fetch_assoc($posts)) {
                            $postID = $row['post_id'];
							$postTitle = $row['post_title'];
                            $postType = $row['post_type'];
							$postCategory = $row['post_cat_id'];
							$postAuthor = $row['post_author'];
							$postDate = $row['post_date'];
							$postImage = $row['post_image'];
							$postContent = substr($row['post_content'], 0, 400);
							$postDesc = $row['post_desc'];   
							?>
							
							<!-- Blog Post -->
							<h3 class="mt-3">
								<a class="text-info" href="post.php?p_id=<?php echo $postID; ?>"><?php echo $postTitle ?></a>
							</h3>
							<?php if($postType == 'review') { ?>
                            <h5><q><?php echo $postDesc; ?></q></h5>
                            <?php } ?>
							<p>
								by <a href="profiles.php?user=<?php echo $postAuthor; ?>"><?php echo $postAuthor ?></a>
								<span class="float-right"><i class="far fa-clock"></i> Posted on <?php echo $postDate; ?></span>
							</p>
							
							<?php 
							if(strlen($postImage) > 0) {
								?>
								<center><img class="img-responsive" width="300px" src="images/<?php echo $postImage ?>" alt=""></center>
								<?php
								
							}
				            ?>
							
							
							
							
							<hr>
							<p><?php echo $postContent ?></p>
							<a href="post.php?p_id=<?php echo $postID; ?>">...Read More</a>

							<hr>    
							
						<?php } 
					}
				}
				?>
				
				<?php
                if($postCount > 1) { ?>
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <?php
                        for($i = 1; $i <= $postCount; $i++) {
                            if($i == $page) {
                                echo "<li class='page-item active disabled'><a class='page-link' href='search.php?search=$search&page={$i}'>{$i}</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='search.php?search=$search&page={$i}'>{$i}</a></li>";
                            }
                        }
                        ?>
                      </ul>
                    </nav>
                    <?php
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
