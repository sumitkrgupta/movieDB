<?php
if(isset($_POST['create_user'])) {
	$username = $_POST['user'];
    $name = $_POST['name'];
    $password = $_POST['pswd'];
	$email = $_POST['email'];
    $role = $_POST['role'];
	$user_image = $_FILES['image']['name'];
	$user_image_temp = $_FILES['image']['tmp_name'];
	$user_join = date('d-m-y');

	move_uploaded_file($user_image_temp, "../images/users/$user_image"); 

	$query = "INSERT INTO users(username, fullname, user_password, user_email, user_image, user_role, user_join_date) ";
	$query .= "VALUES('{$username}', '{$name}', '{$password}',  '{$email}', '{$user_image}', '{$role}', now())";

	$create_user_query = mysqli_query($connect, $query);

	if(!$create_user_query) {
		die("User can not be added!". mysqli_error($connect));
	}
    
    echo "<blockquote>User added sucessfully. <a href='./users.php'>View Users</a></blockquote>";
}

?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="fname">Full Name</label>
		<input type="text" class="form-control" name="name">
	</div>
	
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email">
	</div>
	
	<div class="form-group">
		<label for="user">Username</label>
		<input type="text" class="form-control" name="user">
	</div>
	
	<div class="form-group">
		<label for="pswd">Password</label>
		<input type="password" class="form-control" name="pswd">
	</div>
	
	<div class="form-group">
		<label for="category">Role</label>&emsp;
		<select class="form-control" name="role">
            <option value="">--Select--</option>
		    <?php
                echo "<option value='admin'>Admin</option>";
                echo "<option value='user'>User</option>";
            ?>
		</select>
	</div>

	<div class="form-group">
		<label for="image">Image</label>
		<input class="form-control-file" type="file" name="image">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" id="" name="create_user" value="Submit">
	</div>
</form>