<?php
session_start();
$token = htmlspecialchars($_POST['token']);
if (empty($token) || $token != $_SESSION['_token']) {
    echo json_encode(['status' => 0, 'msg' => 'Bad Request', 'error' => 'token']);
} else {
    require_once "../config/dbcontroller.php";
    $db = new dbcontroller();
    $result = $db->adminLogin($_POST);
    if ("success" == $result) {
        echo json_encode(['status' => 1, 'msg' => 'Login Successful']);
    } else {
        echo json_encode(['status' => 0, 'msg' => 'Server Error', 'error' => 'db']);
    }
}
