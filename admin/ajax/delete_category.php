<?php
session_start();
require_once("../include/connection.php");

try {
    $sql = "DELETE FROM category WHERE id = ?";
    $statement = $db->prepare($sql);
    $statement -> bindparam(1,$_REQUEST['category_id']);
    $statement -> execute();
    echo 1;
} catch (PDOException $error) {
    LogError($error);
}
?>