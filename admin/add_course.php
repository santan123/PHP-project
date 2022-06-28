<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/includes/token_gen.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once __DIR__ . "/includes/head.php";
    ?>
</head>

<body>

    <!-- Sidebar Start -->
    <?php
    require_once __DIR__ . "/includes/sidebar.php";
    ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content" id="top">
        <!-- Navbar Start -->
        <?php
        require_once __DIR__ . "/includes/navbar.php"
        ?>
        <!-- Navbar End -->

        <div class="container-fluid">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 ">

                <form id="addCourse-form">
                    <h3 class="text-primary text-center">ADD COURSE</h3>
                    <div class="container w-100">
                        <div class="form-floating mb-3">
                            <input type="text" name="courseName" class="form-control" id="floatingInput" placeholder="Enter the course name">
                            <label for="floatingInput">Course Name</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingcourseCode" name="courseCode" placeholder="Enter course code">
                            <label for="floatingcourseCode">Course Code</label>
                        </div>



                        <div class="form-floating mb-3">
                            <input type="integer" class="form-control" id="floatingcourseUnit" name="courseUnit" placeholder="Enter course unit">
                            <label for="floatingcourseUnit">Course Unit</label>

                            <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="save-btn" class="btn btn-primary  py-3 w-50 mb-4">Register</button>
                    </div>
                </form>

            </div>
        </div>


        <!-- Footer Start -->
        <?php
        require_once __DIR__ . "/includes/footer.php";
        ?>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
    require_once __DIR__ . "/includes/script.php";
    require_once __DIR__ . "/ajax/add_course.php";
    ?>
</body>

</html>