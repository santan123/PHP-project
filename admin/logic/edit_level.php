<?php
session_start();
$token = htmlspecialchars($_POST['token']);
if ($token != $_SESSION['_token']) {
    header("Location:../signin?msg=Unautorized");
} else {
    require_once "../config/dbcontroller.php";
    $db = new dbcontroller();
    $db->updateLevel($_POST);
}
