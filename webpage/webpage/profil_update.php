<?php
include_once '../../userdata.php';
//Posts in Datenbank schreiben

$channel = $_POST["channel"];
$kuerzel = $_SESSION["kuerzel"];
$profil_bild = $_POST["profil_bild"];
$titel_bild = $_POST["titel_bild"];
$profil_uebermich = $_POST["profil_uebermich"];

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO user_bilder (kuerzel, channel, profil_bild, titel_bild, profil_uebermich) VALUES (?, ?, ?, ?, ?)";

$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$channel", "$profil_bild", "$titel_bild", "$profil_uebermich"));

$row = $statement->fetchObject();

header("Location: ../home/home.php");

?>
