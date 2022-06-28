<?php
session_start();
require_once "../config/dbcontroller.php";
$token = htmlspecialchars($_POST['token']);

if ($token != $_SESSION['_token']) {
    echo json_encode(
        [
            'status' => false,
            'msg' => 'Bad Request',
            'error' => 'Token'
        ]
    );
} else {
    $db = new dbcontroller();
    $uniq_id = $_POST['uid'];
    $db->delete_with_one_parameter("course", "uniq_id", $uniq_id);
}
