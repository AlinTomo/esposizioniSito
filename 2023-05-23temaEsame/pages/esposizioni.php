<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/esposizioni.css">
    <title>esposizioni</title>
</head>
<body>
    <div class="navigazione">
        <a href="http://localhost/temaEsame/index.php">home</a>
        <a href="http://localhost/temaEsame/pages/register.php">register</a>
        <a href="http://localhost/temaEsame/pages/login.php">login</a>
        <a href="http://localhost/temaEsame/pages/esposizioni.php">esposizioni</a>
    </div>
<?php
    require './connection.php';
    $sql = "SELECT titolo,espositori.cognome,immagine FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore  WHERE stato='accettato';"; 
    $statement = $pdo -> query($sql);
    $member = $statement->fetchAll();
    ?>
    <h1 class="esposizioni">Esposizioni</h1>
    <table>
        <tr>
            <td>titolo</td>
            <td>autore</td>
            <td>immagine</td>
        </tr>
        <?php 
        foreach ($member as $value) {?>
            <tr>
                <td><a href="http://localhost/temaEsame/pages/<?=$value['titolo']?>.php"><?= htmlspecialchars($value['titolo']) ?></a></td>
                <td><?= htmlspecialchars($value['cognome']) ?></td>
                <td><img src="../images/<?=$value['immagine']?>"></td>  
            </tr>
        <?php
        }
    ?>
    </table>
</body>
</html>



