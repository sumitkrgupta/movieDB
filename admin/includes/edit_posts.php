<?php
if(isset($_GET['p_id'])) {
    $pID = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$pID}";
$post = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($post)) {
    $postID = $row['post_id'];
    $postAuthor = $row['post_author'];
    $postTitle = $row['post_title'];
    $postDesc = $row['post_desc'];
    $postCategory = $row['post_cat_id'];
    $postImage = $row['post_image'];
    $postContent = strip_tags($row['post_content']);
    $postComment = $row['post_comment_count'];
    $postDate = $row['post_date'];
}

if(isset($_POST['update_post'])) {
    $post_title = $_POST['title'];
	$post_author = $_POST['author'];
    $post_desc = $_POST['description'];
	$post_category_id = $_POST['post_category'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));

	move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $pID";
        $image = mysqli_query($connect, $query);
        
        while($row = mysqli_fetch_array($image)) {
            $post_image = $row['post_image'];
        }
    }
    
    $query = "UPDATE posts SET ";
    $query .= "post_title = '$post_title', ";
    $query .= "post_desc = '$post_desc', ";
    $query .= "post_author = '$post_author', ";
    $query .= "post_cat_id = '$post_category_id', ";
    $query .= "post_date = CURRENT_TIMESTAMP(), ";
    $query .= "post_image = '$post_image', ";
    $query .= "post_content = '$post_content' ";
    $query .= "WHERE post_id = $pID";
    
    $update = mysqli_query($connect, $query);
    
    if(!$update) {
        die("<span class='text-danger'>Sorry, post could not be updated. Please try again!</span>". mysqli_error($connect));
    }
}

?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $postTitle; ?>">
	</div>
	<div class="form-group">
		<label for="author">Description</label>
		<input type="text" class="form-control" name="description" value="<?php echo $postDesc; ?>">
	</div>
	<div class="form-group">
		<label for="category">Category</label>&emsp;
		<select name="post_category">
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
		<label for="author">Author</label>
		<input type="text" class="form-control" name="author" value="<?php echo $postAuthor; ?>">
	</div>
	<div class="form-group">
        <label for="image">Image</label><br>
	    <img src="../images/<?php echo $postImage; ?>" width="100px" alt="image">
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea rows="10" cols="30" class="form-control" name="content"><?php echo $postContent; ?>
		</textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" id="" name="update_post" value="Update Post">
	</div>
</form>