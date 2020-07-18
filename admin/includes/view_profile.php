<?php
$user = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$user'";
$users = mysqli_query($connect, $query);

if(!$users) {
    echo mysqli_error($connect);
}

while($row = mysqli_fetch_assoc($users)) {
    $userID = $row['user_id'];
    $userName = $row['username'];
    $name = $row['fullname'];
    $email = $row['user_email'];
    $image = $row['user_image'];
    $role = $row['user_role'];
}

?>

<div class="card">
    <div class="card-body">
        <div class="card-title mb-4">
            <div class="d-flex justify-content-start">
                <div class="image-container">
                    <img src="../images/users/<?php echo $image; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail">
                    <div class="middle"><br>
                        <a href="profile.php?source=edit_profile&u_id=<?php echo $userID; ?>"><input type="button" class="btn btn-info" id="btnChangePicture" value="Edit Profile"></a>
                        <a href="profile.php?source=change_password&u_id=<?php echo $userID; ?>"><input type="button" class="btn btn-danger" id="btnChangePicture" value="Change Password"></a>
                    </div>
                </div><br>
            </div>
        </div>

        <div class="row">
            <div class="col-11 offset-sm-1">
                <div class="tab-content mt-2 ml-1">
                    <div class="tab-pane show active" role="tabpanel" aria-labelledby="basicInfo-tab">
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label class="text-primary">Username</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $userName; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label class="text-primary">Name</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $name; ?>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label class="text-primary">Email</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $email; ?>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label class="text-primary">Role</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $role; ?>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>