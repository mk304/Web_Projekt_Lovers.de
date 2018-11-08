
<?php
include_once '../../userdata.php';
include_once '../ui/neuerheader.php';
session_start();

$kuerzel = $_SESSION["kuerzel"];

?>

<div class="titelbild"><img src="../bilder/head.jpg"></div>
<div class="profilbild"><img src="../bilder/testprofilbild.jpg"></div>

<div class="grid-box">

    <div class="box1">

    </div>

    <div class="box2">

    </div>



    <?php
    session_start();
    include_once '../ui/footer.php';

    ?>
