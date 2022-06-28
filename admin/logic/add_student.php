<?php
session_start();
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
    require_once "../config/dbcontroller.php";
    $db = new dbcontroller();
    $response = $db->addStudent($_POST);
}
