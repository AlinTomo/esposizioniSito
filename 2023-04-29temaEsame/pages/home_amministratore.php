<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <title>Amministratore</title>
</head>
<body>
<?php include 'headerP.html' ?>
    <?php
    session_start();
    require './connection.php';
    if($_SESSION['username']==null || $_SESSION['id_ruolo']!='P')
        header("Location:../index.php");
    ?>
    <h1 class="titoloUser">benvenuto <?=$_SESSION['username']?></h1>
    <?php 
    $sql = "SELECT titolo,espositori.cognome,immagine FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore  WHERE stato ='da visionare' LIMIT 10; "; 
    $statement = $pdo -> query($sql);
    $member = $statement->fetchAll();
    ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>titolo</td>
                <td>autore</td>
                <td>immagine</td>
                <td>stato</td>
            </tr>
            <?php 
            foreach ($member as $value) {?>
                <tr>
                    <td><a href="http://localhost/temaEsame/pages/<?=$value['titolo']?>.php"><?= htmlspecialchars($value['titolo']) ?></a></td>
                    <td><?= htmlspecialchars($value['cognome']) ?></td>
                    <td><img src="../images/<?=$value['immagine']?>"></td>
                    <td><input type="radio" name="approvazione" value=""></td>
                </tr>
            <?php
            }
        ?>
        </table>
    </form>

    
</body>

<?php include 'footer.html' ?>
</html>