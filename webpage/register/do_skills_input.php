<?php
include_once '../../userdata.php';
session_start();
$kuerzel=$_SESSION['kuerzel'];



$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$pdo_s = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));

$sql = 'SELECT skill from skills';
$query = $pdo->prepare($sql);
$query->execute();
while ($row = $query->fetchObject()) {
    if ($_POST["$row->skill"] == TRUE) {
        $skill = $_POST["$row->skill"];
        $statement_s = $pdo_s->prepare("INSERT INTO user_skills (kuerzel, skill) VALUES (?, ?)");
        $statement_s->execute(array("$kuerzel", "$skill"));
        echo $skill;
    }
}

header("Location: ../home/Startseite.php?seite=bildupload");


?>


