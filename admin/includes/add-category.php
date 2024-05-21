<?php // Create category and add to table

if (isset($_POST["submit"])) {
    $cat_title = $_POST["cat_title"];

    if ($cat_title == "" || empty($cat_title)) {
        echo "This field cannot be left blank";
    } else {
        $query = "INSERT INTO category(cat_title)";
        $query .= "VALUE ('{$cat_title}')";

        $createCategory = mysqli_query($connection, $query);

        if (!$createCategory) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
}

?>

<!-- Create category form -->
<form action="" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Create">
    </div>
</form>