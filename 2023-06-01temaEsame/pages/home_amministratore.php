<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/esposizioni.css">
    <title>Amministratore</title>
</head>
<body>
<?php include 'headerP.html' ?>
    <?php
    session_start();
    require './connection.php';
    if($_SESSION['username']==null || $_SESSION['id_ruolo']!='P')
        header("Location:index.php");
    $approvazione=$_POST['approvazione0'] ?? null;
        if($approvazione!= null){
   for($i=0;$i<10;$i++){
        if(isset($_POST['approvazione'.$i])){
        $sql = "UPDATE contributi SET stato=:approvazione WHERE id_contributo=:idcontributo";
        $statement = $pdo->prepare($sql);
        $statement->execute(['approvazione' => $_POST['approvazione'.$i], 'idcontributo'=> $_SESSION['approvazione'][$i]]);
        }
    }}
    ?>
    <h1 class="titoloUser">benvenuto <?=$_SESSION['username']?></h1>
    <?php 
    $sql = "SELECT contributi.id_contributo,titolo,espositori.cognome,immagine FROM contributi JOIN espositori ON espositori.id_espositore=contributi.id_espositore 
    WHERE stato ='da visionare' ORDER BY contributi.id_contributo ASC LIMIT 10; "; 
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
            $num=0;
            foreach ($member as $value) {?>
                <tr>
                <td>
                <?php
                $_SESSION['approvazione'][$num] =$value['id_contributo'];
                ?>
                    <a target="_blank" href="http://localhost/temaEsame/pages/contributo.php?id_contributo=<?=$value['id_contributo']?>"><?= htmlspecialchars($value['titolo']) ?></a></td>
                    <td><?= htmlspecialchars($value['cognome']) ?></td>
                    <td><img src="../images/<?=$value['immagine']?>"></td>
                    <td><label for="username">APPROVA</label>
                    <input type="radio" name="approvazione<?= $num ?>" value="accettato"></td>
                    <td><label for="username">RIFIUTA</label>
                    <input type="radio" name="approvazione<?= $num ?>" value="rifiutato"></td>
                </tr>
            <?php
           $num++; }
        ?>
        </table>
        <input type="submit" value="Invia">
    </form>

    
</body>

<?php include 'footer.html' ?>
</html>