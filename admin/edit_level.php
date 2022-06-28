<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/includes/token_gen.php";
require_once __DIR__ . "/config/dbcontroller.php";
$db = new dbcontroller();
$id = $_POST['uid'];
if (!isset($id)) {
    header('Location:view_course');
}
$result = $db->select_with_one_parameter("level", "uniq_id", $id);
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
                <form id="updateLevel-form">
                    <h1 class="text-center text-primary">UPDATE LEVEL</h1>

                    <div class="form-floating mb-3">
                        <input type="text" name="studentLevel" class="form-control" id="floatingInput" value="<?= $result['student_level'] ?>">
                        <label for="floatingInput">Student Level</label>
                    </div>

                    <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">
                    <input type="hidden" name="uniq_id" value="<?= $id ?>">
                    <div class="text-center">
                        <button type="submit" id="update-Btn" class="btn btn-primary py-3 w-50 mb-4">Update</button>
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
    require_once __DIR__ . "/ajax/edit_level.php"
    ?>
</body>

</html>