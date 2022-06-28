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

                <form id="addLevel-form">
                    <h3 class="text-primary text-center">ADD LEVEL</h3>
                    <div class="container w-100">
                        <div class="form-floating mb-3">
                            <input type="text" name="level" class="form-control" id="floatingInput">
                            <label for="floatingInput">Level</label>
                        </div>

                        <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">
                    </div>
                    <div class="text-center py-2">
                        <button type="submit" id="save-btn" class="btn btn-primary  py-3 w-50 mb-4">Register</button>
                    </div>
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
    require_once __DIR__ . "/ajax/add_level.php";
    ?>
</body>

</html>