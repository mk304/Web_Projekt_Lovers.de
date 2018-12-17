<?php

include_once '../../userdata.php';

session_start();

$profilname = $_SESSION["profilname"];
$kuerzel = $_SESSION["kuerzel"];

//Löschen des Abonnenten aus der Datenbank an der Stelle, wo Kürzel aus der Session (eingeloggter Nutzer) mit dem Nutzer auf dessen profil man ist, übereinstimmt
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "DELETE FROM abonnenten WHERE kuerzel=:kuerzel AND folgt=:profilname";

$statement = $pdo->prepare($sql);
$statement->execute(array(":kuerzel"=>"$kuerzel", ":profilname"=>"$profilname"));


header("Location: profil_anderer.php?profilname=$profilname");

?>