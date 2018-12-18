<?php
include_once '../../userdata.php';
session_start();
$kuerzel=$_SESSION['kuerzel'];

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
$pdo_s = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));

$sql = 'DELETE FROM user_skills WHERE kuerzel=:kuerzel';
$query = $pdo->prepare($sql);
$query -> execute(array(":kuerzel" => "$kuerzel"));

$sql = 'SELECT skill from skills';
$query = $pdo->prepare($sql);

if ($query->execute()) {
    // Schleife, die alle Skills nacheinander durchläuft
    while ($row = $query->fetchObject()) {
        // Abfrage, ob Skill in Formular angehakt wurde (also TRUE ist)
        if ($_POST["$row->skill"] == TRUE) {
            // Wenn dieser Skill angehakt wurde, wird dieser Wert der Variable $skill übergeben.
            $skill = $_POST["$row->skill"];
            $statement_s = $pdo_s->prepare("INSERT INTO user_skills (kuerzel, skill) VALUES (?, ?)");
            $statement_s->execute(array("$kuerzel", "$skill"));
        }
    }
};
$_SESSION["log"] = "TRUE";
header("Location: ../webpage/profil.php");
?>