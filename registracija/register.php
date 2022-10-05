<?php 
include('server.php');

if(isset($_COOKIE["currentUser"])) {
	header("location: ../PZI2/POCETNA/pocetna.php");
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registracija</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <div class="header">
  	<h2>Registracija</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Korisničko ime</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Lozinka</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Potvrda lozinke</label>
  	  <input type="password" name="password_2">
  	</div>
	<div class="input-group">
  	  <label>Odaberite rolu</label>
		<select name="roles_id">
			<option value=1>Admin</option>
			<option value=2>Moderator</option>
	  	</select>
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registracija</button>
  	</div>
  	<p>
  		Već ste član? <br> <a href="login.php">Prijavite se</a>
  	</p>
  </form>
</body>
</html>
