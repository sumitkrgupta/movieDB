<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Tags</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM posts";
        $posts = mysqli_query($connect, $query);

        while($row = mysqli_fetch_assoc($posts)) {
            $postID = $row['post_id'];
            $postAuthor = $row['post_author'];
            $postTitle = $row['post_title'];
            $postCategory = $row['post_cat_id'];
            $postStatus = $row['post_status'];
            $postImage = $row['post_image'];
            $postComment = $row['post_comment_count'];
            $postTag = $row['post_tags'];
            $postDate = $row['post_date'];

            echo "<tr>";
            echo "<td>$postID</td>";
            echo "<td>$postAuthor</td>";
            echo "<td>$postTitle</td>";
            echo "<td>$postCategory</td>";
            echo "<td>$postStatus</td>";
            echo "<td><img width='100px' src='../images/$postImage' alt='image'></td>";
            echo "<td>$postComment</td>";
            echo "<td>$postTag</td>";
            echo "<td>$postDate</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$postID}'>Edit</a></td>";
            echo "<td><a class='text-danger' href='posts.php?delete={$postID}'>Delete</a></td>";
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