<?php


include_once '../register/login_test.php';

include_once '../../userdata.php';

session_start();
include_once 'neuerheader.php';

?>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-8">

            <br>
<ul>



            <?php
            $channel = $_GET["channel"];
            $kuerzel = $_SESSION["kuerzel"];

            //Channel auch als headline
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
            $sql_3 = "SELECT name from channels WHERE channel_id=:channel ";
            $query_3 = $pdo->prepare($sql_3);
            $query_3->execute(array(":channel"=>"$channel"));
            while ($row = $query_3->fetchObject()) {
                echo "<h2>$row->name</h2>";
            }

            // Channel "General" als Startseite definieren
            // Nur Posts von Personen, denen der Eingeloggte folgt werden ausgespielt
            if($channel == "") {
                echo "<h2>General</h2>";
                $pdo = new PDO ($dsn, $dbuser, $dbpass);
                $sql = "SELECT post, kuerzel, date FROM posts WHERE kuerzel = ANY (SELECT folgt FROM abonnenten WHERE kuerzel = :kuerzel) ORDER BY posts.date DESC";
                $query = $pdo->prepare($sql);
                $query->execute(array(":kuerzel"=>"$kuerzel"));

                while ($zeile = $query->fetchObject()) {
                    echo ($zeile->post)."<br>"." schrieb <a href='profil_anderer.php?profilname=$zeile->kuerzel'>".($zeile->kuerzel)."</a> um ".($zeile->date);
                    echo "<br><br>";
                }
            }



            //Posts aus Channel ausgeben
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
            $sql_3 = "SELECT post, kuerzel, date from posts WHERE channel=:channel ORDER BY posts.date DESC";
            $query_3 = $pdo->prepare($sql_3);
            $query_3->execute(array(":channel"=>"$channel"));

            while ($row = $query_3->fetchObject()) {
                echo ($row->post)."<br>"." schrieb <a href='profil_anderer.php?profilname=$row->kuerzel'>".($row->kuerzel)."</a> um ".($row->date)." POST BEARBEITEN";
                echo "<br><br>";
            }

            ?>
</ul>
        </div>
    </div>
</div>


<?php
session_start();
include_once 'footer.php';

?>








