<?php


include_once '../../userdata.php';
include_once '../ui/neuerheader.php';
session_start();
?>
<script src="src/jquery-3.3.1.min.js"></script>
<script src="src/fullclip.min.js"></script>
<script src="src/fullclip.js"></script>
<?php


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
    echo '<button id="entfolgen" onclick="location.href=\'profil_anderer_entfolgen.php\'" type="button" class="btn btn-outline-primary">Freunde</button>';
    }

    else //Button wird zu "Folgen" und Weiterleitung zum Datenbankeintrag
        { ?>
<button type="button" class="btn btn-outline-primary" onclick="location.href='profil_anderer_folgen.php'">Folgen</button>



            <div class="wrapper1">
                <div class="one">One</div>
                <div class="two">Two</div>

            </div>
<?php
}
?>

<script>
    $(document).ready(function () {
        $("#entfolgen").mouseover(function () {
            $(this).html("als Freund entfernen");
        });
        $("#entfolgen").mouseout(function () {
            $(this).html("Freunde");
        });
    });

</script>




<?php

include_once '../ui/footer.php';

?>
