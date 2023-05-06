<?php
session_start();
require_once("../include/connection.php");
// print_r($_POST);
try {
    $sql = "UPDATE  category  SET title = ?, islive  = ? WHERE id = ?";
    $statement = $db->prepare($sql);
    $statement ->bindparam(1,$_POST['title']);
    $statement ->bindparam(2,$_POST['status']);
    $statement ->bindparam(3,$_POST['id']);
    $statement -> execute();
    echo 1;
} catch (PDOException $error) {
    LogError($error);
}
?>