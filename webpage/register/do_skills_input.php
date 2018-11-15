<?php
include_once '../../userdata.php';
session_start();
$kuerzel=$_SESSION['kuerzel'];




$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$sql = 'SELECT skill from skills';
$query = $pdo->prepare($sql);
$query->execute();
while ($row = $query->fetchObject()) {
    $_POST["$row->skill"];
}


$pdo_s = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_s = "INSERT INTO user_skills (kuerzel, skill) VALUES (?, ?)";

$statement_s = $pdo_s->prepare($sql_s);
$statement_s->execute(array("$kuerzel", "

        

"));
?>


