<?php


include_once '../register/login_test.php';
include_once '../ui/neuerheader.php';
include_once '../../userdata.php';

session_start();


?>
<link rel="stylesheet" href="posts.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<div class="container" style=" height: 90vh;
    overflow: scroll;">
    <div class="row">
        <div class="col-md-8">

            <br>
            <ul class="alleposts" >


                <?php
                $channel = $_GET["channel"];
                $kuerzel = $_SESSION["kuerzel"];


                //Channel auch als headline
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                $sql_3 = "SELECT name from channels WHERE channel_id=:channel ";
                $query_3 = $pdo->prepare($sql_3);
                $query_3->execute(array(":channel" => "$channel"));
                while ($row = $query_3->fetchObject()) {
                    echo "<h2>$row->name</h2>";


                    // Channel "General" als Startseite definieren
                    // Nur Posts von Personen, denen der Eingeloggte folgt werden ausgespielt
                    if ($channel == "") {

                        if ($row->bild_id == NULL) {
                            echo "<div class='inhalt'>";
                            echo "<div class='text'>";

                            echo "<h2>General</h2>";
                            $pdo = new PDO ($dsn, $dbuser, $dbpass);
                            $sql = "SELECT post, kuerzel, date FROM posts WHERE kuerzel = ANY (SELECT folgt FROM abonnenten WHERE kuerzel = :kuerzel) ORDER BY posts.date DESC";
                            $query = $pdo->prepare($sql);
                            $query->execute(array(":kuerzel" => "$kuerzel"));

                            while ($zeile = $query->fetchObject()) {
                                $kuerzel2 = $zeile->kuerzel;
                                echo ($zeile->post) . "<br>" . " schrieb <a href='../webpage/profil_check.php?profilname=$zeile->kuerzel'>" . ($zeile->kuerzel) . "</a> um " . ($zeile->date);
                                echo "<br><br>";
                                echo "</div></div>";

                            }
                        }


                        if ($row->post == NULL) {

                            echo "<div class='inhalt'>";

                            echo "<div class='text' >";
                            $bildlink = $row->bild_id;


                            echo "<a href='../bildupload/$bildlink'><img class='bild' src='../bildupload/$bildlink'>";
                        }

                        $file_pointer = '../profilbilder/profilbild' . ($row->kuerzel) . '.jpg';
                        echo "</div><div class='profil_bild_post' ><a class='atag' href='../webpage/profil_check.php?profilname=$row->kuerzel'>";
                        if (file_exists($file_pointer)) {
                            echo "<img src=\"$file_pointer\">";
                        } else {
                            echo "<img src=\"../profilbilder/profilbild.jpg\">";
                        }
                        echo "</div></div>";

                    }

                }
                //Posts aus Channel ausgeben

                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                $sql_3 = "SELECT post, kuerzel, date, posts_id, bild_id from posts WHERE channel=:channel ORDER BY posts.date DESC";
                $query_3 = $pdo->prepare($sql_3);
                $query_3->execute(array(":channel" => "$channel"));

                while ($row = $query_3->fetchObject()) {

                    // Ausgabe der Textposts
                    if ($row->bild_id == NULL){
                        echo "<div class='inhalt'>";

                        echo "<div class='text'>";

                        echo "<a ><h3>" . ($row->post) . "</h3><br><h4>" . " schrieb <a   href='../webpage/profil_check.php?profilname=$row->kuerzel'>" . ($row->kuerzel) . "</a> um " . ($row->date);
                        echo "</h4>";
                        if (($row->kuerzel) == $kuerzel) {
                            echo "<button class='download'  onClick='sessionStorage.id=$row->posts_id'>Post bearbeiten</button>";
                            echo "<a class='post_bearbeiten2'  href='../register/do_post_delete.php?id=$row->posts_id'>Post löschen</>";

                        }
                    }

                    // Ausgabe der Bildposts
                    if ($row->post == NULL) {

                        echo "<div class='inhalt'>";

                        echo "<div class='text' >";
                        $bildlink= $row-> bild_id;
                        

                        echo "<a href='../bildupload/$bildlink'><img class='bild' src='../bildupload/$bildlink'>";
                    }

                    $file_pointer = '../profilbilder/profilbild' . ($row->kuerzel) . '.jpg';
                    echo "</div><div class='profil_bild_post' ><a class='atag' href='../webpage/profil_check.php?profilname=$row->kuerzel'>";
                    if (file_exists($file_pointer)) {
                        echo "<img src=\"$file_pointer\">";
                    } else {
                        echo "<img src=\"../profilbilder/profilbild.jpg\">";
                    }
                    echo "</div></div>";
                    ?>


                    <script>
                        var post_id = sessionStorage.getItem('id');

                        $(document).ready(function () {
                            $('.post_bearbeiten').click(function () {

                                (async function getText() {
                                    const {value: text} = await swal({
                                        input: 'textarea',
                                        inputPlaceholder: 'Schreibe deinen neuen Text hier...',
                                        showCancelButton: true
                                    });
                                    if (text) {
                                        $.ajax({
                                            type: "POST",
                                            url: "../register/post_edit.php",
                                            data: {"post": text, "post_id": post_id}

                                        });
                                        swal(
                                            "Super!",
                                            "Dein Beitrag wurde erfolgreich gespeichert!",
                                            "success"
                                        )
                                        window.location.reload();
                                    }
                                })()
                            });
                        })
                    </script>
                    <?php
                }

                //Bilder aus Channel ausgeben;

                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                $sql_4 = "SELECT * from postimg WHERE channel=:channel  ORDER BY postimg.date DESC";
                $query_4 = $pdo->prepare($sql_4);
                $query_4->execute(array(":channel" => "$channel"));

                while ($zeile = $query_4->fetchObject()) {

                    echo "<div class='inhalt'>";

                    echo "<div class='text' >";
                    $bildlink= $zeile-> bild_id;


                    echo "</h4>";


                    echo "<img class='bild'   src='../bildupload/$bildlink'>";



                    if (($row->kuerzel) == $kuerzel) {
                        echo "<button class='download'  onClick='sessionStorage.id=$row->posts_id'>Post bearbeiten</button>";
                        echo "<a class='post_bearbeiten2'  href='../register/do_post_delete.php?id=$row->posts_id'>Post löschen</>";

                    }
                    $file_pointer = '../profilbilder/profilbild' . ($row->kuerzel) . '.jpg';
                    echo "</div><div class='profil_bild_post' ><a class='atag' href='../webpage/profil_check.php?profilname=$row->kuerzel'>";
                    if (file_exists($file_pointer)) {
                        echo "<img src=\"$file_pointer\">";
                    } else {
                        echo "<img src=\"../profilbilder/profilbild.jpg\">";
                    }
                    echo "</div></div>";
                }
                ?>

            </ul>

        </div>
    </div>
</div>


<?php
include_once '../ui/footer.php';

?>








