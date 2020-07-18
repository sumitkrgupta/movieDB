<form action="" method="post">
    <div class="form-group">
        <label for="cat_title" class="form-label"><b>Edit Category</b></label>
        <?php
        if(isset($_GET['edit'])) {
            $catID = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $catID";
            $cat_edit = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($cat_edit)) {
                $catTitle = $row['cat_title'];
                $catID = $row['cat_id'];
                ?>
                <input value="<?php if(isset($catTitle)) {echo $catTitle;} ?>" class="form-control" type="text" name="cat_title">
            <?php } } ?>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update">
        <?php
        if(isset($_POST['update'])) {
            $updateTitle = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '$updateTitle' WHERE cat_id = {$catID} ";
            $updateCat = mysqli_query($connect, $query);
            if(!$updateCat) {
                die("<span class='text-info'>Sorry, category could not be updated!</span>");
            }
            header("Location: categories.php");
        }
        ?>
    </div>
</form>