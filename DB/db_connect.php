<?php
function dbConnect() {
    $db = mysqli_connect('localhost', 'pzi262022', 'csdigital2022', 'pzi262022');
    return $db;
}

?>
