<div class="col-md-3">

	<!-- Blog Search Well -->
	<div class="card text-white bg-dark mt-3">
		<div class="card-body">
           <h4 class="card-title">Search</h4>
            <form method="post" action="search.php">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-secondary" type="submit">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                </div><!-- /.input-group -->
            </form> <!-- /.form -->
        </div>
	</div>
	
	<!-- Blog Categories Well -->
	<div class="card text-white bg-dark mt-3">

		<?php
		$query = "SELECT * FROM posts ORDER BY post_date DESC, post_title ASC LIMIT 4";
		$posts = mysqli_query($connect, $query);
		?>

		<div class="card-body">
		    <h4 class="card-title">Recent Posts</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        <?php
                        while($row = mysqli_fetch_assoc($posts)) {
                            $postID = $row['post_id'];
                            $postTitle = $row['post_title'];
                            $postDate = $row['post_date'];
                            ?>
                            <a class="text-info" href="post.php?p_id=<?php echo $postID; ?>"><b><?php echo $postTitle; ?></b><br></a>
                            <span>Posted on: <?php echo $postDate; ?></span>
                            <hr>
                            <?php
                        }

                        ?>
                    </ul>
                </div>
                <!-- ./col-lg-12 -->
            </div>
            <!-- /.row -->
		</div>
    
    </div> <!-- ./card -->
    
    
    <div class="card text-white bg-dark mt-3">

		<?php
		$query = "SELECT * FROM categories";
		$cats = mysqli_query($connect, $query);
		?>

		<div class="card-body">
		    <h4 class="card-title">Review Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        <?php
                        while($row = mysqli_fetch_assoc($cats)) {
                            $catID = $row['cat_id'];
                            $catTitle = $row['cat_title'];
                            
                            echo "<li class='mt-2'><a class='text-info' href='category.php?category=$catID'><b>$catTitle</b></a></li>";
                        }

                        ?>
                    </ul>
                </div>
                <!-- ./col-lg-12 -->
            </div>
            <!-- /.row -->
		</div>
    
    </div> <!-- ./card -->
    
    <!-- Side Widget Well 
    <?php include "widget.php" ?>-->

</div>