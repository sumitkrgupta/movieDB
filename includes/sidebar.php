<div class="col-md-3 mt-9">
	
	<!-- Blog Search Well -->
	<div class="well">
		<h4>Search</h4>
		<form method="post" action="search.php">
			<div class="input-group">
				<input name="search" type="text" class="form-control">
				<span class="input-group-btn">
					<button name="submit" class="btn btn-default" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div><!-- /.input-group -->
		</form> <!-- /.form -->
	</div>
	
	<!-- Blog Categories Well -->
	<div class="well">

		<?php
		$query = "SELECT * FROM categories";
		$categories = mysqli_query($connect, $query);
		?>

		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-unstyled">
					<?php
					while($row = mysqli_fetch_assoc($categories)) {
						$catTitle = $row['cat_title'];
						echo "<li><a href='#'>$catTitle</a></li>";
					}

					?>
				</ul>
			</div>
            <!-- ./col-lg-12 -->
        </div>
        <!-- /.row -->
    
    </div> <!-- ./well -->
    
    <!-- Side Widget Well -->
    <?php include "widget.php" ?>

</div>