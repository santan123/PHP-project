<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/config/dbcontroller.php";
$db = new dbcontroller();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head start -->

<head>
    <?php
    require_once __DIR__ . "/includes/head.php";
    ?>

</head>
<!-- Head End -->

<body>
    <!-- Sidebar Start -->
    <?php
    require_once __DIR__ . "/includes/sidebar.php";
    ?>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <?php
        require_once __DIR__ . "/includes/navbar.php"
        ?>
        <!-- Navbar End -->

        <!-- Row Start -->
        <div class="row px-3">
            <div class="col-xl-3 col-md-6 my-4 ">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        Total Student
                    </div>
                    <?php
                    $rows = $db->rowCount("student");
                    if ($rows > 0) {
                        echo "<h4 class='mb-0 text-white mx-3'>" . $rows . "</h4>";
                    } else {
                        echo "<h4 class='mb-0 text-white mx-3'>" . "0" . "</h4>";
                    }
                    ?>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="view_student" class="small text-white stretched-link">View Details</a>
                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        Total Courses
                    </div>
                    <?php
                    $rows = $db->rowCount("course");
                    if ($rows > 0) {
                        echo "<h4 class='mb-0 text-white mx-3'>" . $rows . "</h4>";
                    } else {
                        echo "<h4 class='mb-0 text-white mx-3'>" . "0" . "</h4>";
                    }
                    ?>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="view_course" class="small text-white stretched-link">View Details</a>
                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-4">
                <div class="card bg-primary text-white mb-4 info-title">
                    Total Level
                    <div class="card-body info-content">
                        <?php
                        $rows = $db->rowCount("student");
                        if ($rows > 0) {
                            echo "<h4 class='mb-0 text-white mx-3'>" . $rows . "</h4>";
                        } else {
                            echo "<h4 class='mb-0 text-white mx-3'>" . "0" . "</h4>";
                        }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="view_level" class="small text-white stretched-link">View Details</a>
                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6 my-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body info-title">
                        Total Admin
                    </div>
                    <?php
                    $rows = $db->rowCount("admin");
                    if ($rows > 0) {
                        echo "<h4 class='mb-0 text-white mx-3'>" . $rows . "</h4>";
                    } else {
                        echo "<h4 class='mb-0 text-white mx-3'>" . "0" . "</h4>";
                    }
                    ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="#" class="small text-white stretched-link">View Details</a>
                        <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                    </div>

                </div>
            </div>

            <!-- End of row -->
        </div>





        <!-- Footer Start -->
        <?php
        require_once __DIR__ . "/includes/footer.php";
        ?>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="fa fa-arrow-circle-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
    require_once __DIR__ . "/includes/script.php";
    ?>
    <script>
        jqdoc
    </script>

</body>

</html>