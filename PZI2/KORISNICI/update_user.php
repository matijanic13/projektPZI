<?php 
include('../../DB/user_functions.php');
$conn = dbConnect();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roles_id = $_POST['roles_id']; 

    $password = md5($password);
    $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`roles_id`='$roles_id' WHERE `id`='$id'"; 
    $result = $conn->query($sql); 

    if ($result == TRUE) {
        header('location: users.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) 
{
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) 
    {        
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $roles_id = $row['roles_id'];
        } 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Korisnici</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
    </body>
        <div class="container">
        <h2>Ažuriraj korisničke podatke</h2>
        <form action="" method="post">
            <div class="form-group col-lg-2">
            Korisničko ime:
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>

            <div class="form-group col-lg-3">
            Email:
            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group col-lg-3">
            Lozinka:
            <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>

            <div class="form-group col-lg-2">
            Rola:
            <br><input type="radio" class="form-check-input" name="roles_id" value=1 <?php if($roles_id == 1){ echo "checked";} ?> >Admin
            <br>
            <input type="radio" class="form-check-input" name="roles_id" value=2 <?php if($roles_id == 2){ echo "checked";} ?>>Moderator
            </div>

            <br>
            <div class="form-group col-lg-1">
            <input type="submit" class="btn btn-primary mb-2" value="Uredi" name="update">
            </div>

            <div class="form-group col-lg-1">
            <a class="btn btn-danger mb-2" href="users.php">Odustani</a> 
            </div>

            
        </form> 
        </div>
    </body>
</html> 
<?php
    } else{ 
        header('Location: view.php');
    } 
}
?>