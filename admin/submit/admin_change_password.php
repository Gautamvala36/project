<?php 
require_once("../include/check_admin_login.php");
require_once("../include/connection.php");

try {
    $page = "../change_password.php";
    extract($_POST);
    if($newpassword == $confirmpassword)
    {
        echo "Both Password Are Same";
        $sql = "SELECT password FROM admin WHERE id = ? ";
        $statement = $db->prepare($sql);
        $statement -> bindparam(1,$_SESSION['id']);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $row = $statement->fetch();
        if(password_verify($oldpassword,$row['password'])==true)
        {
            $new_hased_password = password_hash($newpassword,PASSWORD_BCRYPT);
            echo " Password is correct";
            $sql = "UPDATE admin SET password = ? WHERE id = ?";
            $statement = $db->prepare($sql);
            $statement -> bindparam(1,$newpassword);
            $statement -> bindparam(2,$_SESSION['id']);
            $statement->execute();
            $_SESSION['message'] = "Password Successfully ";
            $page = "../login.php";
        }
        else {
            $_SESSION['message'] = " Password is wrong ";
        }
    }
    else{
        $_SESSION['message'] = "Both Password Are Not Same";

    }
    header("location:$page"); 
}
catch (PDOException $error) {
    LogError($error);
}
?>