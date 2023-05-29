<?php
session_start();
session_destroy();
$_SESSION['username']=null;
$_SESSION['id_ruolo']=null;
header("Location:../index.php");

?>
