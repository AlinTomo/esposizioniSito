<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/login.css">
    <title>Document</title>
</head>
<?php
session_start();
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
<div class="navigazione">
        <a href="http://localhost/temaEsame/index.php">home</a>
        <a href="http://localhost/temaEsame/pages/register.php">register</a>
        <a href="http://localhost/temaEsame/pages/login.php">login</a>
        <a href="http://localhost/temaEsame/pages/esposizioni.php">esposizioni</a>
</div>
    <h1 class="titolo">Login</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">username</label>
        <input type="text" name="username" required>
        <label for="password">password</label>
        <input type="password" name="password" required>
        <input type="submit" value="invia">
    </form>
    
</body>
<?php include 'footer.html' ?>
</html>