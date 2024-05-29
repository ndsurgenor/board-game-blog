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

                        <!-- Posts Table -->
                        <?php
                        
                        if(isset($_GET["source"])){
                            $source = $_GET["source"];
                        } else {
                            $source = "";
                        }

                        switch($source) {
                            case "add-post";
                            include "includes/add-post.php";
                            break;

                            default:
                            include "includes/read-posts.php";

                            break;
                        }
                        
                        ?>


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