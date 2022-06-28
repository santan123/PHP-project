<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/includes/token_gen.php";
require_once __DIR__ . "/config/dbcontroller.php";
$db = new dbcontroller();
if (!isset($_POST['uid'])) {
    header('Location:view_course');
}
$unique_id = $_POST['uid'];
$result = $db->select_with_one_parameter("course", "uniq_id", $unique_id);
?>
<!DOCTYPE html>
<html>

<!-- Head Start -->
<?php
require_once __DIR__ . "/includes/head.php";
?>
<!-- Head End -->

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

                <form id="updateCourse-form">
                    <h3 class="text-primary text-center">UPDATE COURSE</h3>
                    <div class="container w-100">
                        <div class="form-floating mb-3">
                            <input type="text" name="courseName" class="form-control" id="floatingInput" value="<?= $result['name'] ?>">
                            <label for="floatingInput">Course Name</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingcourseCode" name="courseCode" value="<?= $result['code'] ?>">
                            <label for="floatingcourseCode">Course Code</label>
                        </div>



                        <div class="form-floating mb-3">
                            <input type="integer" class="form-control" id="floatingcourseUnit" name="courseUnit" value="<?= $result['unit'] ?>">
                            <label for="floatingcourseUnit">Course Unit</label>

                            <input type="hidden" name="id" value="<?= $unique_id ?>">
                            <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="update-btn" class="btn btn-primary  py-3 w-50 mb-4">Update</button>
                    </div>
                </form>
                <!-- End of Form  -->
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
    require_once __DIR__ . "/ajax/edit_course.php";
    ?>
</body>

</html>