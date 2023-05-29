<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/esposizione.css">
    <title>alba.php</title>
    <?php 
    session_start();
    $ruolo=$_SESSION['id_ruolo']??null;
?>
    <?php include 'header'.$ruolo.'.html' ?>
</head>
<body>
    <?php
    require 'connection.php';
    $titolo=$_GET['titolo']??null;
    if ($titolo==null)
        header("Location:esposizioni.php");
    if ($ruolo==null || $ruolo=='E')
        $sql = "SELECT espositori.cognome,immagine,sintesi,url_appprofondimento FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore  WHERE stato='accettato' AND titolo=:titolo;"; 
    else  {
        $sql = "SELECT espositori.cognome,immagine,sintesi,url_appprofondimento FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore  WHERE titolo=:titolo;"; 
    }
    $statement = $pdo->prepare($sql);
    $statement->execute(['titolo' => $titolo]);
    $members=$statement -> fetch();
    if ($members['sintesi']==null)
        header("Location:esposizioni.php");
    ?>
    
    <h1>Alba</h1>
    <div class="struttura">
        <div>
                <h2>autore</h2>
                <?= htmlspecialchars($members['cognome']) ?>
                <h2>sintesi</h2>
                <?= htmlspecialchars($members['sintesi']) ?>
                <h2>approfondimento</h2>
                <a href="http://"><?= htmlspecialchars($members['url_appprofondimento'])?></a>
            </div>
            <img src="../images/<?=$members['immagine']?>">
    </div> 
</body>
<?php include 'footer.html' ?>
</html>