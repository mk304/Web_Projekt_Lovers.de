
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
                <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                <label name="" for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url(https://i.imgur.com/nsNvtH0.jpg);">
                </div>
            </div>
            <button type="submit" name="submit" for="imageUpload">Upload</button>
        </form>
    </div>

    <div class="container2">
        <div class="avatar-upload2">
            <form action="../register/profil_bild.php" method="post" enctype="multipart/form-data">
                <div class="avatar-edit2">
                    <input type='file' name="file" id="imageUpload2" accept=".png, .jpg, .jpeg"/>
                    <label name="2" for="imageUpload2"></label>
                </div>
                <div class="avatar-preview2">
                    <div id="imagePreview2" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                    </div>
                </div>
                <button type="submit" name="submit" for="imageUpload">Upload</button>
            </form>
        </div>
    </div>

<div class="wrapper1">
    <div class="one"><?php
// Ausgabe der Skills
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "SELECT skill from skills WHERE id = ANY (SELECT skill FROM user_skills WHERE kuerzel=:kuerzel)";
$query = $pdo->prepare($sql);
if (!$query->execute(array(":kuerzel"=>"$kuerzel")));
while ($row = $query->fetchObject()) {
    echo "<ul>$row->skill</ul>";
}
?>
    </div>
    <div class="two">Two</div>

</div>
<script src="index.js"></script>
    <script src="index2.js"></script>

    <?php
include_once '../ui/footer.php';
?>
