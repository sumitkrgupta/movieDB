<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
    
if(isset($_POST['login'])) {
    
    $username = mysqli_real_escape_string($connect, $_POST['user']);
    $password = mysqli_real_escape_string($connect, $_POST['pswd']);
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $user = mysqli_query($connect, $query);
    
    if(!$user) {
        die("No user found!");
    }
    
    while($row = mysqli_fetch_assoc($user)) {
        $userID = $row['user_id'];
        $userName = $row['username'];
        $userPass = $row['user_password'];
        $fullName = $row['fullname'];
        $userRole = $row['user_role'];
        $userEmail = $row['user_email'];
    }
    
    if($username === $userName && $password === $userPass) {
        $_SESSION['username'] = $userName;
        $_SESSION['fullname'] = $fullName;
        $_SESSION['user_role'] = $userRole;
        $_SESSION['email'] = $userEmail;
        
        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
        ?>
        <script>alert("Fields cannot be blank!")</script>
        <?php
    }
}

?>