<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/config/dbcontroller.php";

?>

<!-- HTML start -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->

<head>
    <?php
    require_once __DIR__ . "/includes/head.php";
    ?>
    <link rel="stylesheet" href="jquery.dataTables.min.css">
</head>
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



        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">

                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4 text-center text-primary"> <u>
                                Courses </u> </h6>

                        <div class="table-responsive">
                            <table class="table table-bordered table-primary" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Course-Name</th>
                                        <th scope="col">Course-Code</th>
                                        <th scope="col">Course-Unit</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $db->select_all('course');
                                    if ($result !== false) :
                                        foreach ($result as $row) { ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['code']; ?></td>
                                                <td><?= $row['unit']; ?></td>
                                                <td>
                                                    <form action="<?= htmlspecialchars('edit_course'); ?>" method="POST">
                                                        <input type="hidden" name="token" value="">
                                                        <input type="hidden" name="uid" value="<?= $row['uniq_id'] ?>">
                                                        <button class="btn-primary" id="edit_btn">Edit</button>
                                                    </form>
                                                    <form method="POST" action="view_course">
                                                        <input type="hidden" name="uid" id="uid" value="<?= $row['uniq_id'] ?>">
                                                        <button class="btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete');">Delete</button>
                                                    </form>
                                                </td>

                                        <?php
                                        }
                                    endif;
                                        ?>
                                            </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->


        </table>

        <script src="jquery.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
        <?php
        if (isset($_POST['uid'])) {
            $db = new dbcontroller();
            $uniq_id = $_POST['uid'];
            $delete = $db->delete_with_one_parameter("course", "uniq_id", $uniq_id);
            $delete_decode = json_decode($delete, true);
            if ($delete_decode['status'] == true) { ?>
                <script>
                    swal("Course Deleted", "", "success");
                    var delay = 2000;
                    setTimeout(function() {
                        window.location.href = './view_course'
                    }, delay);
                </script>
            <?php } else { ?>
                <script>
                    swal("Course not Delete", "", "error");
                    var delay = 2000;
                    setTimeout(function() {
                        window.location.href = './view_course'
                    }, delay);
                </script>
        <?php }
        }
        ?>
</body>

</html>
<!-- HTML End  -->