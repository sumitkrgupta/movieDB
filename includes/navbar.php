<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	
	<div class="container-fluid">
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>&emsp;
                <a href="." class="navbar-brand mr-auto"><i class="fas fa-lg fa-film"></i> MoviesDB&emsp;</a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto" id="nav">
                        <li class='nav-item mr-2'>
                            <a class='nav-link' href='reviews.php'><i class="fas fa-align-right"></i> Reviews</a>
                        </li>
                        <li class='nav-item mr-2'>
                            <a class='nav-link' href='trivia.php'><i class="fas fa-binoculars"></i> Trivia</a>
                        </li>
                        <li class='nav-item mr-2'>
                            <a class='nav-link' href='quotes.php'><i class="fas fa-quote-right"></i> Quotes</a>
                        </li>
                    </ul>
                    
                    <span class="navbar-nav mr-2">
                        <form method='get' action='search.php'>
                            <div class='input-group input-group-sm'>
                                <input name='search' type='text' class='form-control' placeholder="Search..">
                            </div>
                        </form>
                    </span>
                </div>
                
                <?php
                if(isset($_SESSION['user_role'])) {
                    ?>
                        <span class="navbar-nav">
                        <a class="nav-link" href="admin/posts.php?source=add_post">
                            <i class="fas fa-plus"></i><span class="d-none d-sm-inline"> Add Post</span></a>
                        </span>

                        <div class="navbar-nav dropdown">
                            <a class="nav-link btn dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-user"></i><span class="d-none d-sm-inline">&nbsp;&nbsp;<?php echo $_SESSION['fullname']; ?></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="admin/index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                        <?php
                } else { ?>
                    <span class="navbar-nav">
                        <a class="nav-link" data-toggle="modal" data-target="#login">
                            <i class="fas fa-sign-in-alt"></i><span class="d-none d-sm-inline"> Sign In</span></a>
                    </span>&nbsp;
                    <span class="navbar-nav">
                        <a class="nav-link" data-toggle="modal" data-target="#signup">
                        <i class="fas fa-user-plus"></i><span class="d-none d-sm-inline"> Sign Up</span></a>
                    </span>
                    <?php
                }      
                ?>
            </div>
        </nav>
        
        <?php include "includes/registration.php"; ?>
        
        
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