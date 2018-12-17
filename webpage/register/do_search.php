<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Suche</title>
    <link rel="stylesheet" href="../webpage/posts.css">
</head>
<body>
<?php

include_once '../../userdata.php';
include_once '../register/login_test.php';
include_once '../ui/neuerheader.php';
session_start();

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
echo"<h2>Suchergebnisse</h2>";
//wenn man über die Search Eingabe sucht, dann wird Suchbegriff über Post übergeben
$suche = $_POST['search'];
// wenn man auf der Profilseite auf einen Skill klickt, dann wird dieser als GET Parameter übergeben
if (!isset ($suche)) {
    $suche = $_GET['search'];
}

// Suche von Personen nach Kürzel, Namen oder Skills
$statement = $pdo->prepare("SELECT kuerzel, vorname, nachname FROM user WHERE kuerzel LIKE '%".$suche."%' OR vorname LIKE '%".$suche."%' OR nachname LIKE '%".$suche."%'
                                    OR kuerzel = ANY(SELECT kuerzel FROM user_skills WHERE skill = ANY (SELECT id FROM skills WHERE skill LIKE '%".$suche."%')) ");

if ($statement->execute(array(":suche"=>"$suche", ":vorname"=>"$suche", ":nachname"=>"$suche"))) {

    if ($anzahl_treffer = $statement->rowCount() > 0){
        echo"<h4>Personen</h4>"."<br>";

                            while ($row = $statement->fetch()) {
                            $daskuerzel = $row["kuerzel"];
                            ?>
                            <table>
                                <tr>
                                    <td>
                                        <?php
                                        echo "<div class='text'>";

                                        $file_pointer = '../profilbilder/profilbild' . ($row["kuerzel"]) . '.jpg';
                                        echo "</div><div class='profil_bild_post' ><a  href='../webpage/profil_check.php?profilname=".$row['kuerzel']."'>";
                                        if (file_exists($file_pointer)) {
                                            echo "<img src=\"$file_pointer\">";
                                        } else {
                                            echo "<img src=\"../profilbilder/profilbild.jpg\">";
                                        }
                                        echo "</div></div>";
                                        ?>
                                    </td>
                                    <td> <?php echo $row["vorname"] . " " . $row["nachname"] ?><br> <a
                                                href="../webpage/profil_anderer.php?profilname=<?php echo $row["kuerzel"] ?>"><?php echo $row["kuerzel"] ?></a>
                                        <br>
                                        <a>Skills: <?php
                                                    $statement_skills = $pdo->prepare("SELECT skill FROM skills WHERE id = ANY (SELECT skill FROM user_skills WHERE kuerzel=:kuerzel)");
                                                    $statement_skills->execute(array(":kuerzel" => "$daskuerzel"));

                                                    while ($row_skill = $statement_skills->fetch()) {
                                                        echo $row_skill["skill"].", ";
                                                    } ?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <hr/>
                            <?php

                    }}
                    else {
                        echo "Es konnte leider keine Person gefunden werden.";
                    }
            }


// Suche nach Posts
$statement = $pdo->prepare("SELECT post, channel FROM posts WHERE post LIKE '%".$suche."%'");

if ($statement->execute(array(":suche"=>"$suche"))) {
    if ($anzahl_treffer = $statement->rowCount() > 0){
        echo "<h4>Beiträge</h4><br>";

        while ($reihe = $statement->fetch()) {
            echo "<a href='../webpage/home.php?channel=".$reihe['channel']."'>".$reihe['post']."</a>";
            echo "<hr/>";
        }
    }
}
?>
</body>
</html>



