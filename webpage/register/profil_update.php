<?php
include_once '../../userdata.php';
//Posts in Datenbank schreiben


$kuerzel = $_POST["kuerzel"];
$bild = $_POST['bild'];
$bild2 = $_POST['bild2'];
$post = $_POST["post"];

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO user_bilder (kuerzel, bild, bild2, post) VALUES (?, ?, ?, ?)";

$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$bild", "$bild2", "$post"));

$row = $statement->fetchObject();

header("Location: ../webpage/home.php");
?>
