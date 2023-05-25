<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espositore</title>
</head>
<body>
    <?php
    session_start();
    require 'connection.php';
    $username=$_POST['username']??null;
    $password=$_POST['password']??null;
    $validUser=False;
    if($username==null ||$password==null)
        header("Location:login.php");  
    else{
        $sql = "SELECT username,password,id_ruolo FROM utenti where username=:username"; 
        $statement = $pdo->prepare($sql);
        $statement->execute(['username' => $username]);
        $members=$statement -> fetch();
        if(password_verify ($password , $members['password'])){
            $_SESSION['username']=$members['username'];
            $_SESSION['id_ruolo']=$members['id_ruolo'];
            if ($members['id_ruolo']=='E')
                header("Location:home_espositore.php");
            else
                header("Location:home_amministratore.php");
        }
            
        else
            header("Location:login.php");
    }
    ?>
</body>
</html>