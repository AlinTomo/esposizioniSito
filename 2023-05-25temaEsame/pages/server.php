<?php
require './connection.php';
/*$pass=hash($_POST["password"]);*/
/*$utente=$_POST["utente"];*/
$file=$_POST["file"];
echo $file;

$sql = "INSERT INTO utenti(username,password) 
VALUES (:user,:pass);";
$sql2 ="INSERT INTO espositori(id_espositore,nome,cognome,data_di_nascita,luogo_di_nascita,e_mail,qualifica)
VALUES ((SELECT max(id) from utenti),:nome,:cognome,:data_di_nascita,:luogo_di_nascita,:email,:qualifica);";
$user = $_POST['username'];
$pass =password_hash($_POST['password'],PASSWORD_DEFAULT);
$nome= $_POST['nome'];
$cognome=$_POST['cognome'];
$data_di_nascita=$_POST['dataN'];
$luogo_di_nascita=$_POST['luogoN'];
$e_mail=$_POST['email'];
$qualifica=$_POST['qualifica'];
$statement = $pdo->prepare($sql);
$statement->execute(['user' => $user, 'pass'=> $pass]); //mi aspetto un solo risultato
//$statement = $pdo->query($sql); //set di risultati
$statement = $pdo->prepare($sql2);
$statement->execute(['nome'=>$nome,'cognome'=>$cognome,'data_di_nascita'=>$data_di_nascita,'luogo_di_nascita'=>$luogo_di_nascita,'email'=>$e_mail,'qualifica'=>$qualifica]);
//$statement = $pdo->query($sql2); //set di risultati 

header("Location:login.php");
?>
