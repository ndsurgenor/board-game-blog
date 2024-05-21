<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php include "includes/header.php" ?>;

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/nav.php" ?>;

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

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

                            <!-- Update category form -->
                            <form action="" method="post">
                                <div class="form-group">

                                    <?php // Edit category in table
                                    if (isset($_GET["edit"])) {
                                        $edit_cat_id = $_GET["edit"];

                                        $queryTable = "SELECT * FROM category WHERE cat_id = {$edit_cat_id}";
                                        $queryEdit = mysqli_query($connection, $queryTable);

                                        while ($row = mysqli_fetch_assoc($queryEdit)) {
                                            $cat_id = $row["cat_id"];
                                            $cat_title = $row["cat_title"];
                                    ?>

                                            <input value="
                                            <?php
                                            if (isset($cat_title)) {
                                                echo $cat_title;
                                            }
                                            ?>" class="form-control" type="text" name="cat_title">

                                    <?php }
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Update">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <p>Current Categories</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php // Read categories and display in table
                                    $queryTable = "SELECT * FROM category";
                                    $queryCategories = mysqli_query($connection, $queryTable);

                                    while ($row = mysqli_fetch_assoc($queryCategories)) {
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];

                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "<td><a href='categories.php?edit={$cat_id}'>
                                            <button class='btn btn-warning btn-sm'>Edit</button></a></td>";
                                        echo "<td><a href='categories.php?delete={$cat_id}'>
                                            <button class='btn btn-danger btn-sm'>Delete</button></a></td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                    <?php // Delete category from table

                                    if (isset($_GET["delete"])) {
                                        $delete_cat_id = $_GET["delete"];

                                        $queryTable = "DELETE FROM category WHERE cat_id = {$delete_cat_id}";
                                        $queryDelete = mysqli_query($connection, $queryTable);

                                        header("Location: categories.php");
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>