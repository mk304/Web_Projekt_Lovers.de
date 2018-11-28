<?php

include_once '../../userdata.php';
session_start();

$post = $_POST["channel"];

// Neu angelegten Channel in Tabelle Channel übertragen
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "INSERT INTO channels (name) VALUE (?)";

$statement = $pdo->prepare($sql);
$statement->execute(array("$post"));

// Weiterleitung an neu erstellten Channel
$Stmt = $pdo->prepare("SELECT channel_id FROM channels WHERE name=:post");
$stmt->execute(array(":post"=>"$post"));
while ($row = $stmt->fetchObject()) {
    echo "window.location.reload()";
    echo "header('Location: ../webpage/home.php?channel=".$row->channel_id."')";
}

?>
