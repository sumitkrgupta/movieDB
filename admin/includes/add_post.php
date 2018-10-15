<?php
if(isset($_POST['create_post'])) {
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category = $_POST['category'];
	$post_status = $_POST['status'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['tags'];
	$post_content = $_POST['content'];
	$post_date = date('d-m-y');
	$post_comment_count = 4;

	move_uploaded_file($post_image_temp, "../images/$post_image"); 

	$query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
	$query .= "VALUES('{$post_category}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

	$create_post_query = mysqli_query($connect, $query);

	if(!$create_post_query) {
		die("Post could not be added!");
	}
}

?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
		<label for="category">Post Category ID</label>
		<input type="text" class="form-control" name="category">
	</div>
	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>
	<div class="form-group">
		<label for="status">Post Status</label>
		<input type="text" class="form-control" name="status">
	</div>
	<div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input type="text" class="form-control" name="tags">
	</div>
	<div class="form-group">
		<label for="content">Post Content</label>
		<textarea rows="10" cols="30" class="form-control" name="content"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" id="" name="create_post" value="Publish Post">
	</div>
</form>