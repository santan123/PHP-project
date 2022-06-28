<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/includes/token_gen.php";
require_once __DIR__ . "/config/dbcontroller.php";
$db = new dbcontroller();
$uniq_id = $_POST['uid'];
if (!isset($uniq_id)) {
    header("Location:view_student");
}
$result = $db->select_with_one_parameter("student", "uniq_id", $uniq_id);
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

                <form id="updateStudent-form">
                    <h3 class="text-primary text-center">UPDATE STUDENT</h3>
                    <div class="container w-100">
                        <div class="form-floating mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="admissionNo" class="form-control" id="floatingInput" value="<?= $result['admission_no'] ?>">
                                <label for="floatingInput">Admission Number</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="fname" class="form-control" id="floatingInput" value="<?= $result['first_name'] ?>">
                                <label for="floatingInput">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="Enter the student's Last Name" value="<?= $result['last_name'] ?>">
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
                            <input type="hidden" name="uniq_id" value="<?= $id ?>">
                            <input type="hidden" name="token" value="<?= $_SESSION['_token']; ?>">

                        </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" id="update-btn" class="btn btn-primary  py-3 w-50 mb-4">Update</button>
                    </div>
                </form>

            </div>
        </div>









        <?php
        require_once __DIR__ . "/includes/script.php";
        require_once __DIR__ . "/ajax/edit_student.php";
        ?>
</body>

</html>