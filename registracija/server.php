<?php
session_start();
include ('../DB/db_connect.php');

$username = "";
$email    = "";
$errors = array(); 
$db = dbConnect();

if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $roles_id = mysqli_real_escape_string($db, $_POST['roles_id']);
  
  if (empty($username)) { array_push($errors, "Upišite korisničko ime"); }
  if (empty($email)) { array_push($errors, "Upišite email"); }
  if (empty($password_1)) { array_push($errors, "Upišite lozinku"); }
  if ($password_1 != $password_2) {
    array_push($errors, "Lozinke se ne podudaraju");
  }
  if (empty($roles_id)) { array_push($errors, "Odaberite ovlasti korisnika"); }

 
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Korisničko ime već postoji");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email već postoji");
    }

  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);
  	$query = "INSERT INTO users (username, email, password, roles_id) 
  			  VALUES('$username', '$email', '$password', '$roles_id')";
  	mysqli_query($db, $query);

    setcookie("currentUser", $username, time() + 3600, "/");
    setcookie("currentUserRoleId", $roles_id, time() + 3600. ,"/");
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Uspješna registracija";
  	header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Upišite korisničko ime");
    }
    if (empty($password)) {
        array_push($errors, "Upišite lozinku");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $selectedUser = $results->fetch_assoc();
        if (mysqli_num_rows($results) == 1) {    
          setcookie("currentUser", $username, time() + 3600, "/");
          setcookie("currentUserRoleId", $selectedUser['roles_id'], time() + 3600. ,"/");
          $_SESSION['success'] = "Prijavljeni ste";
          header("Location: /PZI/PZI2/POCETNA/pocetna.php");
          exit();
        }else {
            array_push($errors, "Pogrešna kombinacija korisničkog imena/lozinke");
        }
    }
  }
  
  ?>
