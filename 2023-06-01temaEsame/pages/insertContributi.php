<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/form.css">
    <title>aggiungi un contributo</title>
</head>
<body>
<?php include 'headerE.html' ?>
<?php
    require './connection.php';
    session_start();
    if($_SESSION['username']==null || $_SESSION['id_ruolo']!='E' || $_SESSION['id_espositore']==null )
        header("Location:../index.php");
    $titolo=$_POST['titolo']??null;
    $sintesi=$_POST['sintesi']??null;
    $url=$_POST['url']??null;
    $immagine=$_FILES['image']['name']??null;
    $categoria=$_POST['categoria']??null;
    if ($titolo!=null && $sintesi!=null && $url!=null && $immagine!=null){
        $sql = "INSERT INTO contributi(titolo,id_espositore,sintesi,immagine,url_appprofondimento,stato) 
        VALUES (:titolo,:id_espositore,:sintesi,:immagine,:url_appprofondimento,'da visionare');";
        $statement = $pdo->prepare($sql);
        $statement->execute(['titolo' => $titolo, 'id_espositore'=> $_SESSION['id_espositore'],'sintesi'=>$sintesi,'url_appprofondimento'=>$url,'immagine'=>$immagine]);
        $imagename = $_FILES['image']['name'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tmpFile = $_FILES['image']['tmp_name'];
            $newFile = '../images/'.$_FILES['image']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);
        }
        $max="select max(id_contributo) as id_contributo from contributi";
        $statement = $pdo -> query($max);
        $member = $statement->fetch();
        $sql2 = "INSERT INTO categorie_contributi(id_contributo,id_categoria) VALUES(:id_contributo,:id_categoria);";
        $statement = $pdo->prepare($sql2);
        if ($categoria=='fotografia')
            $statement->execute(['id_contributo'=>$member['id_contributo'],'id_categoria'=>'F']);
        if ($categoria=='dipinto')
            $statement->execute(['id_contributo'=>$member['id_contributo'],'id_categoria'=>'D']);
        if ($categoria=='scultura')
            $statement->execute(['id_contributo'=>$member['id_contributo'],'id_categoria'=>'S']);
        $reloadpage = $_SERVER['PHP_SELF'];
        header("Location:$reloadpage");
    }  
    
    
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
        <label for="titolo">titolo</label>
        <input type="text" name="titolo" required>
        <label for="sintesi">sintesi</label>
        <input type="text" name="sintesi" required>
        <label for="url">link approfondimento</label>
        <input type="url" name="url" required>
        <label for="image">immagine</label required>
        <input type="file" name="image">
        <label for="cateogria">categoria</label>
        <select name="categoria">
            <option value="fotografia">fotografia</option>
            <option value="dipinto">dipinto</option>
            <option value="scultura">scultura</option>
        </select>
        <input type="submit" value="invia">
    </form>
</body>
<?php include 'footer.html' ?>
</html>
