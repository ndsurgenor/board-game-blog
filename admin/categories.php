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
                            
                            <?php
                            
                            if(isset($_GET["edit"])) {
                                $cat_id = $_GET["edit"];
                                include "includes/edit-category.php";
                            } else {
                                include "includes/add-category.php";
                            }
                            
                            ?>

                            
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