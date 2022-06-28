<?php
$error = $_SERVER['REDIRECT_STATUS'];
$error_title = '';
$error_message = '';
if ($error == 404) {
    $error_title = '404 Page Not Found';
    $error_message = 'The Document/file requested was not found on this server.';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once __DIR__ . "/includes/head.php";
    ?>
</head>

<body>





    <!-- Content Start -->



    <!-- 404 Start -->
    <div class="container-fluid">
        <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
            <div class="col text-center p-4">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h1 class="display-1 fw-bold">404</h1>
                <h1 class="mb-4"><?= $error_title ?></h1>
                <p class="mb-4"><?= $error_message ?></p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="sigin">Go Back To Home</a>
            </div>
        </div>
        <!-- 404 End -->



    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
    require_once __DIR__ . "/includes/script.php"
    ?>
</body>

</html>