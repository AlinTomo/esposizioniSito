<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navBar.css">
    <link rel="stylesheet" href="../style/esposizione.css">
    <title>alba.php</title>
    
</head>
<body>
    <div class="navigazione">
            <a href="http://localhost/temaEsame/index.php">home</a>
            <a href="http://localhost/temaEsame/pages/register.php">register</a>
            <a href="http://localhost/temaEsame/pages/login.php">login</a>
            <a href="http://localhost/temaEsame/pages/esposizioni.php">esposizioni</a>
    </div>
    <?php
    require 'connection.php';
    $sql = "SELECT espositori.cognome,immagine,sintesi,url_appprofondimento FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore  WHERE stato='accettato' AND titolo='alba';"; 
    $statement = $pdo -> query($sql);
    $value = $statement->fetch();
    ?>
    <h1>Alba</h1>
    <div class="struttura">
        <div>
                <h2>autore</h2>
                <?= htmlspecialchars($value['cognome']) ?>
                <h2>sintesi</h2>
                <?= htmlspecialchars($value['sintesi']) ?>
                <h2>approfondimento</h2>
                <a href="http://"><?= htmlspecialchars($value['url_appprofondimento'])?></a>
            </div>
            <img src="../images/<?=$value['immagine']?>">
    </div>
        
        
        
</body>
</html>