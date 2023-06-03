<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/form.css">
    <link rel="stylesheet" href="../style/registrazione.css">
    <script defer src="../scripts/scripts.js"></script>
    <title>Document</title>
</head>
<?php 
    session_start();
    require './connection.php';
    $ruolo=$_SESSION['id_ruolo']??null;
?>
<?php include 'header'.$ruolo.'.html'; ?>
<?php
$sql = "INSERT INTO utenti(username,password,id_ruolo) 
VALUES (:user,:pass,'E');";
$sql2 ="INSERT INTO espositori(id_espositore,nome,cognome,data_di_nascita,luogo_di_nascita,e_mail,qualifica,curriculum)
VALUES ((SELECT max(id) from utenti),:nome,:cognome,:data_di_nascita,:luogo_di_nascita,:email,:qualifica,:curriculum);";
$user = $_POST['username']??null;
$pass = password_hash($_POST['password']??null,PASSWORD_DEFAULT);
$nome = $_POST['nome']??null;
$cognome=$_POST['cognome']??null;
$data_di_nascita=$_POST['dataN']??null;
$luogo_di_nascita=$_POST['luogoN']??null;
$e_mail=$_POST['email']??null;
$qualifica=$_POST['qualifica']??null;
$file=$_FILES['file']['name']??null;
if ($user!=null && $pass!=null && $nome!=null && $cognome!=null && $data_di_nascita!=null && $luogo_di_nascita!=null && $e_mail!=null && $qualifica){
    $statement = $pdo->prepare($sql);
    $statement->execute(['user' => $user, 'pass'=> $pass]);
    $statement = $pdo->prepare($sql2);
    $statement->execute(['nome'=>$nome,'cognome'=>$cognome,'data_di_nascita'=>$data_di_nascita,'luogo_di_nascita'=>$luogo_di_nascita,'email'=>$e_mail,'qualifica'=>$qualifica,'curriculum'=>$file]);
    header("Location:login.php");
    $target_dir = "../curriculum/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
}
?>

<body>
    <h1 class="titolo">Register </h1> 
    <div class="login-box">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="user-box">   
            <input type="text" name="username" required> 
            <label for="username">Username</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" requried>  
            <label for="password">Password</label>
        </div>
        <div class="user-box"> 
            <input type="text" name="cognome"requried >
            <label for="cognome">Cognome</label>
        </div>
        <div class="user-box"> 
            <input type="text" name="nome" required >
            <label for="nome">Nome</label>
        </div>
        <div class="user-box"> 
            <input type="email" name="email"required >
            <label for="email">E-mail</label>
        </div>
        <div class="user-box"> 
            <input type="text" name="luogoN" required>
            <label for="luogoN">Luogo nascita</label>
        </div>
        <label for="file">File del cv in pdf</label>
        <input class="filepond" name="filepond" type="file" name="file" value="scegli il tuo file">
        <label for="dataN">Data nascita</label>
        <input type="date" name="dataN" required>
        <label for="qualifica">Qualifica</label>
        <select name="qualifica">
        <option value="amatore">Amatore</option>
        <option value="esperto non professionista">Esperto non professionista</option>
        <option value="professionista">Professionista</option>    
    </select>
        <input type="submit" value="invia">
    </form>
    </div>
</body>
<?php include 'footer.html' ?>
</html>