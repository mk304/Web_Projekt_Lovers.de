<?php

include_once '../../userdata.php';

session_start();

$profilname = $_SESSION["profilname"];
$kuerzel = $_SESSION["kuerzel"];


$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO abonnenten(kuerzel, folgt) VALUES (?, ?)";

$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$profilname"));

$row = $statement->fetchObject();
header("Location: ../home/profil_anderer.php?profilname=$profilname");

?>