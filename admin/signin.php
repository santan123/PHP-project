<?php
session_start();
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
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form id="signin-form">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">

                                <input type="password" class="form-control" id="password" name="password" placeholder="********">

                                <span>
                                    <i id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></i>
                                </span>

                                <label for="password">Password</label>
                            </div>

                            <a href="">Forgot Password</a>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn text-center btn-primary py-3 w-50 mb-4" id="signin-btn">LogIn
                                </button>
                            </div>
                    </div>


                    <input type="hidden" name="token" value="<?= $_SESSION['_token'] ?>">
                    </form>
                    <!-- <p class="text-center mb-0">Don't have an Account? <a href="signup">Sign Up</a></p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <?php
    require_once __DIR__ . "/includes/script.php";
    require_once __DIR__ . "/ajax/signin.php";
    ?>

    <script type="text/javascript">
        $(function() {
            $("#toggle_pwd").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
    </script>

</body>

</html>