<?php
require './connection.php';
/*$pass=hash($_POST["password"]);*/
/*$utente=$_POST["utente"];*/
$file=$_POST["file"];
echo $file;

$sql = "INSERT INTO utenti"; //mi aspetto un solo risultato
$statement = $pdo->query($sql); //set di risultati 
$member = $statement->fetch(); //['nome' => valore, 'citta' => valore] oppure false

$sql1 = "SELECT nome, citta FROM caselli;";
$statement1 = $pdo->query($sql); //set di risultati 
$members = $statement->fetchAll(); //mi aspetto abbia questa forma [['nome' => valore1, 'citta' => valore1], ['nome' => valore2, 'citta' => valore2],['nome' => valore3, 'citta' => valore3]]

$sql2 = "SELECT username FROM utenti";
$statement2 = $pdo->prepare($sql2);
$statement2->execute(['username' => $id]);
$members2 = $statement2->fetchAll();


/*header("Location:login.php");*/
?>
