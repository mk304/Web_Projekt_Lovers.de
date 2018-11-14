<?php
include_once '../../userdata.php';
session_start();

//Posts in Datenbank schreiben
$post = $_POST["post"];
$channel = $_POST["channel"];
$kuerzel = $_SESSION["kuerzel"];



$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO posts (kuerzel, channel, post, status) VALUES (?, ?, ?, 'unread')";

$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$channel", "$post"));

$row = $statement->fetchObject();



// neue Posts in Tabelle notification übertragen
$pdo2 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql2 = "INSERT INTO notification (post) VALUE (?)";

$statement2 = $pdo2->prepare($sql);
$statement2->execute(array("$post"));



header("Location: ../webpage/home.php");

?>

