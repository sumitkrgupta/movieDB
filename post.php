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
					<h2 class="text-info mt-3"> <?php echo $postTitle ?> </h2>
					<?php if($postType == 'review') { ?>
					<h4><q><?php echo $postDesc; ?></q></h4>
					<?php } ?>
					<p>
						by <a href="profiles.php?user=<?php echo $postAuthor; ?>"><?php echo $postAuthor ?></a>
						<span class="float-right"><i class="far fa-clock"></i> Posted on <?php echo $postDate; ?></span>
					</p>
					<hr>

					<?php 
					if(strlen($postImage) > 0) {
					?>
						<center><img class="img-responsive mt-2" width="300px" src="images/<?php echo $postImage ?>" alt=""></center>
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
                    <hr>
					<p><?php echo $postContent ?></p>
					<hr>    

				<?php } } ?>
				
				<!-- Blog Comments -->
				<?php
                if(isset($_POST['create_comment'])) {
                    $postId = $_GET['p_id'];
                    
                    if(isset($_SESSION['username'])) {
                        $author = $_SESSION['fullname'];
                    } else {
                        $author = $_POST['comment_author'];
                    }
                    $commentContent = nl2br(htmlentities($_POST['comment_content'], ENT_QUOTES, 'UTF-8'));
                    
                    if(!empty($author) && !empty($commentContent)) {
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_content,                comment_date) ";
                        $query .= "VALUES ('$postId', '$author', '$commentContent', now())";

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
				<div class="card bg-light col-sm-8 mb-3">
				    <div class="card-body">
				        <h4 class="card-title">Leave a Comment:</h4>
                        <form role="form" method="post" action="">
                            <?php
                            if(!isset($_SESSION['username'])) { ?>
                                <div class="form-group">
                                    <label for="comment_author">Name</label>
                                    <input type="text" name="comment_author" class="form-control" rows="3">
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="comment_content">Your Comment</label>
                                <textarea name="comment_content" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        </form>
				    </div>
				</div>


				<!-- Posted Comments -->
                    <?php
                    $query = "SELECT * FROM comments WHERE comment_post_id = $postId ORDER BY comment_id DESC";
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
                <div class="media col-sm-8">
				    <div class="media-body">
                        <div class="float-left mr-3">
                            <img class="media-object" src="images/person.png" width="64px" alt="">
                        </div>
                        <div>
                            <h4 class="media-heading"><?php echo $author; ?>
                                <small><?php echo $date; ?></small>
                            </h4>
                            <p><?php echo $comment; ?></p>
                        </div>
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
