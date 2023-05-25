<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espositore</title>
</head>
<?php
require 'connection.php';
$sql = "SELECT username,password FROM utenti"; 
$statement = $pdo -> query($sql);
$members = $statement->fetchAll();

?>
<body>
    <?php
    $username=$_POST['username']??null;
    $password=$_POST['password']??null;
    $validUser=False;
    if($username==null ||$password==null)
        header("Location:login.php");
    else{
        
    }
    foreach ($members as $member) {
        if ($member["username"]=$username){
            $_SESSION["username"]=$username;
            $validUser=True;
            break;
        }
    }
if ($validUser==False)
    header("Location:login.php");
else
    echo("username valido");   
    ?>
</body>
</html>