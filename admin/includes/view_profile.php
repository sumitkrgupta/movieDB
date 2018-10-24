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
<!--												<input type="file" style="display: none;" id="profilePicture" name="file" />-->
                    </div>
                </div><br>
                <!--<div class="userData ml-3">
                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">Some Name</a></h2>
                    <h6 class="d-block"><a href="javascript:void(0)">1,500</a> Video Uploads</h6>
                    <h6 class="d-block"><a href="javascript:void(0)">300</a> Blog Posts</h6>
                </div>-->
                <!--<div class="ml-auto">
                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                </div>-->
            </div>
        </div>

        <div class="row">
            <div class="col-11 offset-sm-1">
                <!--<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                    </li>
                </ul>-->
                <div class="tab-content mt-2 ml-1" id="myTabContent">
                    <div class="tab-pane show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Username</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $userName; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Name</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $name; ?>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Email</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $email; ?>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Role</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?php echo $role; ?>
                            </div>
                        </div>
                        <hr />

                    </div>
                    <!--<div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                        Facebook, Google, Twitter Account that are connected to this account
                    </div>-->
                </div>
            </div>
        </div>


    </div>

</div>