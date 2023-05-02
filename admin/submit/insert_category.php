<?php
session_start();
require_once("../include/connection.php");

try {
    $_SESSION['seller_id']=1; // this will not be fix it will be get from session when login is completed 
    extract($_POST);
    $sql = "INSERT INTO category (title,photo,islive,saleseman_id) VALUES (?,?,?,?)";
    $statement = $db->prepare($sql);
    $statement -> bindparam(1,$title);
    var_dump($_FILES);
    $image_name = rand(10,99) .rand(10,99) .rand(10,99) .$_FILES['image']['name'];
    echo $image_name;
    echo $image_path = "../images/category/".$image_name;
    move_uploaded_file($_FILES['image']['tmp_name'],$image_path); 
    $statement -> bindparam(2,$image_name);
    $statement -> bindparam(3,$status);
    $statement -> bindparam(4,$_SESSION['seller_id']);
    $statement -> execute();
    $_SESSION['message'] = "Category Insertd Successfully";
    header("location:../seller_add_category.php"); 
} 
catch (PDOException $error) {
    LogError($error);
}
?>