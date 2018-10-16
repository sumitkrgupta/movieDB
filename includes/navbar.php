<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	
	<div class="container">
		
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./index.php">MoviesDB</a>
		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
				
				<li><a href="admin/index.php">Admin</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
		
	</div>
	<!-- /.container -->
</nav>