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
			<div class="col-md-12">

				<?php
				if(isset($_GET['p_id'])) {
					$postId = $_GET['p_id'];
				}
				
				$query = "SELECT * FROM posts WHERE post_id = $postId";
				$posts = mysqli_query($connect, $query);

				while($row = mysqli_fetch_assoc($posts)) {
					$postTitle = $row['post_title'];
                    $postType = $row['post_type'];
					$postCategory = $row['post_cat_id'];
					$postAuthor = $row['post_author'];
					$postDate = $row['post_date'];
					$postImage = $row['post_image'];
					$postContent = $row['post_content'];
					$postDesc = $row['post_desc'];   
					?>

					<!-- Blog Post -->
					<h2 class="text-primary mt-3"> <?php echo $postTitle ?> </h2>
					<?php if($postType == 'review') { ?>
					<h4><q><?php echo $postDesc; ?></q></h4>
					<?php } ?>
					<p>
						by <a href="index.php"><?php echo $postAuthor ?></a>
					</p>
					<p><span class="far fa-clock"></span> Posted on <?php echo $postDate ?></p>

					<?php 
					if(strlen($postImage) > 0) {
					?>
						<center><img class="img-responsive" width="300px" src="images/<?php echo $postImage ?>" alt=""></center>
						<?php

					}
					?>
                    <br>
                    <?php
                    if($postType == 'trivia' || $postType == 'quote') {
                        ?>
                    <blockquote class="blockquote bg-light mb-4"><br><p class="pl-5 pr-4"><?php echo $postContent ?></p><br></blockquote>
                        <?php
                    } else {
                    ?>
					<p><?php echo $postContent ?></p>
					<hr>    

				<?php } } ?>
				
				<!-- Blog Comments -->
				<?php
                if(isset($_POST['create_comment'])) {
                    $postId = $_GET['p_id'];
                    
                    $author = $_POST['comment_author'];
                    $email = $_POST['comment_email'];
                    $commentContent = nl2br(htmlentities($_POST['comment_content'], ENT_QUOTES, 'UTF-8'));
                    
                    if(!empty($_POST['comment_author']) && !empty($_POST['comment_content'])) {
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email,                  comment_content, comment_date) ";
                        $query .= "VALUES ('$postId', '$author', '$email', '$commentContent', now())";

                        $comment = mysqli_query($connect, $query);

                        if(!$comment) {
                            die("<span class='text-info'>Sorry, comment could not be added!</span>");
                        }

                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $postId";
                        $comment_update = mysqli_query($connect, $query);
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>   
                            <strong>Error!</strong> Required fields cannot be empty!
                        </div>
                        <?php
                    }
                }
                
                ?>

				<!-- Comments Form -->
				<h3>Comments:</h3>
				<div class="card bg-light col-sm-8">
				    <div class="card-body">
				        <h4 class="card-title">Leave a Comment:</h4>
                        <form role="form" method="post" action="">
                            <div class="form-group">
                                <label for="comment_author">Name</label>
                                <input type="text" name="comment_author" class="form-control" rows="3">
                            </div>
                            <div class="form-group">
                                <label for="comment_email">Email<small class="text-secondary"> &#40;Optional&#41;</small></label>
                                <input type="email" name="comment_email" class="form-control" rows="3">
                            </div>
                            <div class="form-group">
                                <label for="comment_content">Your Comment</label>
                                <textarea name="comment_content" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        </form>
				    </div>
				</div>


				<!-- Posted Comments -->
				<div class="media mt-3 col-sm-8">
				<?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $postId and comment_status = 'Approved'        ORDER BY comment_id DESC";
                $comments = mysqli_query($connect, $query);
                if(mysqli_num_rows($comments) <= 0) {
                    echo "<blockquote>No comments yet. Be the first one to comment!</blockquote>";
                }else {
                    while($row = mysqli_fetch_assoc($comments)) {
                        $author = $row['comment_author'];
                        $comment = $row['comment_content'];
                        $date = $row['comment_date'];
                ?>

				<!-- Comment -->
					<a class="pull-left" href="#">
						<img class="media-object" src="http://placehold.it/64x64" alt="">
					</a>
					<div class="media-body ml-2">
						<h4 class="media-heading"><?php echo $author; ?>
							<small><?php echo $date; ?></small>
						</h4>
						<p><?php echo $comment; ?></p>
					</div>
				</div>

                <?php }} ?>
                
			</div>

		</div>
		<!-- /.row -->
		
		<!-- footer-->
		<?php include "includes/footer.php" ?>
		
	</div>
	<!-- /.container -->
	
	<?php include "includes/scripts.php"; ?>

</body>

</html>
