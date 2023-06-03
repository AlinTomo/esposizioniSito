<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/areaEspositore.css">
    <script defer src="../scripts/scripts.js"></script>
    <title>esposizioni</title>
</head>
<body>

<?php include 'headerE.html' ?>
<div class="contenuto">
<?php
    session_start();
    if($_SESSION['username']==null || $_SESSION['id_ruolo']!='E')
        header("Location:index.php");
?>
<h1 class="titoloUser">Benvenuto <?=$_SESSION['username']?></h1>
<?php
    require 'connection.php';
    $sql = "SELECT id_contributo,titolo,immagine,stato FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore JOIN utenti ON contributi.id_espositore=utenti.id WHERE username=:username  ORDER BY  id_contributo DESC;"; 
    $statement = $pdo->prepare($sql);
    $statement ->execute(['username'=>$_SESSION['username']]);
    $member = $statement->fetchAll();
    ?>

    
    <h1 class="esposizioni">Esposizioni</h1>
    <a class="button-39" href="http://localhost/temaEsame/pages/home_espositore.php">Refresh</a>
    <table>
        <tr>
            <td><h2>Titolo</h2></td>
            <td><h2>Immagine</h2></td>
            <td><h2>Stato</h2></td>
        </tr>
        <?php 
        foreach ($member as $value) {?>
            <tr>
                <td class='tel mid'><a href="http://localhost/temaEsame/pages/contributo.php?id_contributo=<?=$value['id_contributo']?>"><?= htmlspecialchars($value['titolo']) ?></a></td>
                <td class='mid'><img src="../images/<?=$value['immagine']?>"></td>  
                <td class="col tel mid"><p><?=$value['stato']?></p></td>  
            </tr>
        <?php
        }
        
    ?>
    </table>
    <div class="proponi">
        <a href="http://localhost/temaEsame/pages/insertContibuti.php" target="_parent"><button class="button-27">Proponi un contributo</button></a>
    </div>
    </div>
    
</body>
<?php include 'footer.html' ?>
</html>



