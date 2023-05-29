<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/esposizioni.css">
    <title>esposizioni</title>
    <?php 
    session_start();
    $ruolo=$_SESSION['id_ruolo']??null;
?>
    <?php include 'header'.$ruolo.'.html' ?>
</head>
<body>
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
                <td><a href="http://localhost/temaEsame/pages/contributo.php?titolo=<?=$value['titolo']?>"><?= htmlspecialchars($value['titolo']) ?></a></td>
                <td><?= htmlspecialchars($value['cognome']) ?></td>
                <td><img src="../images/<?=$value['immagine']?>"></td>  
            </tr>
        <?php
        }
    ?>
    </table>
</body>
<?php include 'footer.html' ?>
</html>



