<?php
include_once '../../userdata.php';
session_start();

$post = $_POST["post"];
$channel = $_POST["channel"];
$kuerzel = $_SESSION["kuerzel"];

//Posts in Datenbank schreiben
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO posts (kuerzel, channel, post) VALUES (?, ?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$kuerzel", "$channel", "$post"));

// neue Posts in Tabelle notification übertragen
$pdo2 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql2 = "INSERT INTO notification (post)  
SELECT posts_id FROM posts WHERE not exists
(select post from notification where notification.post = posts.posts_id) ";

$stmt=$pdo2->prepare($sql2);
if (!$stmt){
    echo "Prepare Fehler.";
}
if (!$stmt->execute()) {
    echo "Query Fehler.";
}

// eigene Posts sollen als "gelesen" markiert werden, damit diese nicht als neue Nachrichten angezeigt werden
$pdo3 = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql3 = "UPDATE notification SET $kuerzel ='read' WHERE post = (SELECT posts_id FROM posts WHERE post=:post)";

$statement3 = $pdo3->prepare($sql3);
$statement3->execute(array(":post"=>"$post"));


header("Location: ../webpage/home.php");

?>

