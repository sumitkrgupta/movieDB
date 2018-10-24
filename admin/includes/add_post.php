<?php
if(isset($_POST['create_post'])) {
	$post_title = $_POST['title'];
    $post_desc = $_POST['description'];
	$post_author = $_SESSION['username'];
	$post_category = $_POST['category'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
	$post_date = date('d-m-y');

	move_uploaded_file($post_image_temp, "../images/$post_image"); 

	$query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_desc, post_image, post_content)";
	$query .= "VALUES('{$post_category}', '{$post_title}', '{$post_author}', now(), '{$post_desc}', '{$post_image}', '{$post_content}')";

	$create_post_query = mysqli_query($connect, $query);

	if(!$create_post_query) {
		die("Post could not be added!". mysqli_error($connect));
	} else {
        ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Your post is added!
        </div>
        <?php
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div >
        <h3>Add Post</h3>
    </div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
		<label for="title">Description</label>
		<input type="text" class="form-control" name="description">
	</div>
	<div class="form-group">
		<label for="category">Category</label>&emsp;
		<select class="form-control" name="category">
            <option value="">--Select--</option>
		    <?php
            
            $query = "SELECT * FROM categories";
            $categories = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($categories)) {
                $catTitle = $row['cat_title'];
                $catID = $row['cat_id'];
                
                echo "<option value='$catID'>$catTitle</option>";
            
            }
            
            ?>
		</select>
	</div>
	<div class="form-group">
		<label for="image">Image</label>
		<input type="file" class="form-control-file" name="image" id="image">
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea rows="10" cols="30" class="form-control" name="content"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" id="" name="create_post" value="Publish Post">
	</div>
</form>