<?php
session_start();
$token = htmlspecialchars($_POST['token']);
if ($token != $_SESSION['_token']) {
    echo json_encode(
        [
            'status' => false,
            'message' => 'Bad request',
            'error'  => 'token'
        ]
    );
} else {
    require_once "../config/dbcontroller.php";
    $db = new dbcontroller();
    $response = $db->updateCourse($_POST);
}
