<?php


include_once '../../userdata.php';
include_once '../ui/neuerheader.php';
session_start();



$profilname = $_GET["profilname"];
$kuerzel = $_SESSION["kuerzel"];
$_SESSION["profilname"] = $profilname;


// Wenn auf das eigene profil geklickt wird, wird auf die profil.php umgeleitet
if ($profilname == $kuerzel) {
    header ("Location: profil.php");
}




echo "Das ist das profil von ".$profilname."<br>";


// Überprüfung, ob man dieser Person folgt oder nicht
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "SELECT folgt FROM abonnenten WHERE (kuerzel=:kuerzel AND folgt=:profilname)";

$statement = $pdo->prepare($sql);
$statement->execute(array(":kuerzel"=>"$kuerzel", ":profilname"=>"$profilname"));

$row = $statement->fetchObject();



if ($profilname == $row->folgt)
    {  // Button wird zu "Freunde" -> keine Weiterleitung hinterlegt
    echo '<button type="button" class="btn btn-outline-primary">Freunde</button>';
    }

    else //Button wird zu "Folgen" und Weiterleitung zum Datenbankeintrag
        { ?>
<button type="button" class="btn btn-outline-primary" onclick="location.href='profil_anderer_folgen.php'">Folgen</button>
<?php
}

?>



<?php

include_once '../ui/footer.php';

?>
