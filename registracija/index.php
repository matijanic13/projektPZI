<?php 
session_start();
include('../DB/user_functions.php');

if (isset($_GET['logout'])){
	clearCookie("currentUser", "/");
    clearCookie("currentUserRoleId", "/");
	header("location: ../PZI2/POCETNA/pocetna.php");
    session_destroy();
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="header">
	<h2>Registracija</h2>
</div>
<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Dobrodošao!  <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href=?logout style="color: red;">Odjavite se</a> </p>
		<p> <a href="../PZI2/POCETNA/pocetna.php" style="color: red;">Početna stranica</a> </p>
    <?php endif ?>
</div>	
</body>

</html>