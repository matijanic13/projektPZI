<?php
function dbConnect() {
    $db = mysqli_connect('studnti.sum.ba', 'pzi262022', 'csdigital2022', 'pzi262022');
    return $db;
}

?>
