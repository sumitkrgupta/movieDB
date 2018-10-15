<?php
if(isset($_GET['p_id'])) {
    $pID = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$pID}";
$posts = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($posts)) {
    $postID = $row['post_id'];
    $postAuthor = $row['post_author'];
    $postTitle = $row['post_title'];
    $postCategory = $row['post_cat_id'];
    $postStatus = $row['post_status'];
    $postImage = $row['post_image'];
    $postContent = $row['post_content'];
    $postComment = $row['post_comment_count'];
    $postTags = $row['post_tags'];
    $postDate = $row['post_date'];
}

?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $postTitle; ?>">
	</div>
	<div class="form-group">
		<label for="category">Post Category ID</label>
		<input type="text" class="form-control" name="category" value="<?php echo $postCategory; ?>">
	</div>
	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author" value="<?php echo $postAuthor; ?>">
	</div>
	<div class="form-group">
		<label for="status">Post Status</label>
		<input type="text" class="form-control" name="status" value="<?php echo $postStatus; ?>">
	</div>
	<div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input type="text" class="form-control" name="tags" value="<?php echo $postTags; ?>">
	</div>
	<div class="form-group">
		<label for="content">Post Content</label>
		<textarea rows="10" cols="30" class="form-control" name="content"><?php echo $postContent; ?>
		</textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" id="" name="create_post" value="Publish Post">
	</div>
</form>