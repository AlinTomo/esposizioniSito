<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/esposizioni.css">
    <link rel="stylesheet" href="../style/espositore.css">
    <title>esposizioni</title>
</head>
<body>
<?php include 'headerE.html' ?>
<?php
    session_start();
    if($_SESSION['username']==null || $_SESSION['id_ruolo']!='E')
        header("Location:../index.php");
?>
<h1 class="titoloUser">benvenuto <?=$_SESSION['username']?></h1>
<?php
    require 'connection.php';
    $sql = "SELECT titolo,immagine,stato FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore JOIN utenti ON contributi.id_espositore=utenti.id  WHERE username=:username;"; 
    $statement = $pdo->prepare($sql);
    $statement ->execute(['username'=>$_SESSION['username']]);
    $member = $statement->fetchAll();
    ?>
    <h1 class="esposizioni">Esposizioni</h1>
    <table>
        <tr>
            <td>titolo</td>
            <td>immagine</td>
            <td>stato</td>
        </tr>
        <?php 
        foreach ($member as $value) {?>
            <tr>
                <td><a href="http://localhost/temaEsame/pages/<?=$value['titolo']?>.php"><?= htmlspecialchars($value['titolo']) ?></a></td>
                <td><img src="../images/<?=$value['immagine']?>"></td>  
                <td><p><?=$value['stato']?></p></td>  
            </tr>
        <?php
        }
        
    ?>
    </table>
    <a href="http://localhost/temaEsame/pages/insertContributi.php" target="_parent"><button>proponi un contributo</button></a>
    <a href="http://localhost/temaEsame/pages/home_espositore.php">refresh bro</a>
</body>
<?php include 'footer.html' ?>
</html>



