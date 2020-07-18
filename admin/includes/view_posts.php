<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if(isset($_SESSION['user_role'])) {
            $user = $_SESSION['username'];
            if($_SESSION['user_role'] == 'admin') {
                $query = "SELECT * FROM posts";
            } else {
                $query = "SELECT * FROM posts WHERE post_author = '$user'";
            }
        }
        $posts = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($posts) < 1) {
            ?>
        <blockquote class="blockquote"><strong>You haven't posted anything! </strong><a href="posts.php?source=add_post">Add new post.</a></blockquote>
        <?php
        }

        while($row = mysqli_fetch_assoc($posts)) {
            $postID = $row['post_id'];
            $postAuthor = $row['post_author'];
            $postTitle = $row['post_title'];
            $postType = $row['post_type'];
            $postCategory = $row['post_cat_id'];
            $postImage = $row['post_image'];
            $postComment = $row['post_comment_count'];
            $postDate = $row['post_date'];

            echo "<tr>";
            echo "<td>$postID</td>";
            echo "<td>$postAuthor</td>";
            echo "<td>$postTitle</td>";
            
            if($postType == 'review') {
                $query = "SELECT * FROM categories WHERE cat_id = $postCategory";
                $categories = mysqli_query($connect, $query);
                while($row = mysqli_fetch_assoc($categories)) {
                    $catTitle = $row['cat_title'];
                    $catID = $row['cat_id'];
                }
            } else {
                $catTitle = "---";
            }
            
            echo "<td>$catTitle</td>";
            
            if(strlen($postImage) > 0) {
                echo "<td><img width='100px' src='../images/$postImage' alt='image'></td>";
            } else {
                echo "<td>NO IMAGE</td>";
            }
            echo "<td>$postComment</td>";
            echo "<td>$postDate</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$postID}'>Edit</a><br>";
            echo "<a onclick=\"javascript: return confirm('Delete the post?'); \" class='text-danger' href='posts.php?delete={$postID}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>


<?php
if(isset($_GET['delete'])) {
    $postID = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$postID}";
    
    $delete_post = mysqli_query($connect, $query);
    header("Location: posts.php");
}

?>