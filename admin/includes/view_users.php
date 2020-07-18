<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM users";
        $users = mysqli_query($connect, $query);

        while($row = mysqli_fetch_assoc($users)) {
            $userID = $row['user_id'];
            $user = $row['username'];
            $name = $row['fullname'];
            $email = $row['user_email'];
            $role = $row['user_role'];

            echo "<tr>";
            echo "<td>$userID</td>";
            echo "<td>$user</td>";
            echo "<td>$name</td>";
            
            /*$query = "SELECT * FROM categories WHERE cat_id = $postCategory";
            $categories = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($categories)) {
                $catTitle = $row['cat_title'];
                $catID = $row['cat_id'];
            }
            
            echo "<td>$catTitle</td>";*/
            
//            echo "<td><img width='100px' src='../images/$postImage' alt='image'></td>";
            echo "<td>$email</td>";
            echo "<td>$role</td>";
            echo "<td><a class='text-danger' href='users.php?delete={$userID}'>Delete</a></td>";
            echo "</tr>";
            /*echo "<td>$postDate</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$postID}'>Edit</a><br>";
            echo "<a class='text-danger' href='posts.php?delete={$postID}'>Delete</a></td>";
            echo "</tr>";*/
        }
        ?>

    </tbody>
</table>


<?php
if(isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$userId}";
    
    $delete_user = mysqli_query($connect, $query);
    header("Location: users.php");
}

?>