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


<div id="signup" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sign Up </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo $message; ?>
                <form role="form" action="index.php" method="post" id="login-form" autocomplete="off">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="text" name="user" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                 <div class="form-group">
                    <input type="password" name="pswd" id="key" class="form-control" placeholder="Password">
                </div>

                <input type="submit" name="signup" id="btn-login" class="btn btn-info btn-md" value="Sign Up">
            </form>
            </div>
        </div>
    </div>
</div>