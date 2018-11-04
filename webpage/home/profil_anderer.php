<?php


include_once '../../userdata.php';
include_once 'neuerheader.php';
session_start();



$profilname = $_GET["profilname"];
$kuerzel = $_SESSION["kuerzel"];
$_SESSION["profilname"] = $profilname;

echo "Das ist das Profil von ".$profilname."<br>";




$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "SELECT folgt FROM abonnenten WHERE (kuerzel=:kuerzel AND folgt=:profilname)";

$statement = $pdo->prepare($sql);
$statement->execute(array(":kuerzel"=>"$kuerzel", ":profilname"=>"$profilname"));

$row = $statement->fetchObject();

if ($profilname == $row->folgt) {
    echo '<button type="button" class="btn btn-outline-primary">Freunde</button>';
    }
else{ ?>
<button type="button" class="btn btn-outline-primary" onclick="location.href='../register/profil_anderer_folgen.php'">Folgen</button>
<?php
}

?>



