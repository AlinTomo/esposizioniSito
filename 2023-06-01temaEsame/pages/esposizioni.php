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
    $sql = "SELECT contributi.id_contributo,titolo,espositori.cognome,immagine,descrizione FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore join categorie_contributi on categorie_contributi.id_contributo=contributi.id_contributo join categorie on categorie.id=categorie_contributi.id_contributo  WHERE stato='accettato';"; 
    $statement = $pdo -> query($sql);
    $member = $statement->fetchAll();
    ?>
    <h1 class="esposizioni">Esposizioni</h1>
    <table>
        <tr>
            <td>titolo</td>
            <td>autore</td>
            <td>immagine</td>
            <td>categoria</td>
        </tr>
        <?php 
        foreach ($member as $value) {?>
            <tr>
                <td><a href="http://localhost/temaEsame/pages/contributo.php?id_contributo=<?=$value['id_contributo']?>"><?= htmlspecialchars($value['titolo']) ?></a></td>
                <td><?= htmlspecialchars($value['cognome']) ?></td>
                <td><img src="../images/<?=$value['immagine']?>"></td> 
                <td><?= htmlspecialchars($value['descrizione']) ?></td>
            </tr>
        <?php
        }
    ?>
    </table>
</body>
<?php include 'footer.html' ?>
</html>



