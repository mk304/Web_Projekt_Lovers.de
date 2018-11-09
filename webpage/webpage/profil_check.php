<?php


session_start();

$profilname = $_GET["profilname"];
$kuerzel = $_SESSION["kuerzel"];
$_SESSION["profilname"] = $profilname;


// Wenn auf das eigene Profil geklickt wird, wird auf die profil.php umgeleitet
if ($profilname == $kuerzel) {
    header("Location: profil.php?profilname=$profilname");
}
else {
    header("Location: profil_anderer.php?profilname=$profilname");
}
