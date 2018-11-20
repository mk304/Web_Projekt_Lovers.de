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
                    echo ($zeile->post)."<br>"." schrieb <a href='../webpage/profil_check.php?profilname=$zeile->kuerzel'>".($zeile->kuerzel)."</a> um ".($zeile->date);
                    echo "<br><br>";
                }
            }



            //Posts aus Channel ausgeben
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
            $sql_3 = "SELECT post, kuerzel, date, posts_id, channel from posts WHERE channel=:channel ORDER BY posts.date DESC";
            $query_3 = $pdo->prepare($sql_3);
            $query_3->execute(array(":channel"=>"$channel"));

            while ($row = $query_3->fetchObject()) {
                echo "<div class='inhalt'> ";

echo"<div class='text'>";
                echo ($row->post)."<br>"." schrieb <a href='../webpage/profil_check.php?profilname=$row->kuerzel'>".($row->kuerzel)."</a> um ".($row->date);
                echo"</div>";
                        if (($row->kuerzel) == $kuerzel){
                            echo "<button class='post_bearbeiten' onClick='sessionStorage.id=$row->posts_id'>Post bearbeiten</button>";
<<<<<<< HEAD


                            echo "<a <a href='../register/do_post_delete.php?id=$row->posts_id&channel=$row->channel'>Post löschen</a>";
                        }
                echo "<br><br>";


=======
>>>>>>> e0c8b6bd8699e07147e7c7df42aee8a61e611d77
                            echo "<a <a href='../register/do_post_delete.php?id=$row->posts_id'>Post löschen</a>";

                        }  $file_pointer = '../profilbilder/profilbild'.($row->kuerzel).'.jpg';
                        echo"<div class='profil_bild_post'>";
                if (file_exists($file_pointer))
                {
                    echo "<img src=\"$file_pointer\">";
                }
                else
                {
                    echo "<img src=\"../profilbilder/profilbild.jpg\">";
                }
                echo "</div><br><br></div>";
<<<<<<< HEAD

=======
>>>>>>> e0c8b6bd8699e07147e7c7df42aee8a61e611d77
            ?>
                <script>
                    var post_id = sessionStorage.getItem('id');

                    $(document).ready(function () {
                        $('.post_bearbeiten').click(function () {

                            (async function getText () {
                                const {value: text} = await swal({
                                    input: 'textarea',
                                    inputPlaceholder: 'Schreibe deinen neuen Text hier...',
                                    showCancelButton: true
                                });
                                if (text) {
                                    $.ajax({ type: "POST",  url: "../register/post_edit.php", data: {"post":text, "post_id": post_id}

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
            ?>

</ul>

        </div>
    </div>
</div>





<?php
include_once '../ui/footer.php';

?>








