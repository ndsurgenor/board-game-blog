<form action="" method="post">
    <div class="form-group">

        <?php // Display category in edit field
        if (isset($_GET["edit"])) {
            $edit_cat_id = $_GET["edit"];

            $queryTable = "SELECT * FROM category WHERE cat_id = {$edit_cat_id}";
            $queryEdit = mysqli_query($connection, $queryTable);

            while ($row = mysqli_fetch_assoc($queryEdit)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];
        ?>

                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" class="form-control" type="text" name="cat_title">
        <?php }
        }
        ?>

        <?php // Update category in table

        if (isset($_POST["update"])) {
            $update_cat_title = $_POST["cat_title"];

            $queryTable = "UPDATE category SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id}";
            $queryUpdate = mysqli_query($connection, $queryTable);
        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update">
    </div>
</form>