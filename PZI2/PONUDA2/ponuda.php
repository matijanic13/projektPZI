<?php 
  session_start(); 
  include ('../../DB/db_connect.php');
  $db = dbConnect();

  if (!isset($_COOKIE['currentUser'])){
    header("location: ../POCETNA/pocetna.php");
  }
?>


<html>
    <html>
 <head>
    <meta charset="utf-8">
    <title>Ponuda</title>
    <link rel="stylesheet" href="ponuda.css">
</head>
<body>
    
    <div class="images">
        <a href ="/PZI/PZI2/KUHINJA2/kuhinja.html"><img src="slika1.jpg" class="slideFromLeft"></a>
        <a href ="/PZI/PZI2/DNEVNI BORAVAK2/dnevni.html"><img src="slika2.jpg" class="slideFromRight"></a>
    </div>

    <div class="images1">
        <a href ="/PZI/PZI2/SPAVACA SOBA2/dnevni.html"><img src="slika3.jpg" class="slideFromLeft"></a>
        <a href ="/PZI/PZI2/KUPAONICA2/kupaonica.html"><img src="slika4.jpg" class="slideFromRight">
    </div>

        <script type="text/javascript" src="ponuda.js"></script>
</body>


</html>