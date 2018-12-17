<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
session_start();

include_once '../../userdata.php';
include_once '../ui/neuerheader.php';

$kuerzel = $_SESSION["kuerzel"];
$profilname = $_GET["profilname"];


if ($_GET['seite'] == "warning_dateiformat") {
    $message = "wrong answer";
    echo "<script type='text/javascript'>swal('Deine Datei ist zu groß! (Max Größe 1MB)');</script>";
}
if ($_GET['seite'] == "warning_dateiformat_false") {
    $message = "wrong answer";
    echo "<script type='text/javascript'>swal('Dieses Dateiformat wird nicht unterstützt!');</script>";
}

?>
<link rel="stylesheet" href="style.css"> <link rel="stylesheet" href="posts.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script src="jquery-3.3.1.min.js"></script>

<div class="container">
    <div class="avatar-upload">
        <form action="../register/profil_bild_header.php" method="post" enctype="multipart/form-data">
            <div class="avatar-edit">
                <input type='file' name="file" id="imageUpload" accept=".jpg, .jpeg"/>
                <label name="" for="imageUpload"></label>
            </div>
            <div class="avatar-preview">

                <?php
                $file_pointer = '../headerbilder/header' . $kuerzel . '.jpg';

                if (file_exists($file_pointer)) {
                    echo "<div id=\"imagePreview\" style=\"background-image: url(../headerbilder/header" . $kuerzel . ".jpg);\">
                    </div>";
                } else {
                    echo "<div id=\"imagePreview\" style=\"background-image: url(../headerbilder/header.jpg);\">
                    </div>";
                }
                ?>
            </div>
            <button class="btn btn-light" type="submit" name="submit" id="imageUploadbtn" for="imageUpload">Upload
            </button>
        </form>
    </div>
</div>

<div class="container2">
    <div class="avatar-upload2">
        <form action="../register/profil_bild.php" method="post" enctype="multipart/form-data">
            <div class="avatar-edit2">
                <input type='file' name="file" id="imageUpload2" accept=".jpg, .jpeg"/>
                <label name="2" for="imageUpload2"></label>
            </div>
            <div class="avatar-preview2">
                <?php
                $file_pointer = '../profilbilder/profilbild' . $kuerzel . '.jpg';

                if (file_exists($file_pointer)) {
                    echo "<div id=\"imagePreview2\" style=\"background-image: url(../profilbilder/profilbild" . $kuerzel . ".jpg);\">
                    </div>";
                } else {
                    echo "<div id=\"imagePreview2\" style=\"background-image: url(../profilbilder/profilbild.jpg);\">
                    </div>";
                }
                ?>

            </div>
            <button class="btn btn-light" type="submit" name="submit" id="imageUpload2btn" for="imageUpload2">Upload
            </button>
        </form>
    </div>
</div>




<div class="wrapper1">
    <div class="one" style="overflow: scroll"; >
        <div class="infobox">
            <?php
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
            $sql_5 = "SELECT vorname, nachname, email, kuerzel from user WHERE kuerzel=:kuerzel ";
            $query_5 = $pdo->prepare($sql_5);
            $query_5->execute(array(":kuerzel" => "$kuerzel"));

            while ($row = $query_5->fetchObject()) {

                echo ("<div class='name'>".$row->vorname." " .$row->nachname."</div>");

                echo ("<div class='email'>".$row->email."</div>");

            }
            ?></div>

        <div class="aboutme"></div>
        <div class="skills"><h4> Meine Skills </h4>
            <div class="row">

                <?php
                // Ausgabe der Skills
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                $sql = "SELECT skill from skills WHERE id = ANY (SELECT skill FROM user_skills WHERE kuerzel=:kuerzel)";
                $query = $pdo->prepare($sql);
                if (!$query->execute(array(":kuerzel" => "$kuerzel"))) ;
                while ($row = $query->fetchObject()) {
                    $skill = $row->skill;


                    echo "<a href='../register/do_search.php?search=".$row->skill."' class=\"column\"><img href='../register/do_search.php?search=".$row->skill."' src=\"../skills/" . $skill . ".png\"> </a>";
                }
                if (!$query) {
                    echo "Prepare Fehler.";
                }
                ?></div>
        </div>
    </div>



    <div class="two" style="overflow: scroll; height: 100%; width: 100%">
        <?php
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
        $sql_3 = "SELECT post, kuerzel, date, posts_id, bild_id from posts WHERE kuerzel=:kuerzel ORDER BY posts.date DESC";
        $query_3 = $pdo->prepare($sql_3);
        $query_3->execute(array(":kuerzel" => "$kuerzel"));

        while ($row = $query_3->fetchObject()) {

            if ($row->bild_id == NULL){
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


            if ($row->post == NULL) {

                echo "<div class='inhalt'>";

                echo "<div class='text' >";
                $bildlink= $row-> bild_id;


                echo "<a href='../bildupload/$bildlink'><img class='bild' src='../bildupload/$bildlink'>";
                if (($row->kuerzel) == $kuerzel) {
                    echo "<div class='edit'>";
                    echo "<a  href='../register/do_post_delete.php?id=$row->posts_id'><i class='far fa-trash-alt' ></i></a>";
                    echo "</div>";




                }

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
    </div>


</div>

<script src="index2.js"></script>
<script>
    document.ready(function () {
        $('#imageUpload').click(function () {
            window.location.reload();
            $('#imageUpload2').click(function () {
                window.location.reload();
            });

            document.ready(function () {
                $('#imageUploadbtn').hide();
                $('#imageUpload2btn').hide();
            });

            $('#profilBearbeiten').click(function () {
                $('#imageUploadbtn').show();
                $('#imageUpload2btn').show();
            });
        });
</script>

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
include_once '../ui/footer.php';
?>
</body>
</html>

