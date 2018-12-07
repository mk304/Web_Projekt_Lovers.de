<?php

include_once '../../userdata.php';
session_start();

$id = $_GET["id"];
$kuerzel = $_SESSION["kuerzel"];
$channel = $_GET["channel"];



$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));

$sql = "DELETE FROM posts WHERE posts_id=:id";
$stmt=$pdo->prepare($sql);
if (!$stmt){
    echo "Prepare Fehler.";
}
if (!$stmt->execute(array( ':id'=>$id))) {
    echo "Query Fehler.";
}


if (isset($_GET['channel'])){

    header("Location: ../webpage/home.php?channel=$channel");
}
else {
    header("Location: ../webpage/profil.php");
}

?>