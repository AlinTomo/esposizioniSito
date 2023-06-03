<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/esposizione.css">
    <script defer src="../scripts/scripts.js"></script>
    <title>alba.php</title>
    <?php 
    session_start();
    $ruolo=$_SESSION['id_ruolo']??null;
?>
    <?php include 'header'.$ruolo.'.html' ?>
    <div class="contenuto">
</head>
<body>
    <?php
    require 'connection.php';
    $id_contributo=$_GET['id_contributo']??null;
    echo $id_contributo;
    // if ($titolo==null)
    //     header("Location:esposizioni.php");
    if ($ruolo==null || $ruolo=='E')
        $sql = "SELECT titolo,espositori.cognome,immagine,sintesi,url_appprofondimento,descrizione FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore join categorie_contributi on categorie_contributi.id_contributo=contributi.id_contributo join categorie on categorie.id=categorie_contributi.id_contributo  WHERE stato='accettato' AND contributi.id_contributo=:id_contributo;"; 
    else  {
        $sql = "SELECT titolo,espositori.cognome,immagine,sintesi,url_appprofondimento,descrizione FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore join categorie_contributi on categorie_contributi.id_contributo=contributi.id_contributo join categorie on categorie.id=categorie_contributi.id_contributo WHERE  contributi.id_contributo=:id_contributo;"; 
    }
    $statement = $pdo->prepare($sql);
    $statement->execute(['id_contributo' => $id_contributo]);
    $members=$statement -> fetch();
    // if ($members['sintesi']==null)
    //     header("Location:esposizioni.php");
    // ?>
    
    <h1><?=$members['titolo']?></h1>
    <div class="struttura">
        <div>
                <h2>autore</h2>
                <?= htmlspecialchars($members['cognome']) ?>
                <h2>titolo</h2>
                <?= htmlspecialchars($members['titolo']) ?>
                <h2>sintesi</h2>
                <?= htmlspecialchars($members['sintesi']) ?>
                <h2>approfondimento</h2>
                <a href="http://"><?= htmlspecialchars($members['url_appprofondimento'])?></a>
                <h2>categoria</h2>
                <?= htmlspecialchars($members['descrizione']) ?>
            </div>
            <img src="../images/<?=$members['immagine']?>">
            
    </div> 
    </div> 
</body>
<?php include 'footer.html' ?>
</html>