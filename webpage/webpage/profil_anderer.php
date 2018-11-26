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




//Ausgabe der Skills
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_2 = "SELECT skill from skills WHERE id = ANY (SELECT skill FROM user_skills WHERE kuerzel=:profilname)";
$query_2 = $pdo->prepare($sql_2);

?>





<link rel="stylesheet" href="style.css">

<div class="container">
    <div class="avatar-upload">
        <form action="../register/profil_bild_header.php" method="post" enctype="multipart/form-data">
            <div class="avatar-edit">
                <input type='file' name="file" id="imageUpload" accept=".jpg, .jpeg"/>

            </div>
            <div class="avatar-preview">

                <?php
                $file_pointer = '../headerbilder/header'.$profilname.'.jpg';

                if (file_exists($file_pointer))
                {
                    echo "<div id=\"imagePreview\" style=\"background-image: url(../headerbilder/header".$profilname.".jpg);\">
                    </div>";
                }
                else
                {
                    echo "<div id=\"imagePreview\" style=\"background-image: url(../headerbilder/header.jpg);\">
                    </div>";
                }
                ?>
            </div>

        </form>
    </div>
</div>

<div class="container2">
    <div class="avatar-upload2">
        <form action="../register/profil_bild.php" method="post" enctype="multipart/form-data">
            <div class="avatar-edit2">

                <label name="2" for="imageUpload2"></label>
            </div>
            <div class="avatar-preview2">
                <?php
                $file_pointer = '../profilbilder/profilbild'.$profilname.'.jpg';

                if (file_exists($file_pointer))
                {
                    echo "<div id=\"imagePreview2\" style=\"background-image: url(../profilbilder/profilbild".$profilname.".jpg);\">
                    </div>";
                }
                else
                {
                    echo "<div id=\"imagePreview2\" style=\"background-image: url(../profilbilder/profilbild.jpg);\">
                    </div>";
                }
                ?>

            </div>

        </form>
    </div>
</div>



<script src="index.js"></script>
<script src="index2.js"></script>
<script>
    document.ready(function(){
        $('#imageUpload').click(function () {
            window.location.reload();
            $('#imageUpload2').click(function () {
                window.location.reload();
            });
</script>











<div class="wrapper1">
    <div class="one" style="overflow: scroll"; >
        <div class="infobox">
            <?php
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
            $sql_5 = "SELECT vorname, nachname, email, kuerzel from user WHERE kuerzel=:profilname ";
            $query_5 = $pdo->prepare($sql_5);
            $query_5->execute(array(":profilname"=>"$profilname"));

            while ($row = $query_5->fetchObject()) {
$name= $row->vorname." " .$row->nachname;
                echo ("<div class='name'>".$row->vorname." " .$row->nachname."</div>");


            }

            // Wenn auf das eigene profil geklickt wird, wird auf die profil.php umgeleitet
            if ($profilname == $kuerzel) {
            header ("Location: profil.php");
            }

            // Überprüfung, ob man dieser Person folgt oder nicht
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
            $sql = "SELECT folgt FROM abonnenten WHERE (kuerzel=:kuerzel AND folgt=:profilname)";

            $statement = $pdo->prepare($sql);
            $statement->execute(array(":kuerzel"=>"$kuerzel", ":profilname"=>"$profilname"));

            $row = $statement->fetchObject();



            if ($profilname == $row->folgt)
            {  // Button wird zu "Freunde" -> keine Weiterleitung hinterlegt
                echo '<button id="entfolgen" onclick="location.href=\'profil_anderer_entfolgen.php\'" type="button" class="btn btn-outline-light">';
                echo " du bist mit $name befreundet</button>";
            }

            else //Button wird zu "Folgen" und Weiterleitung zum Datenbankeintrag
            { ?>
            <button type="button" class="btn btn-light" onclick="location.href='profil_anderer_folgen.php'">Folgen</button>
            <?php
}
?>
            </div>

        <div class="aboutme">
            <?php
            $query_5 = $pdo->prepare($sql_5);
            $query_5->execute(array(":profilname"=>"$profilname"));
            while ($row = $query_5->fetchObject()) {
                echo("<div class='email'> E-Mail-Adresse: " .$row->email . "</div>");



            }?>
        </div>
        <?php
        if (!$query_2->execute(array(":profilname"=>"$profilname")));
        while ($row = $query_2->fetchObject()) {
            $skill = $row->skill;
            echo "<ul>$skill</ul>";

            echo ("<img src=\"../skills/". $skill.".png \")");
            echo " title=\"Smiley face\"/>";
        }
        if (!$query) {
            echo "Prepare Fehler.";
        }
        ?>
       </div>
    <div class="two">Two</div>

</div>

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
