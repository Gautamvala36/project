<?php
session_start();
require_once("include/connection.php");

try {
   
    $sql = "UPDATE salesman SET isdeleted = 0 WHERE id = ? ";
    $statement = $db->prepare($sql);
    $statement->bindparam(1, $_REQUEST['id']);
    $statement->execute();
    $_SESSION['message'] = "Salesmen Reject Successfully";
    header("location:add_saler.php");
} 
catch (PDOException $error) {

    LogError($error);
    header("location:add_saler.php");
}
?>