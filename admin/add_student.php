<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/includes/token_gen.php";
?>
<!DOCTYPE html>
<html lang="en">

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

                <form id="addStudent-form">
                    <h3 class="text-primary text-center">ADD STUDENT</h3>
                    <div class="container w-100">
                        <div class="form-floating mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="admissionNo" class="form-control" id="floatingInput" placeholder="Enter the student's Matric No">
                                <label for="floatingInput">Admission Number</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="Enter the student's First Name">
                                <label for="floatingInput">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="Enter the student's Last Name">
                                <label for="floatingInput">Last Name</label>
                            </div>

                            <select name="level" class="form-select">
                                <?php $rows = $db->select_all('level');
                                foreach ($rows as $row) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['student_level'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>

                            <select name="course" class="form-select">
                                <?php $rows = $db->select_all('course');
                                foreach ($rows as $row) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>

                            <input type="file" name="passport" class="form-control">

                            <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">

                        </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" id="save-btn" class="btn btn-primary  py-3 w-50 mb-4">Register</button>
                    </div>
                </form>

            </div>
        </div>






        <?= (isset($_GET['msg'])) ? "{$_GET['msg']}" : "" ?>

        <form id="addStudent-form">
            <h1 class="text-center text-primary">ADD STUDENT</h1>

            <div class="form-floating mb-3">
                <input type="text" name="admissionNo" class="form-control" id="floatingInput" placeholder="Enter the student's Matric No">
                <label for="floatingInput">Admission Number</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="Enter the student's First Name">
                <label for="floatingInput">First Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="Enter the student's Last Name">
                <label for="floatingInput">Last Name</label>
            </div>

            <select name="level" class="form-select">
                <?php $rows = $db->select_all('level');
                foreach ($rows as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['student_level'] ?></option>
                <?php
                }
                ?>
            </select>
            <br>

            <select name="course" class="form-select">
                <?php $rows = $db->select_all('course');
                foreach ($rows as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <br>

            <input type="file" name="passport" class="form-control">

            <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">
            <br>
            <button type="submit" class="btn btn-primary py-3 w-100 mb-4" id="save-btn">Save</button>
        </form>



        <?php
        require_once __DIR__ . "/includes/script.php";
        require_once __DIR__ . "/ajax/add_student.php";
        ?>
</body>

</html>