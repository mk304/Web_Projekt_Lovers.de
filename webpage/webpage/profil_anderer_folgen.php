<?php

include_once '../../userdata.php';

session_start();

$profilname = $_SESSION["profilname"];
$kuerzel = $_SESSION["kuerzel"];

// In Tabelle Abonnenten wird das "Follower-Verhältnis" vermerkt.
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO abonnenten(kuerzel, folgt) VALUES (?, ?)";

if ($statement = $pdo->prepare($sql)) {
    $statement->execute(array("$kuerzel", "$profilname"));
    };


// Alle Posts des neuen Freundes werden als gelesen in der Tabelle Notification markiert.
$stmt = $pdo->prepare("UPDATE notification SET $kuerzel ='read' WHERE post= ANY(SELECT posts_id FROM posts WHERE kuerzel=:profilname)");
$stmt->execute(array(":kuerzel"=>"$profilname"));

header("Location: profil_anderer.php?profilname=$profilname");
?>

