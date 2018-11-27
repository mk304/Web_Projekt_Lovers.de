<?php
include_once '../../userdata.php';
session_start();

$kuerzel = $_SESSION['kuerzel'];
$channel = $_GET['channel'];


$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$sql = "UPDATE notification SET $kuerzel = 'read'";

$stmt = $pdo->prepare($sql);
if (!$stmt) {
    echo "Prepare Fehler ";
}

if (!$stmt->execute()) {
    echo "Query Fehler";

};

header("location: ../webpage/home.php?channel=$channel");

?>