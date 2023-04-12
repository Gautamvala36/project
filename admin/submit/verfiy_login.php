<?php
session_start();
require_once("../include/connection.php");

try {
    $page = "../login.php";
    var_dump($_POST);
    extract($_POST);
    $sql = "SELECT * FROM admin WHERE email=?";
    $statement = $db->prepare($sql);
    $statement -> bindparam(1,$email);
    $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $statement -> execute();
    $row = $statement->fetch();
    var_dump($row);
    if(empty($row)==true)
    {
        $_SESSION['message'] = "InValid Login Attempt";
    }
    else{
        if(password_verify($password,$row['password']) == true)
        {
            $_SESSION['message'] = "Login Successfully";
            $_SESSION['id'] = $row['id'];
            $page = "../add_saler.php";
        }
        else{
            $_SESSION['message'] = "InValid Login Successfully";
        }
    }
    header("location:$page");
} 
catch (PDOException $error) {
    LogError($error);
    header("location:../login.php");
}
?>