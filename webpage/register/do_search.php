<?php

include_once '../../userdata.php';
include_once '../register/login_test.php';
include_once '../ui/neuerheader.php';
session_start();


$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));

echo"<h2>Suchergebnisse</h2>";


if (isset($_POST['search'])) {

    $suche = $_POST['search'];
    $statement = $pdo->prepare("SELECT kuerzel, vorname, nachname FROM user WHERE kuerzel=:suche");

    if ($statement->execute(array(":suche"=>"$suche"))) {
        echo"<h3>Personen</h3>";
        while ($row = $statement->fetch()) {
            echo $row['kuerzel']." -> ".$row['vorname']." ".$row['nachname']?>

          <table>
          <tr><td>Kürzel:</td><td><a href="../webpage/profil_anderer.php?profilname=<?php $row["kuerzel"] ?>"><?php echo $row["kuerzel"]?></td></tr>

          <tr><td>Vorname:</td><td> <?php echo $row["vorname"]?> </td></tr>
          <tr><td>Nachname:</td><td> <?php echo $row["nachname"]?> </td></tr>

          </table>
            <hr />
        <?php
            }
    }}
     else {
        echo "Ihre Suche hat leider keinen Treffer ergeben.";
    }


$statement = $pdo->prepare("SELECT post FROM posts WHERE post=:suche");

if ($statement->execute(array(":suche"=>"$suche"))) {
    echo"<h3>Personen</h3>";
    while ($row = $statement->fetch()) {
        echo $row['post'];
    }}

?>