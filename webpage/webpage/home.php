<?php
include_once '../ui/neuerheader.php';
include_once '../../userdata.php';
session_start();
?>
<link rel="stylesheet" href="posts.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<div class="container" style=" min-width: 100%; max-height: 95vh; overflow: auto;">
    <div class="row">
        <div class="col-md-8">
            <br>
            <ul class="alleposts " style="min-width: 80vmax">
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
                }
                // Channel "General" als Startseite definieren
                // Nur Posts von Personen, denen der Eingeloggte folgt werden ausgespielt
                if ($channel == "") {
                    echo "<h2>General</h2>";
                    $pdo = new PDO ($dsn, $dbuser, $dbpass);
                    $sql = "SELECT  post, kuerzel, date, posts_id, bild_id from posts WHERE kuerzel = ANY (SELECT folgt FROM abonnenten WHERE kuerzel = :kuerzel) ORDER BY posts.date DESC";
                    $query = $pdo->prepare($sql);
                    $query->execute(array(":kuerzel" => "$kuerzel"));
                    while ($zeile = $query->fetchObject()) {

                        if ($row->bild_id == NULL) {
                            echo "<div class='inhalt'>";
                            echo "<div class='text'>";
                            echo "<a ><h3>" . ($zeile->post) . "</h3><br><h4>" . " schrieb <a   href='../webpage/profil_check.php?profilname=$zeile->kuerzel'>" . ($zeile->kuerzel) . "</a> um " . date('g:i a, F j, Y', strtotime($zeile->date));
                            echo "</h4>";
                        }
                        if ($zeile->post == NULL) {
                            $bildlink = $zeile->bild_id;
                            echo "<a href='../bildupload/$bildlink'><img class='bild' src='../bildupload/$bildlink'>";
                            echo($zeile->post);
                        }
                        $file_pointer = '../profilbilder/profilbild' . ($zeile->kuerzel) . '.jpg';
                        echo "</div><div class='profil_bild_post' ><a class='atag' href='../webpage/profil_check.php?profilname=$zeile->kuerzel'>";
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
                    if ($row->bild_id == NULL) {
                        echo "<div class='inhalt'>";
                        echo "<div class='text'>";
                        echo "<a ><h3>" . ($row->post) . "</h3><br><h4>" . " schrieb <a   href='../webpage/profil_check.php?profilname=$row->kuerzel'>" . ($row->kuerzel) . "</a> um " . date('g:i a, F j, Y', strtotime($row->date));
                        echo "</h4>";
                        if (($row->kuerzel) == $kuerzel) {

                            echo "<div class='edit'>";
                            echo "<a  class='textpost_edit' href='javascript:onClick=sessionStorage.id=".$row->posts_id."'> <i class=\"far fa-edit\"> </i> </a>";
                            echo "<a href='../register/do_post_delete.php?id=$row->posts_id'><i class='far fa-trash-alt' ></i></a>";
                            echo "</div>";



                        }
                    }

                    // Ausgabe der Bildposts
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
                    ?>
                    <script>

                        $(document).ready(function () {
                            $('.textpost_edit').click(function () {
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
                                            data: {"post": text, "post_id": sessionStorage.getItem('id')}

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








