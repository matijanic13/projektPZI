<?php
include('db_connect.php');

function clearCookie($cookieName, $path) {
    setcookie($cookieName, "", time()-3600, $path);
    unset($_COOKIE[$cookieName]);
    unset($_SESSION['username']);
    unset($_SESSION['hasRole']);
}

function getUserPerm($userRoleId) {
    $db = dbConnect();
    $get_user_perm = "SELECT title FROM permissions WHERE id IN 
    (SELECT DISTINCT permissions_id 
    FROM roles_permissions WHERE roles_id = '$userRoleId')";
    $perm_query = mysqli_query($db, $get_user_perm);
    return $perm_query;
}


function allowAccess($comparePerm){
    $roleId=$_COOKIE['currentUserRoleId'];
    $currentUserPerm = getUserPerm($roleId);
    
    while ($row = $currentUserPerm->fetch_assoc()) {
        if ($row['title'] == $comparePerm){
            return true;
        }
    }

    return false;
}

?>