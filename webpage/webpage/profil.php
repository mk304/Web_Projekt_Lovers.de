<?php
session_start();

include_once '../../userdata.php';
include_once '../ui/neuerheader.php';

$kuerzel = $_SESSION["kuerzel"];
$profilname = $_GET["profilname"];


?>
<link rel="stylesheet" href="style.css">

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
            <button type="submit" name="submit" style="display: none" id="imageUploadbtn" for="imageUpload">Upload
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
            <button type="submit" name="submit" id="imageUpload2btn" for="imageUpload2" style="display: none">Upload
            </button>
        </form>
    </div>
</div>

<button type="button" id="profilBearbeiten" class="btn btn-primary">Profil bearbeiten</button>


<div class="wrapper1">
    <div class="one">
        <?php
        // Ausgabe der Skills
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
        $sql = "SELECT skill from skills WHERE id = ANY (SELECT skill FROM user_skills WHERE kuerzel=:kuerzel)";
        $query = $pdo->prepare($sql);
        if (!$query->execute(array(":kuerzel" => "$kuerzel"))) ;
        while ($row = $query->fetchObject()) {
            echo "<ul>$row->skill</ul>";
        }
        if (!$query) {
            echo "Prepare Fehler.";
        }
        ?>
    </div>
    <div class="two">
        <?php
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
        $sql_3 = "SELECT post, kuerzel, date, posts_id from posts WHERE kuerzel=:kuerzel ORDER BY posts.date DESC";
        $query_3 = $pdo->prepare($sql_3);
        $query_3->execute(array(":kuerzel" => "$kuerzel"));

        while ($row = $query_3->fetchObject()) {

            echo ($row->post) . "<br>" . " schrieb <a  href='../webpage/profil_check.php?profilname=$row->kuerzel'>" . ($row->kuerzel) . "</a> um " . ($row->date);
            if (($row->kuerzel) == $kuerzel) {

                echo ($row->post) . "<br>" . " schrieb <a href='../webpage/profil_check.php?profilname=$row->kuerzel'>" . ($row->kuerzel) . "</a> um " . ($row->date);
                if (($row->kuerzel) == $kuerzel) {

                    echo "<p><button class='post_bearbeiten' onClick='sessionStorage.id=$row->posts_id'>Post bearbeiten</button></p><br><a href='../register/do_post_delete.php?id=$row->posts_id'>Post löschen</a>";

                }
            }
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
                $('#profilBearbeiten').click(function () {
                    $('#imageUploadbtn').show();
                    $('#imageUpload2btn').show();
                });
            });
</script>

<?php
include_once '../ui/footer.php';
?>