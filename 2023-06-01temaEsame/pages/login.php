<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/log.css">
    <title>login</title>
</head>
<?php 
    session_start();
    $ruolo=$_SESSION['id_ruolo']??null;
?>
<?php include 'header'.$ruolo.'.html' ?>
<?php
require 'connection.php';
$username=$_POST['username']??null;
$password=$_POST['password']??null;
if($username!=null && $password!=null){
    $sql = "SELECT username,id,password,id_ruolo FROM utenti where username=:username"; 
    $statement = $pdo->prepare($sql);
    $statement->execute(['username' => $username]);
    $members=$statement -> fetch();
    if(password_verify ($password , $members['password'])){
        $_SESSION['username']=$members['username'];
        $_SESSION['id_ruolo']=$members['id_ruolo'];
        $_SESSION['id_espositore']=$members['id'];
        if ($members['id_ruolo']=='E')
            header("Location:home_espositore.php");
        else
            header("Location:home_amministratore.php");
    }
    else
        header("Location:login.php");
}
?>
<body>
    <div class="logForm">
        <h1 class="titolo">Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">username</label>
            <input type="text" name="username" required>
            <label for="password">password</label>
            <input type="password" name="password" required>
            <input type="submit" value="invia">
        </form>
    </div>
    
    
</body>
<?php include 'footer.html' ?>
</html>