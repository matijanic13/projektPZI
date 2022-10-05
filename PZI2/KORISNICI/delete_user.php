<?php 
include('../../DB/user_functions.php');
$db = dbConnect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $username = $_COOKIE["currentUser"];
    $sql = "DELETE FROM `users` WHERE `id`='$id' AND `username`!='$username'";
     $result = $db->query($sql);
     if ($result == TRUE) {
        header('location: users.php');
    }else{
        echo "Error:" . $sql . "<br>" . $db->error;
    }
} 

?>