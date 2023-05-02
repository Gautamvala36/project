<?php
session_start();
require_once("../include/connection.php");

try {
    $_SESSION['seller_id']=1;
    $sql = "SELECT * FROM category WHERE saleseman_id = ?";  
    $statement = $db->prepare($sql);
    $statement ->bindparam(1,$_SESSION['seller_id']);
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->execute();
    $table = $statement->fetchAll();
    // var_dump($table);
    $table = json_encode($table);
    echo $table;
} 
catch (PDOException $error) {
    LogError($error);
}
?>