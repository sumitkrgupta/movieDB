<?php

$message = "";

if(isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $username = mysqli_real_escape_string($connect, $_POST['user']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['pswd']);
    
    if(!empty($username) && !empty($email) && !empty($password)) {
        
        $query = "INSERT INTO users(fullname, username, user_email, user_password, user_role, user_join_date) 
            VALUES('$name', '$username', '$email', '$password', 'user', now())";
        $add_user = mysqli_query($connect, $query);
        
        if(!$add_user) {
            ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>   
                <strong>Sorry!</strong> Sign up failed!
            </div>
            <?php
        }
    } else {
        ?>
        <script>alert("Fields cannot be empty!")</script>
        <?php
    }
}

?>