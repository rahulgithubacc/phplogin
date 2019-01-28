<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('Connection.php');
// include('registeruser.php');

class activate extends Connection{
public function activateuser($email,$hashh){
    $db = new Connection();
    // print_r($db);
    // exit();
    $stmt=$db->conn->prepare("UPDATE users SET activeuser=1 WHERE email='$email' AND hashh='$hashh'");
    // print_r($stmt);
    // exit();
    $stmt->execute();
    $result = $stmt->execute();
    // echo 123;
    // exit();
    if ($result)
    {
        return true;
    }
    else {
        return false;
    }
}
}

$obj = new activate();
$ob = $obj->activateuser($_GET['email'],$_GET['hashh']);
?>
<html>
<head><h1> Congragulations!!Your account has been activated.<br>NOW <a href="index.php">LOGIN</a></h1>
</head>
</html>