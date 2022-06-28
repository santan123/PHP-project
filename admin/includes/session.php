<?php
session_start();
if (isset($_SESSION['userId']) || isset($_COOKIE['userId'])) {
    if (empty($_SESSION['userId'])) {
        $_SESSION['userId'] = $_COOKIE['userId'];
    }
    //query database for the id
    $id = $_SESSION['userId'];
    require_once "config/dbcontroller.php";
    $db = new dbcontroller();
    $result = $db->select_with_one_parameter('admin', 'id', $id);
    if ($result == false) {
        header("Location:signin?unautorized");
    } else {
        $email = $result['email'];
    }
} else {
    header("Location:signin?unautorized");
}
