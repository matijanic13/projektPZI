<?php 
include('../../DB/user_functions.php');
$db = dbConnect();
$sql = "SELECT * FROM users";
$result = $db->query($sql);

$hasRole = false;

if (isset($_COOKIE['currentUserRoleId'])){
    $hasRole = allowAccess('CRUD users');

    if(empty($hasRole) === true){
        header("location: ../POCETNA/pocetna.php");
    }
}else {
    header("location: ../POCETNA/pocetna.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Korisnici</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">
        <h2>Korisnici</h2>
        <a class="btn btn-primary" href="../POCETNA/pocetna.php">POČETNA</a> 
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Korisničko ime</th>
            <th>Email</th>
            <th>Rola</th>
            <th>Upravljaj</th>
        </tr>

    </thead>

    <tbody> 
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php 
            if ($row['roles_id'] == 1){
                echo "Admin";
            }else {
                echo "Moderator";
            }; 
            ?></td>
            <td><a class="btn btn-info" href="update_user.php?id=<?php echo $row['id']; ?>">Uredi</a>&nbsp;
            <a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['id']; ?>">Ukloni</a></td>
            </tr>                       
        <?php       
        }

            }

        ?>                

    </tbody>
</table>
</div> 
</body>
</html>