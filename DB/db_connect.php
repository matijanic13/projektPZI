<?php
function dbConnect() {
    $db = mysqli_connect('localhost', 'root', '', 'projektpzi');
    return $db;
}

?>