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



// neue Posts in Tabelle notification übertragen
$pdo2 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql2 = "INSERT INTO notification (post)  
SELECT post FROM posts WHERE not exists
(select post from notification where notification.post = posts.post) ";

$stmt=$pdo2->prepare($sql2);
if (!$stmt){
    echo "Prepare Fehler.";
}
if (!$stmt->execute()) {
    echo "Query Fehler.";
}



header("Location: ../webpage/home.php");

?>

