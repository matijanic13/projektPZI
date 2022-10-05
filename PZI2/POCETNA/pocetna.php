<?php 
session_start();
include('../../DB/user_functions.php');

$hasRole = false;

if (isset($_GET['logout'])){
    clearCookie("currentUser", "/");
    clearCookie("currentUserRoleId", "/");
    header("location: pocetna.php");
    session_destroy();
    exit();
} 

if (isset($_COOKIE['currentUserRoleId'])){
    $hasRole = allowAccess('CRUD users');
}
?>

<html>
 <head>
        <meta charset="utf-8">
        <title>PROJEKT</title>
        <link rel="stylesheet" href="izgled.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo.png" class="logo">
            <ul>
                <li><a href ="\PZI\PZI2\O MENI2\omeni.html">O MENI</a></li>
                <?php  if ($hasRole==true) : ?>
                        <li><a href ="\PZI\PZI2\KORISNICI\users.php">KORISNICI</a></li>
                <?php endif ?>
                <?php  if (isset($_COOKIE["currentUser"])) : ?>
                        <li><a href ="?logout">ODJAVA</a></li>
                <?php endif ?>
            </ul>
        </div>
        <div class="content">
            <h1 class="fadeMove">ODABERITE NAJBOLJE ZA SVOJ DOM</h1>
            
                <p>OD IDEJE DO REALIZACIJE</p>
                <div>
                    <?php  if (isset($_COOKIE["currentUser"])) : ?>
                    <a href="\PZI\PZI2\PONUDA2\ponuda.php"><button type="button">PONUDA</button></a>
                    <?php endif ?>

                    <?php  if (!isset($_COOKIE["currentUser"])) : ?>
                        <a href="\PZI\registracija\login.php"><button type="button">PRIJAVI SE</button></a>
                    <?php endif ?>

                    
                </div>
         </div>
    </div>

        <script type="text/javascript" src="projekt.js"></script>
</body>