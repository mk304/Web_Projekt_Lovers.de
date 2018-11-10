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

header("Location: ../home/home.php");

?>

