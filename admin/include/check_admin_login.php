<?php
session_start();
if (isset($_SESSION['id']) == false) {
    $_SESSION['message'] = "Login Please Collect";
    header("location:login.php");
    exit();
}
?>