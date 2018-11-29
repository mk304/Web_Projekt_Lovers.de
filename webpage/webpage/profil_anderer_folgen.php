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

$stmt = $pdo->prepare("UPDATE notification SET $kuerzel ='read' WHERE post= ANY(SELECT posts_id FROM posts WHERE kuerzel=:profilname)");
$stmt->execute(array(":kuerzel"=>"$profilname"));

header("Location: profil_anderer.php?profilname=$profilname");

?>

