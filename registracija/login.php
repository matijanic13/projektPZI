<?php 
include('server.php');

if(isset($_COOKIE["currentUser"])) {
	header("location: ../PZI2/POCETNA/pocetna.php");
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Prijava</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <div class="header">
  	<h2>Prijava</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Korisničko ime</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Lozinka</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Prijavi se</button>
  	</div>
  	<p>
  		Niste član <br> <a href="register.php">Registriraj se</a>
  	</p>
  </form>
</body>
</html>