<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if(isset($_SESSION['user_role'])) {
            $user = $_SESSION['fullname'];
            if($_SESSION['user_role'] == 'admin') {
                $query = "SELECT * FROM comments";
            } else {
                $query = "SELECT * FROM comments WHERE comment_author = '$user'";
            }
        }
        $comments = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($comments) <= 0) {
            ?>
        <blockquote class="blockquote"><strong>You haven't commented on any post!</strong></blockquote>
        <?php
        }

        while($row = mysqli_fetch_assoc($comments)) {
            $commentID = $row['comment_id'];
            $commentPost = $row['comment_post_id'];
            $commentAuthor = $row['comment_author'];
            $commentContent = $row['comment_content'];
            $commentDate = $row['comment_date'];

            echo "<tr>";
            echo "<td>$commentID</td>";
            echo "<td>$commentAuthor</td>";
            echo "<td>$commentContent</td>";
            
            $query = "SELECT * FROM posts WHERE post_id = $commentPost";
            $post = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($post)) {
                $postName = $row['post_title'];
                $postID = $row['post_id'];
                
                echo "<td><a href='../post.php?p_id=$postID'>$postName</a></td>";
            }
            
            echo "<td>$commentDate</td>";
            echo "<td><a class='text-danger' href='comments.php?delete={$commentID}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>


<!--<?php

if(isset($_GET['delete'])) {
    $comment = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$comment}";
    
    $delete_comment = mysqli_query($connect, $query);
    header("Location: comments.php");
}

?>-->