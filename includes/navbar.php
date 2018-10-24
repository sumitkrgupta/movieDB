<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	
	<div class="container">
		
		<!-- Brand and toggle get grouped for better mobile display 
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>-->
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<nav class="navbar navbar-dark navbar-expand-sm fixed-top bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>&emsp;
                <a href="." class="navbar-brand mr-auto">MoviesDB&emsp;</a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class='nav-item'>
                            <a class='nav-link' href=reviews.php>Reviews</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=trivia.php>Trivia</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=quotes.php>Quotes</a>
                        </li>
                    </ul>
                    
                    <?php
                    if(isset($_SESSION['user_role'])) {
                        ?>
                            <span class="navbar-nav">
                                <a class="nav-link" href="admin/index.php">
                                    <i class="fas fa-user"></i><span class="d-none d-sm-inline">&nbsp;&nbsp;<?php echo $_SESSION['fullname']; ?></span></a>
                            </span>&emsp;
                            <?php
                    } else { ?>
                        <span class="navbar-nav">
                            <a class="nav-link" data-toggle="modal" data-target="#login">
                                <i class="fas fa-sign-in-alt"></i><span class="d-none d-sm-inline"> Login</span></a>
                        </span>&emsp;
                        <span class="navbar-nav">
                            <a class="nav-link" data-toggle="modal" data-target="#signup">
                            <i class="fas fa-user-plus"></i><span class="d-none d-sm-inline"> Sign Up</span></a>
                        </span>
                        <?php
                    }      
                    ?>
                    
                </div>
            </div>
        </nav>
        
        <?php include "includes/registration.php"; ?>
        
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
                        <form role="form" action="includes/registration.php" method="post" id="login-form" autocomplete="off">
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
                
                        <input type="submit" name="signup" id="btn-login" class="btn btn-info btn-lg" value="Register">
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md" role="content">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Login </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="includes/login.php">
                            <div class="form-group">
                                <input name="user" type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input name="pswd" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" id="" name="login" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		
		
		
		<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
                
				$query = "SELECT * FROM categories";
				$categories = mysqli_query($connect, $query);

				while($row = mysqli_fetch_assoc($categories)) {
					$catTitle = $row['cat_title'];
                    $catID = $row['cat_id'];
					echo "<li><a href='category.php?category=$catID'>$catTitle</a></li>";
				}

				?>
			</ul>
            
            <span class="nav navbar-nav">
                <a data-toggle="modal" data-target="#loginModal">
                <span class="fa fa-sign-in"></span> Login</a>
            </span>
            
            
		</div>-->
		<!-- /.navbar-collapse -->
		
	</div>
	<!-- /.container -->
</nav>